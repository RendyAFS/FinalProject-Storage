@extends('layouts.app')

@section('content')
<div class="container-sm mt-5 pt-5">
    <form action="{{ route('founds.update',$found->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 border col-xl-6">
                <div class="row">
                    <label class="form-label fw-bold fs-3 pb-4 text-center" style="color: #454545;">Edit Barang Ditemukan</label>
                    <hr>
                    {{-- Inputan--}}
                    <div class="col-md-12 mb-3 ">
                        <label for="nama_barang" class="form-label fw-bold p-2" style="color: #454545;">Nama Barang</label>
                        <input class="form-control @error('nama_barang') is-invalid @enderror" type="text"
                                name="nama_barang" id="nama_barang" value="{{ $found->nama_barang }}"
                                placeholder="Nama Barang">
                        @error('nama_barang')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-4 ">
                        <label for="deskripsi_barang" class="form-label fw-bold p-2" style="color: #454545;">Deskripsi Barang</label>
                        <textarea class="form-control border border-black @error('deskripsi_barang') is-invalid @enderror"
                        name="deskripsi_barang" id="deskripsi_barang" rows="5">{{ $found->deskripsi_barang }}</textarea>
                        @error('deskripsi_barang')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3   ">
                        <label for="tgl_ditemukan" class="fw-bold mb-1 text-center p-2 " style="color: #454545 "> Tanggal ditemukan </label>
                        <input class="form-control @error('tgl_ditemukan') is-invalid @enderror" type="date"
                                name="tgl_ditemukan" id="tgl_ditemukan" value="{{ $found->tgl_ditemukan }}"
                                placeholder="Tanggal ditemukan">
                        @error('tgl_ditemukan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-5">
                        <label for="foto" class="form-label fw-bold p-2" style="color: #454545;">Foto Barang Hilang</label>
                        @if ($found->foto_barang_found)
                            <img src="{{ asset('foto-found/'.$found->foto_barang_found)}}" style="width: 400px">
                        @endif
                    </div>
                    <div class="col-md-12 mb-5">
                        <label for="foto_barang_found" class="form-label fw-bold p-2" style="color: #454545;">Ubah Foto Barang</label>
                        <input type="file" class="form-control @error('foto_barang_found') is-invalid @enderror"
                        name="foto_barang_found" id="foto">
                        @error('foto_barang_found')
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


