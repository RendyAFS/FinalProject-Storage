@extends('layouts.app')

@section('content')
<div class="container-sm mt-5">
    <form action="{{ route('founds.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 border col-xl-6">
                <div class="row">
                    {{-- Inputan--}}
                    <div class="col-md-12 mb-3 ">
                        <input class="form-control border border-black text-center @error('nama_barang') is-invalid @enderror" type="text"
                            name="nama_barang" id="nama_barang" value="{{ old('nama_barang') }}"
                            placeholder="Nama Barang">
                        @error('nama_barang')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-4 ">
                        <input class="form-control border border-black text-center @error('deskripsi_barang') is-invalid @enderror" type="text"
                            name="deskripsi_barang" id="deskripsi_barang" value="{{ old('deskripsi_barang') }}"
                            placeholder="Deskripsi Barang">
                        @error('deskripsi_barang')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3   ">
                        <label for="tgl_ditemukan" class="fw-bold mb-1 text-center p-2 " style="color: #454545 "> Tanggal ditemukan </label>
                        <input class="form-control border border-black text-center @error('tgl_ditemukan') is-invalid @enderror" type="date"
                            name="tgl_ditemukan" id="tgl_ditemukan" value="{{ old('tgl_ditemukan') }}"
                            placeholder="">
                        @error('tgl_ditemukan')
                            <small class="text-danger text-left">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-5">
                        <label for="foto_barang_found" class="form-label fw-bold p-2" style="color: #454545;">Foto Barang (Opsional)</label>
                        <input type="file" class="form-control @error('foto_barang_found') is-invalid @enderror" name="foto_barang_found" id="foto">
                        @error('foto_barang_found')
                            <small class="text-danger text-left">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row">
                        {{-- Tombol untuk simpan --}}
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-lg mt-3 fw-bold" style="background-color: #70E899">
                                Tambah
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
