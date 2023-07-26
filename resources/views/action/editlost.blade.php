@extends('layouts.app')

@section('content')
<div class="container-sm mt-5 pt-5">
    <form action="{{ route('losts.update',$lost->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 border col-xl-6">
                <div class="row">
                    <label class="form-label fw-bold fs-3 pb-4 text-center" style="color: #454545;">Edit Barang Hilang</label>
                    <hr>
                    {{-- Inputan--}}
                    <div class="col-md-12 mb-3 ">
                        <label for="nama_barang" class="form-label fw-bold p-2" style="color: #454545;">Nama Barang</label>
                        <input class="form-control @error('nama_barang') is-invalid @enderror" type="text"
                                name="nama_barang" id="nama_barang" value="{{ $lost->nama_barang }}"
                                placeholder="Nama Barang">
                        @error('nama_barang')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-4 ">
                        <label for="deskripsi_barang" class="form-label fw-bold p-2" style="color: #454545;">Deskripsi Barang</label>
                        <textarea class="form-control border border-black @error('deskripsi_barang') is-invalid @enderror"
                        name="deskripsi_barang" id="deskripsi_barang" rows="5">{{ $lost->deskripsi_barang }}</textarea>
                        @error('deskripsi_barang')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3   ">
                        <label for="tgl_kehilangan" class="fw-bold mb-1 text-center p-2 " style="color: #454545 "> Tanggal Kehilangan </label>
                        <input class="form-control @error('tgl_kehilangan') is-invalid @enderror" type="date"
                                name="tgl_kehilangan" id="tgl_kehilangan" value="{{ $lost->tgl_kehilangan }}"
                                placeholder="Tanggal kehilangan">
                        @error('tgl_kehilangan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3 ">
                        <label for="nomorhp" class="form-label fw-bold p-2" style="color: #454545;">Nomor HP</label>
                        <input class="form-control @error('nomorhp') is-invalid @enderror" type="text"
                                name="nomorhp" id="nomorhp" value="{{ $lost->nomorhp }}"
                                placeholder="Nama Barang">
                        @error('nomorhp')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-5">
                        <label for="foto" class="form-label fw-bold p-2" style="color: #454545;">Foto Barang Hilang</label>
                        @if ($lost->foto_barang_lost)
                            <img src="{{ asset('foto-lost/'.$lost->foto_barang_lost)}}" style="width: 400px">
                        @endif
                    </div>
                    <div class="col-md-12 mb-5">
                        <label for="foto_barang_lost" class="form-label fw-bold p-2" style="color: #454545;">Ubah Foto Barang</label>
                        <input type="file" class="form-control @error('foto_barang_lost') is-invalid @enderror"
                        name="foto_barang_lost" id="foto">
                        @error('foto_barang_lost')
                            <small class="text-danger text-left">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- BUTTON --}}
                    <div class="row">
                        {{-- Tombol untuk simpan --}}
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-lg mt-3 fw-bold" style="background-color: #70E899">
                                Edit
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
