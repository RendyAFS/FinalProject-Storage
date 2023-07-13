<?php

namespace App\Http\Controllers;

use App\Models\Found;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
         // Mendefinisikan pesan kesalahan untuk validasi input
         $messages = [
            'required' => ':attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka.',
            'date' => 'Isi: Tanggal kehilangan',
            'foto' => 'Lampirkan Foto Barang'
        ];

        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            // 'nama' => 'required',
            'nama_barang' => 'required',
            'deskripsi_barang' => 'required',
            'tgl_ditemukan' => 'date',
            'foto_barang_found' => 'foto'
            // 'nomorhp'=> 'numeric'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get File
        $file = $request->file('foto');

        // ELOQUENT
        $found = New Found;
        // $found->nama= $request->nama;
        $found->nama_barang = $request->nama_barang;
        $found->deskripsi_barang = $request->deskripsi_barang;
        $found->tgl_ditemukan = $request->tgl_ditemukan;
        if($request->hasFile('foto')){
            $request->file('foto')->move('foto-found/',$request->file('foto')->getClientOriginalName());
            $found->foto_barang_found=$request->file('foto')->getClientOriginalName();
        }
        // $found->nomorhp = $request->nomorhp;

        // if ($file != null) {
        //     $found->foto_barang_found = $foto_barang_found;
        //     $found->encrypted_filename = $encryptedFilename;
        // }

        $found->save();
        return redirect()->route('founds.index');
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
        // ELOQUENT
        $found = Found::find($id);

        //  // Hapus file terkait tidak menggunakan path jika ada
        //  if ($found->foto_barang_found) {
        //     Storage::delete('foto-found/'.$found->foto_barang_found);
        // }

        $file = public_path('foto-found/').$found->foto_barang_found;
        if(file_exists($file)){
            @unlink($file);
        }

        $found->delete();
        return redirect()->route('founds.index');
    }


}
