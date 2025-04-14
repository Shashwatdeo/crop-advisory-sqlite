<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;

class CropController extends Controller
{
    public function index()
    {
        $crops = Crop::all(); // Retrieve all crops
        return view('crops.index', compact('crops')); // Pass data to the view
    }

    public function create()
    {
        return view('crops.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'ideal_conditions' => 'required|string',
        ]);

        Crop::create($validated);

        return redirect()->route('crops.index')->with('success', 'Crop added successfully!');
    }

    public function show($id)
    {
        $crop = Crop::findOrFail($id);
        return view('crops.show', compact('crop'));
    }

    public function edit($id)
    {
        $crop = Crop::findOrFail($id);
        return view('crops.edit', compact('crop'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'ideal_conditions' => 'required|string',
        ]);

        $crop = Crop::findOrFail($id);
        $crop->update($validated);

        return redirect()->route('crops.index')->with('success', 'Crop updated successfully!');
    }



}
