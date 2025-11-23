<?php

namespace App\Http\Controllers;

use App\Models\Snack;
use Illuminate\Http\Request;

class SnackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $snacks = Snack::all();
        return view('admin.snacks.index', compact('snacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.snacks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
        ]);

        Snack::create($request->all());

        return redirect()->route('snacks.index')
                        ->with('success','Snack created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Snack $snack)
    {
        return view('admin.snacks.show',compact('snack'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Snack $snack)
    {
        return view('admin.snacks.edit',compact('snack'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Snack $snack)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
        ]);

        $snack->update($request->all());

        return redirect()->route('snacks.index')
                        ->with('success','Snack updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Snack $snack)
    {
        $snack->delete();

        return redirect()->route('snacks.index')
                        ->with('success','Snack deleted successfully');
    }
}
