@extends('layouts.app')

@section('content')
<div class="container-sm my-5">
    <div class="row justify-content-center">
        <div class="p-5 bg-light rounded-3 col-xl-4 border">
            <div class="mb-3 text-center">
                <i class="bi-person-circle fs-1"></i>
                <h4>Detail Barang</h4>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <h5>{{ $found->nama_barang }}</h5>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="deskripsi_barang" class="form-label">Deskripsi Barang</label>
                    <textarea class="form-control border border-black "
                    name="deskripsi_barang" id="deskripsi_barang" rows="5">{{ $found->deskripsi_barang }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="tgl_ditemukan" class="form-label">Tanggal ditemukan</label>
                    <h5>{{ date('d-m-Y', strtotime($found->tgl_ditemukan)) }}</h5>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="foto_barang_found" class="form-label">Foto Barang ditemukan</label>
                    @if ($found->foto_barang_found)
                        <img src="{{ asset('foto-found/'.$found->foto_barang_found)}}" style="width: 150px">
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 d-grid">
                    <a href="{{ route('founds.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
