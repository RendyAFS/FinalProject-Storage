@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-9 col-xl-10">

    </div>
    <div class="col-lg-3 col-xl-2">
        <div class="d-grid gap-2">
            <a href="{{ route('losts.create') }}" style="background-color: #FFA559;" class="btn btn-warning text-black fw-bold fs-5 mb-5 mt-3">
                Tambah <i class="bi bi-plus fw-bold fs-3"></i>
            </a>
        </div>
    </div>
</div>
<div class="table-responsive border p-3 rounded-3">
    <table class="table table-bordered table-hover table-striped mb-0 bg-white">
        <thead>
            <tr class="fs-5">
                <th>Nama</th>
                <th>Nama Barang</th>
                <th>Tanggal ditemukan</th>
                <th>Tanggal Claim</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($founds as $found)
                <tr>
                    <td>{{ $found->nama }}</td>
                    <td>{{ $found->nama_barang }}</td>
                    <td>{{ $found->tgl_ditemukan }}</td>
                    <td>{{ $found->tgl_claim }}</td>
                    <td>@include('action.actionfound')</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
