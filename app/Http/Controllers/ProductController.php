<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Prikaz svih proizvoda
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    // Forma za kreiranje novog proizvoda
    public function create()
    {
        $colors = Color::all();  // Preuzimamo sve boje
        $categories = Category::all();  // Preuzimamo sve kategorije
        return view('products.create', compact('colors','categories'));  // Šaljemo ih u formu
    }

    // Spremanje novog proizvoda
    public function store(Request $request)
    {
        // Validacija podataka
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',  // Provjera da kategorija postoji
            'colors' => 'nullable|array',  // Osiguravamo da su boje polje
            'colors.*' => 'exists:colors,id',  // Provjeravamo postoji li svaka boja u tablici 'colors'
        ]);
    
        // Kreiramo proizvod s validiranim podacima
        $product = Product::create($validated);
    
        // Ako su odabrane boje, povezujemo ih s proizvodom
        if ($request->has('colors')) {
            $product->colors()->sync($request->colors); // sync povezuje proizvod s odabranim bojama
        }
    
        // Preusmjeravamo na popis proizvoda
        return redirect()->route('products.index');
    }

    // Prikaz pojedinog proizvoda (opcionalno)
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));  // Prikaz proizvoda
    }

    // Forma za uređivanje proizvoda
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $colors = Color::all();  // Preuzimamo sve boje
        return view('products.edit', compact('product', 'categories', 'colors'));
    }

    // Ažuriranje postojećeg proizvoda
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'colors' => 'nullable|array',  // Osiguravamo da su boje polje
            'colors.*' => 'exists:colors,id',  // Provjeravamo postoji li svaka boja u tablici 'colors'
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        // Ako su odabrane boje, poveži ih s proizvodom
        if ($request->has('colors')) {
            $product->colors()->sync($request->colors);  // sync povezuje proizvod s odabranim bojama
        }

        return redirect()->route('products.index')->with('success', 'Proizvod je uspješno ažuriran.');
    }

    // Brisanje proizvoda
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Proizvod je uspješno obrisan.');
    }
}
