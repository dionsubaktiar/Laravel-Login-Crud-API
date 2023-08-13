<?php

namespace App\Http\Controllers;

use App\Models\CrudModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class CRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $index = CrudModel::all();
        // dd(Request(response()->json($index)));
        return view('crud.data', ['data' => $index]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crud.input');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'umur' => 'required',
            'pekerjaan' => 'required'
        ]);
        $save_it = new CrudModel();
        $save_it->nama = $request->input('nama');
        $save_it->umur = $request->input('umur');
        $save_it->pekerjaan = $request->input('pekerjaan');
        $save_it->data = [
            'nama' => $request->input('nama'),
            'umur' => $request->input('umur'),
            'pekerjaan' => $request->input('pekerjaan')
        ];
        $save_it->save();
        return redirect()->route('crud.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $edit = DB::table('crud_models')->where('like', 'id', '%' . $id . '%');
        $edit = CrudModel::findOrFail($id);
        return response()->json($edit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = CrudModel::findOrFail($id);
        $update->update($request->all());
        $update->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = CrudModel::findOrFail($id);
        $delete->delete();
        DB::statement('ALTER TABLE CRUD DROP ID');
        DB::statement('ALTER TABLE CRUD ADD id int not null PRIMARY KEY AUTO_INCREMENT');
        return redirect()->route('crud.index');
    }

    public function search(Request $request)
    {

        $cari = $request->cari;
        $search =  DB::table('crud')->where("nama", "like", "%" . $cari . "%")->paginate(10);
        return view('crud.search', ['search' => $search]);
    }
}
