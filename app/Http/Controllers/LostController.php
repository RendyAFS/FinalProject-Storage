<?php

namespace App\Http\Controllers;

use App\Models\Lost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eloquent
        $losts = Lost::all();

        return view ('layouts.lost', [
            'losts' => $losts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('action.createlost');
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
            'date' => 'Isi: Tanggal kehilangan'
        ];

        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nama_barang' => 'required',
            'deskripsi_barang' => 'required',
            'tgl_kehilangan' => 'date',
            'nomorhp'=> 'numeric'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get File

            // ELOQUENT
            $lost = New Lost;
            $lost->nama= $request->nama;
            $lost->nama_barang = $request->nama_barang;
            $lost->deskripsi_barang = $request->deskripsi_barang;
            $lost->tgl_kehilangan = $request->tgl_kehilangan;
            $lost->nomorhp = $request->nomorhp;

            if($request->hasFile('foto')){
                $request->file('foto')->move('foto-lost/',$request->file('foto')->getClientOriginalName());
                $lost->foto_barang_lost=$request->file('foto')->getClientOriginalName();
            }

            $lost->save();
            return redirect()->route('losts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lost = Lost::find($id);
        return view ('action.detaillost', compact('lost'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lost = Lost::find($id);
        return view ('action.editlost', compact('lost'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Mendefinisikan pesan kesalahan untuk validasi input

        $messages = [
            'required' => ':attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka.',
            'date' => 'Isi: Tanggal kehilangan',
            // 'foto' => 'Lampirkan Foto Barang'
        ];

        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'deskripsi_barang' => 'required',
            'tgl_kehilangan' => 'date',
            // 'foto_barang_found'=>'required'

        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get File
        $file = $request->file('foto');

        // ELOQUENT
        $lost = Lost::find($id);
        $lost->nama_barang = $request->input('nama_barang');
        $lost->deskripsi_barang = $request->input('deskripsi_barang');
        $lost->tgl_kehilangan = $request ->input('tgl_kehilangan');

        $lokasi = 'foto-lost/'.$lost->foto_barang_lost;
        if (File::exists($lokasi)) {
            File::delete($lokasi);
        }

        if($request->hasFile('foto_barang_lost')){
            $request->file('foto_barang_lost')->move('foto-lost/',$request->file('foto_barang_lost')->getClientOriginalName());
            $lost->foto_barang_lost=$request->file('foto_barang_lost')->getClientOriginalName();
        }




        $lost->save();
        return redirect()->route('losts.index', compact('lost'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ELOQUENT
        $lost = Lost::find($id);

       $file = public_path('foto-lost/').$lost->foto_barang_lost;
        if(file_exists($file)){
            @unlink($file);
        }

        $lost->delete();
        return redirect()->route('losts.index');
    }
}
