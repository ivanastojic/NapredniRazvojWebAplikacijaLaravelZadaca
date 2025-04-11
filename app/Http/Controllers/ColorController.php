<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    // Prikaz svih boja
    public function index()
    {
        $colors = Color::all();
        return view('colors.index', compact('colors'));
    }

    // Prikaz forme za unos nove boje
    public function create()
    {
        return view('colors.create');
    }

    // Spremanje nove boje
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Color::create($validated);
        return redirect()->route('colors.index');
    }

    // Prikaz forme za uređivanje postojeće boje
    public function edit(Color $color)
    {
        return view('colors.edit', compact('color'));
    }

    // Ažuriranje postojeće boje
    public function update(Request $request, Color $color)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $color->update($validated);
        return redirect()->route('colors.index');
    }

    // Brisanje boje
    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->route('colors.index');
    }
}
