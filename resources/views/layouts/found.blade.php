@extends('layouts.app')

@section('content')
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
                    {{-- <td>@include('employee.actions')</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
