<?php

namespace App\Http\Controllers;

use App\Models\FluidOil;
use Illuminate\Http\Request;

class FluidOilController extends Controller
{
    public function index(Request $request)
    {
        $types = FluidOil::distinct()->pluck('type');
        $fluidOils = FluidOil::when($request->type, function($query) use ($request) {
            return $query->where('type', $request->type);
        })->get();

        return view('fluid-oils.index', compact('fluidOils', 'types'));
    }

    public function create()
    {
        return view('fluid-oils.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $request->file('image')?->store('fluid_oils', 'public');

        FluidOil::create([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('fluid-oils.index');
    }

    public function show($id)
    {
        $fluidOil = FluidOil::findOrFail($id);
        return view('fluid-oils.show', compact('fluidOil'));
    }

    public function edit($id)
    {
        $fluidOil = FluidOil::findOrFail($id);
        return view('fluid-oils.edit', compact('fluidOil'));
    }

    public function update(Request $request, $id)
    {
        $fluidOil = FluidOil::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $fluidOil->image = $request->file('image')->store('fluid_oils', 'public');
        }

        $fluidOil->update($request->only(['name', 'type', 'description', 'price']));

        return redirect()->route('fluid-oils.index');
    }

    public function destroy($id)
    {
        FluidOil::destroy($id);
        return redirect()->route('fluid-oils.index');
    }
}
