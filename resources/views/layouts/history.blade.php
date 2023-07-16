@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-9 col-xl-10">

    </div>
    <div class="col-lg-3 col-xl-2">
        <div class="d-grid gap-2">
            <a href="{{ route('founds.index') }}" style="background-color: #FFA559;" class="btn btn-warning text-black fw-bold fs-5 mb-5 mt-3">
                Kembali <i class="bi bi-plus fw-bold fs-4"></i>
            </a>
        </div>
    </div>
</div>
<div class="table-responsive border border-warning p-3 rounded-3" style="color: #FFA559;">

    <table class="table table-bordered table-hover table-striped mb-0 table-dark"
    id="tableFound">
        <thead>
            <tr class="fs-5 text-center">
                <th>Nama Pengambil</th>
                <th>Nama Barang</th>
                <th>Tanggal Claim</th>
                <th>Nomor Hp</th>
                <th>Foto Identitas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($founds as $found)
                <tr class="text-center">
                    <td class="align-middle">{{ $found->nama }}</td>
                    <td class="align-middle">{{ $found->nama_barang }}</td>
                    <td class="align-middle">{{ $found->tgl_claim }}</td>
                    <td class="align-middle">{{ $found->nomorhp }}</td>
                    <td>
                        @if($found->foto_barang_found)
                            <img src="{{ asset('foto-identitas/'.$found->foto_identitas)}}" style="width: 200px">
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#tableFound').DataTable();
        });
    </script>
@endpush
