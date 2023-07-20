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
                <div class="col-md-4 mb-3">
                    <label for="nama" class="form-label">Nama Pelapor</label>
                    <h5>{{ $lost->nama }}</h5>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <h5>{{ $lost->nama_barang }}</h5>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="deskripsi_barang" class="form-label">Deskripsi Barang</label>
                    <h5>{{ $lost->deskripsi_barang }}</h5>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="tgl_kehilangan" class="form-label">Tanggal Kehilangan</label>
                    <h5>{{ date('d-m-Y', strtotime($lost->tgl_kehilangan)) }}</h5>
                </div>
                <div class="col-md-12 mb-3">s
                    <label for="nomorhp" class="form-label">Nomor Hp</label>
                    <h5>{{ $lost->nomorhp }}</h5>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="nomorhp" class="form-label">Foto Barang Hilang</label>
                    @if ($lost->foto_barang_lost)
                        <img src="{{ asset('foto-lost/'.$lost->foto_barang_lost)}}" style="width: 150px">
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 d-grid">
                    <a href="{{ route('losts.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
