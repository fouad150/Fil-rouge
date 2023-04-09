<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('category')->get();
        // return view('index', compact('books'));
        $Categories = Category::get();
        return view('index', compact(['Categories', 'books']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Categories = Category::with('books')->get();
        return view('books.create', compact('Categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Book $Book)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'description' => 'required',
            'publication_date' => 'required|date',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'required'
            // 'category_id',
            // 'user_id'
        ]);

        // Book::create($request->all());
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('assets/img/books/'), $imageName);

        $Book->image = $imageName;
        $Book->name = $request->name;
        $Book->author = $request->author;
        $Book->description = $request->description;
        $Book->publication_date = $request->publication_date;
        $Book->price = $request->price;
        $Book->quantity = $request->quantity;
        $Book->category_id = $request->category_id;
        $Book->user_id = Auth::user()->id;
        $Book->save();

        return redirect()->route('books.index')
            ->with('success', 'The Book created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $Book)
    {
        // $Book->find($Book->id);
        // return view('books.show', compact('Book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $Book)
    {
        $Categories = Category::get();
        return view('books.edit', compact(['Book', 'Categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $Book)
    {

        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'description' => 'required',
            'publication_date' => 'required|date',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            // 'image' => 'required'
            // 'category_id',
            // 'user_id'
        ]);

        if ($request->image == null) {
            $imageName = $request->origin_image;
        } else {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/books/'), $imageName);
        }


        Book::where('id', $Book->id)->update([
            'name' => $request->name,
            'author' => $request->author,
            'description' => $request->description,
            'publication_date' => $request->publication_date,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $imageName,
            // 'category_id'=>$request->category_id,
            // 'user_id'
        ]);

        return redirect()->route('books.index')
            ->with('success', 'The Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $Book)
    {
        $Book->delete();
        return redirect()->route('books.index')
            ->with('success', 'The Book deleted successfully');
    }
}
