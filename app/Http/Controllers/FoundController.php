<?php

namespace App\Http\Controllers;

use App\Models\Found;
use Illuminate\Http\Request;

class FoundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Eloquent
         $founds = Found::all();

         return view ('layouts.found', [
             'founds' => $founds
         ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('action.createfound');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view ('action.detailfound');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view ('action.editfound');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}