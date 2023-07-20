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

        $messages = [
            'required' => ':attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka.',
            'date' => 'Isi: Tanggal kehilangan',
        ];

        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'deskripsi_barang' => 'required',
            'tgl_kehilangan' => 'date',
            'foto_barang_lost'=>'required'

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



    public function wa(string $id)
    {
        $lost = Lost::find($id);

        if ($lost) {
            // Mengambil nomor hp dari kolom 'nomorhp' pada tabel Lost
            $nomorhp = $lost->nomorhp;
            $nama = $lost->nama;
            $nama_barang = $lost->nama_barang;
            $deskripsi_barang = $lost->deskripsi_barang;

            // Menghapus angka pertama dari nomor hp jika dimulai dengan '0'
            if (substr($nomorhp, 0, 1) === '0') {
                $nomorhp = substr($nomorhp, 1);
            }

            // Membangun URL untuk WhatsApp
            $url = "https://wa.me/62{$nomorhp}?text=" . urlencode("Kami dengan senang hati mengumumkan bahwa \"barang yang hilang dengan pelapor kehilangan atas nama: {$nama} dengan barang \"{$nama_barang}\"  telah ditemukan!!!\n\nDengan ciri-ciri:\n{$deskripsi_barang} \n\nBagi Anda yang kehilangan barang dan telah melaporkannya sebelumnya, harap segera mengunjungi satpam ITTS untuk melakukan pengambilan barang tersebut dan proses \"Claim barang\".\n\nAlamat ITTS:\nJl. Ketintang No.156, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231\n\nTerima kasih atas perhatiannya. Semoga barang Anda dapat segera kembali ke tangan yang tepat.\n\nHormat kami,\nManajemen ITTS");

            // Redirect ke URL WhatsApp
            header("Location: $url");
            $lost->delete();
            exit;
        }
    }
}
