<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Sale;
use App\Models\User;
use COM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categories = Category::with('books')->get();
        // $books = Book::with('category')->get();
        $books_count = Book::count();
        $sales_count = Sale::count();
        $users_count = User::where('role_id', 1)->count();
        return view('categories.index', compact(['Categories', 'books_count', 'users_count', 'sales_count']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $Category)
    {
        $request->validate([
            'category' => 'required',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'The Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $Category)
    {
        // $Category->find($Category->id);
        // return view('categories.show', compact('Category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $Category)
    {
        return view('categories.edit', compact('Category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $Category)
    {
        $Category->update($request->all());
        return redirect()->route('categories.index')
            ->with('success', 'The category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $Category)
    {
        $Category->delete();
        return redirect()->route('categories.index')
            ->with('warning', 'The Category deleted successfully');
    }
}
