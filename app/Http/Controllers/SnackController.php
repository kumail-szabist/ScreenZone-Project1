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
        return view('admin.snacks.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.snacks.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Snack $snack)
    {
        return view('admin.snacks.edit', compact('snack'));
    }
}
