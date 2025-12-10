<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        return response()->json($snacks);
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

        $snack = Snack::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Snack created successfully.',
            'data' => $snack
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Snack $snack)
    {
        return response()->json($snack);
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

        return response()->json([
            'success' => true,
            'message' => 'Snack updated successfully.',
            'data' => $snack
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Snack $snack)
    {
        $snack->delete();

        return response()->json([
            'success' => true,
            'message' => 'Snack deleted successfully.'
        ]);
    }
}
