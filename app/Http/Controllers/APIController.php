<?php

namespace App\Http\Controllers;

use App\Models\CrudModel;
use Illuminate\Http\Request;

class APIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $index = CrudModel::All();
        return response()->json($index);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $store = CrudModel::create($request->all());
        return response()->json($store, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $show = CrudModel::findOrFail($id);
        return response()->json($show);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $show = CrudModel::findOrFail($id);
        return response()->json($show);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = CrudModel::findOrFail($id);
        $update->update($request->all());
        return response()->json($update, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = CrudModel::findOrFail($id);
        return response()->json(null, 204);
    }
}
