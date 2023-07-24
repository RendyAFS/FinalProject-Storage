@extends('layouts.app')

@section('content')
<div class="container-sm my-5">
    <div class="row justify-content-center">
        <div class="p-5 bg-light rounded-3 col-xl-8 border">
            <div class="mb-3 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-box-fill mb-3" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001 6.971 2.789Zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z"/>
                  </svg>
                <h4>Detail Barang Ditemukan</h4>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nama_barang" class="form-label fs-5 fw-bold text-decoration-underline">Nama Barang</label>
                    <h5>{{ $found->nama_barang }}</h5>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tgl_ditemukan" class="form-label fs-5 fw-bold text-decoration-underline">Tanggal ditemukan</label>
                    <h5>{{ date('d-m-Y', strtotime($found->tgl_ditemukan)) }}</h5>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="deskripsi_barang" class="form-label fs-5 fw-bold text-decoration-underline">Deskripsi Barang</label>
                    <textarea class="form-control border border-black "
                    name="deskripsi_barang" id="deskripsi_barang" rows="5">{{ $found->deskripsi_barang }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="foto_barang_found" class="form-label fs-5 fw-bold text-decoration-underline">Foto Barang ditemukan</label>
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
