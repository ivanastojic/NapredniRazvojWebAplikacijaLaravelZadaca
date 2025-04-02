<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        
        return view('index',compact('products'));
         //return "Ovo je stranica prizvoda!";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Product = Product::findOrFail($id);
        return view('edit', compact('Product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric'
        ]);
        $product = Product::findOrFail($id);  // Osiguravamo da proizvod postoji

        $product->update($validatedData);  // Ažuriramo proizvod s validiranim podacima
    
        // Vraćamo korisnika na listu proizvoda s porukom o uspjehu
        return redirect()->route('products.index')->with('success', 'Product Data is successfully updated');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Proizvod je uspješno obrisan.');

    }
    public function store(Request $request)
    {
        // Validacija unesenih podataka
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
        ]);

        // Kreiranje novog proizvoda s validiranim podacima
        $product = Product::create($validatedData);

        // Preusmjeravanje na stranicu proizvoda s uspješnom porukom
        return redirect('/products')->with('success', 'Product is successfully saved');
    }
}

