@extends('layouts.app')

@section('content')
<div class="container-sm mt-5">
    <form action="{{ route('losts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">

            <div class="p-5 bg-light rounded-3 border col-xl-6">
                <div class="row">
                    {{-- Inputan--}}
                    <div class="col-md-12 mb-3 ">
                        <input class="form-control border border-black text-center @error('nama') is-invalid @enderror" type="text"
                            name="nama" id="nama" value="{{ old('nama') }}"
                            placeholder="Nama Pemilik Barang">
                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3 ">
                        <input class="form-control border border-black text-center @error('nama_barang') is-invalid @enderror" type="text"
                            name="nama_barang" id="nama_barang" value="{{ old('nama_barang') }}"
                            placeholder="Nama Barang">
                        @error('nama_barang')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-4 ">
                        <label for="deskripsi_barang" class="form-label fw-bold p-2" style="color: #454545;">Deskripsi Barang</label>
                        <textarea class="form-control border border-black @error('deskripsi_barang') is-invalid @enderror"
                        name="deskripsi_barang" id="deskripsi_barang" rows="4">{{ old('deskripsi_barang') }}</textarea>
                        @error('deskripsi_barang')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3   ">
                        <label for="tgl_kehilangan" class="fw-bold mb-1 text-center p-2 " style="color: #454545 "> Tanggal Kehilangan </label>
                        <input class="form-control border border-black text-center @error('tgl_kehilangan') is-invalid @enderror" type="date"
                            name="tgl_kehilangan" id="tgl_kehilangan" value="{{ old('tgl_kehilangan') }}"
                            placeholder="Deskripsi Barang">
                        @error('tgl_kehilangan')
                            <small class="text-danger text-left">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-4 ">
                        <input class="form-control border border-black text-center @error('nomorhp') is-invalid @enderror" type="text"
                            name="nomorhp" id="nomorhp" value="{{ old('nomorhp') }}"
                            placeholder="Nomor Telepon">
                        @error('nomorhp')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-5">
                        <label for="foto" class="form-label fw-bold p-2" style="color: #454545;">Foto Barang (Opsional)</label>
                        <input type="file" class="form-control" name="foto" id="foto">
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
                            <a href="{{ route('losts.index') }}" class="btn btn-lg mt-3 fw-bold" style="background-color: #E87070">
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

