<?php

namespace App\Http\Controllers;
use App\Models\Found;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class FoundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        confirmDelete();

         return view('layouts.found');
    }

    public function getData(Request $request)
    {
        $founds = Found::all();

        if ($request->ajax()) {
            return datatables()->of($founds)
                ->addIndexColumn()
                ->addColumn('actions', function($found) {
                    return view('action.actionfound', compact('found'));
                })
                ->toJson();
        }
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
            'mimes' => 'Format file : harus .jpg, .png, atau .jpeg'

        ];

        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'deskripsi_barang' => 'required',
            'tgl_ditemukan' => 'date',
            'foto_barang_found' => 'required|mimes:jpg,png,jpeg'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        // ELOQUENT
        $found = New Found;
        // $found->nama= $request->nama;
        $found->nama_barang = $request->nama_barang;
        $found->deskripsi_barang = $request->deskripsi_barang;
        $found->tgl_ditemukan = $request->tgl_ditemukan;
        if($request->hasFile('foto_barang_found')){
            $request->file('foto_barang_found')->move('foto-found/',$request->file('foto_barang_found')->getClientOriginalName());
            $found->foto_barang_found=$request->file('foto_barang_found')->getClientOriginalName();
        }

        Alert::success('Added Successfully', 'Found Object Added Successfully.');

        $found->save();
        return redirect()->route('founds.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $found = Found::find($id);
        if ($request->ajax()) {
            return view('action.popupfound', compact('found'));
        }
        return view('founds.index', compact('found'));

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
            'mimes' => 'Format file :harus .jpg, .png, atau .jpeg'
        ];

        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'deskripsi_barang' => 'required',
            'tgl_ditemukan' => 'date',
            'foto_barang_found'=>'required|mimes:jpg,png,jpeg'

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

        $lokasi = 'foto-found/'.$found->foto_barang_found;
        if (File::exists($lokasi)) {
            File::delete($lokasi);
        }

        if($request->hasFile('foto_barang_found')){
            $request->file('foto_barang_found')->move('foto-found/',$request->file('foto_barang_found')->getClientOriginalName());
            $found->foto_barang_found=$request->file('foto_barang_found')->getClientOriginalName();
        }


        Alert::success('Updated Successfully', 'Found Object Updated Successfully.');

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

        Alert::success('Deleted Successfully', 'Found Data Deleted Successfully.');

        $found->delete();
        return redirect()->route('founds.index');
    }





    public function history()
    {
         // Eloquent
         $founds = Found::onlyTrashed()->get();

         return view ('layouts.history', [
             'founds' => $founds
         ]);
    }


    public function claim(string $id)
    {
        $found = Found::find($id);
        return view ('action.claim', compact('found'));
    }


    public function storeclaim(Request $request, string $id)
    {
        // Mendefinisikan pesan kesalahan untuk validasi input

        $messages = [
            'required' => ':attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka.',
            'date' => 'Isi: Tanggal kehilangan',
            'mimes' => 'Format file :harus .jpg, .png, atau .jpeg'
        ];

        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [

            'nama' => 'required',
            'tgl_claim' => 'date',
            'nomorhp'=> 'numeric',
            'foto_identitas' => 'required|mimes:jpg,png,jpeg',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get File
        $file = $request->file('foto');

        // ELOQUENT
        $found = Found::find($id);

        $found->nama = $request->input('nama');
        $found->tgl_claim = $request->input('tgl_claim');
        $found->nomorhp = $request->input('nomorhp');
        if($request->hasFile('foto_identitas')){
            $request->file('foto_identitas')->move('foto-identitas/',$request->file('foto_identitas')->getClientOriginalName());
            $found->foto_identitas=$request->file('foto_identitas')->getClientOriginalName();
        }

        Alert::success('Claimed Successfully', 'Found Object Claimed Successfully.');

        $found->save();
        $found->delete();
        return redirect()->route('founds.index', compact('found'));

    }



    public function display()
    {
         // Eloquent
         $founds = Found::all();

         return view ('layouts.display', [
             'founds' => $founds,
         ]);
    }
}
