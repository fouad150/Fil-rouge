<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Book $Book)
    {
        if (auth()->check()) {
            return view('checkout', compact('Book'));
            // return ;
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Sale $sale)
    {
        $request->validate([
            // 'user_id' => 'required',
            'book_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'user_name' => 'required',
            'checkout_email' => 'required|email',
            'adress' => 'required',
            'phone_number' => 'required',
            'country' => 'required',
            'zip' => 'required|numeric'
        ]);

        // Sale::create($request->all());

        $sale->user_id = Auth::user()->id;
        $sale->book_id = $request->book_id;
        $sale->first_name = $request->first_name;
        $sale->last_name = $request->last_name;
        $sale->user_name = $request->user_name;
        $sale->checkout_email = $request->checkout_email;
        $sale->adress = $request->adress;
        $sale->phone_number = $request->phone_number;
        $sale->country = $request->country;
        $sale->zip = $request->zip;
        $sale->save();

        return redirect()->route('index')
            ->with('success', 'The operation has been done successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Book $Book)
    {
        // if (auth()->check()) {
        //     return view('checkout', compact('Book'));
        //     // return ;
        // } else {
        //     return redirect()->route('login');
        // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
