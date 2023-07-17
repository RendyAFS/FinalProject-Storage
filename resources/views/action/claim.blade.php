@extends('layouts.app')

@section('content')
<div class="container-sm mt-5">
    <form action="{{ route('storeclaim',$found->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 border col-xl-6">
                <div class="row">
                    <p class="fs-3 text-center fw-bold">
                        Barang Ditemukan
                    </p>
                    {{-- Inputan--}}
                    <div class="col-md-12 mb-3 ">
                        <input class="form-control @error('nama_barang') is-invalid @enderror" type="text"
                                name="nama_barang" id="nama_barang" value="{{ $found->nama_barang }}"
                                placeholder="Nama Barang" >
                        @error('nama_barang')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-4 ">
                        <input class="form-control @error('deskripsi_barang') is-invalid @enderror" type="text"
                                name="deskripsi_barang" id="deskripsi_barang" value="{{ $found->deskripsi_barang }}"
                                placeholder="Deskripsi Barang">
                        @error('deskripsi_barang')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3   ">
                        <label for="tgl_ditemukan" class="fw-bold mb-1 text-center p-2 " style="color: #454545 "> Tanggal ditemukan </label>
                        <input class="form-control @error('tgl_ditemukan') is-invalid @enderror" type="text"
                                name="tgl_ditemukan" id="tgl_ditemukan" value="{{ $found->tgl_ditemukan }}"
                                placeholder="Tanggal ditemukan">
                        @error('tgl_ditemukan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-5">
                        <label for="foto" class="form-label fw-bold p-2" style="color: #454545;">Foto Barang (Opsional)</label>
                        @if ($found->foto_barang_found)
                            <img src="{{ asset('foto-found/'.$found->foto_barang_found)}}" style="width: 400px">
                        @endif
                    </div>

                    <hr>
                    <p class="fs-3 text-center fw-bold">
                        Data Pengambilan Barang
                    </p>

                    <div class="col-md-12 mb-3   ">
                        <input class="form-control @error('nama') is-invalid @enderror" type="text"
                                name="nama" id="nama" value="{{ $found->nama }}"
                                placeholder="Nama Pengambil">
                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3   ">
                        <label for="tgl_claim" class="fw-bold mb-1 text-center p-2 " style="color: #454545 "> Tanggal Claim </label>
                        <input class="form-control @error('tgl_claim') is-invalid @enderror" type="date"
                                name="tgl_claim" id="tgl_claim" value="{{ $found->tgl_claim }}"
                                placeholder="Tanggal Claim">
                        @error('tgl_claim')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3   ">
                        <input class="form-control @error('nomorhp') is-invalid @enderror" type="text"
                                name="nomorhp" id="nomorhp" value="{{ $found->nomorhp }}"
                                placeholder="Nomor Hp">
                        @error('nomorhp')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-5">
                        <label for="foto_identitas" class="form-label fw-bold p-2" style="color: #454545;">Foto Identitas (Wajib)</label>
                        <input type="file" class="form-control @error('foto_identitas') is-invalid @enderror" name="foto_identitas" id="foto_identitas">
                        @error('foto_identitas')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row">
                        {{-- Tombol untuk simpan --}}
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-lg mt-3 fw-bold" style="background-color: #70E899">
                                Ambil
                            </button>
                        </div>
                            {{-- Tombol untuk batal --}}
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('founds.index') }}" class="btn btn-lg mt-3 fw-bold" style="background-color: #E87070">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection


