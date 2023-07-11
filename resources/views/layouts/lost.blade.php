@extends('layouts.app')

@section('content')
<div class="table-responsive border p-3 rounded-3">
    <table class="table table-bordered table-hover table-striped mb-0 bg-white">
        <thead>
            <tr class="fs-5">
                <th>Nama</th>
                <th>Nama Barang</th>
                <th>Tanggal Kehilangan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($losts as $lost)
                <tr>
                    <td>{{ $lost->nama }}</td>
                    <td>{{ $lost->nama_barang }}</td>
                    <td>{{ $lost->tgl_kehilangan }}</td>
                    {{-- <td>@include('employee.actions')</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
