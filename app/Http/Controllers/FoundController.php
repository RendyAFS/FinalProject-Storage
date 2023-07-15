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
            'date' => 'Isi: Tanggal kehilangan',
            // 'file' => 'dengan file foto',

        ];

        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'deskripsi_barang' => 'required',
            'tgl_ditemukan' => 'date',
            // 'foto_barang_found' => 'required|file'
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

        $found->save();
        return redirect()->route('founds.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $found = Found::find($id);
        return view ('action.detailfound', compact('found'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $found = Found::find($id);
        return view ('action.editfound', compact('found'));
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
            'tgl_ditemukan' => 'date',
            // 'foto_barang_found' => 'required',

            'nama' => 'required',
            'tgl_claim' => 'date',
            'nomorhp'=> 'numeric'
            // 'foto_identitas' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get File
        $file = $request->file('foto');

        // ELOQUENT
        $found = Found::find($id);
        $found->nama_barang = $request->input('nama_barang');
        $found->deskripsi_barang = $request->input('deskripsi_barang');
        $found->tgl_ditemukan = $request ->input('tgl_ditemukan');
        if($request->hasFile('foto')){
            $request->file('foto')->move('foto-found/',$request->file('foto')->getClientOriginalName());
            $found->foto_barang_found=$request->file('foto')->getClientOriginalName();
        }

        $found->nama = $request->input('nama');
        $found->tgl_claim = $request->input('tgl_claim');
        $found->nomorhp = $request->input('nomorhp');
        if($request->hasFile('fotoi')){
            $request->file('fotoi')->move('foto-identitas/',$request->file('fotoi')->getClientOriginalName());
            $found->foto_identitas=$request->file('fotoi')->getClientOriginalName();
        }

        $found->save();
        return redirect()->route('founds.index', compact('found'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ELOQUENT
        $found = Found::find($id);

        $file = public_path('foto-found/').$found->foto_barang_found;
        if(file_exists($file)){
            @unlink($file);
        }
        $file = public_path('foto-identitas/').$found->foto_identitas;
        if(file_exists($file)){
            @unlink($file);
        }

        $found->delete();
        return redirect()->route('founds.index');
    }




}
