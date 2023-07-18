@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-7 col-xl-8">
        <a href="{{ route('display') }}" style="background-color: #FFA559;" class="btn btn-warning text-black fw-bold fs-5 mb-5 mt-3">
            <i class="bi bi-cast"></i>
        </a>
    </div>
    <div class="col-lg-3 col-xl-2">
        <div class="d-grid">
            <a href="{{ route('founds.create') }}" style="background-color: #FFA559;" class="btn btn-warning text-black fw-bold fs-5 mb-5 mt-3">
                Tambah <i class="bi bi-plus fw-bold fs-4"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xl-2">
        <div class="d-grid">
            <a href="{{ route('history') }}" style="background-color: #FFA559;" class="btn btn-warning text-black fw-bold fs-5 mb-5 mt-3">
                History <i class="bi bi-clock-history"></i>
            </a>
        </div>
    </div>
</div>
<div class="table-responsive border border-warning p-3 rounded-3" style="color: #FFA559;">
    <table class="table table-bordered table-hover table-striped mb-0 table-dark"
    id="tableFound">
        <thead>
            <tr class="fs-5 text-center">
                <th>Deskripsi Singkat</th>
                <th>Tanggal ditemukan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($founds as $found)
                <tr class="text-center">
                    <td class="w-75">
                        {{ $found->nama_barang }} <br><br>
                        @if($found->foto_barang_found)
                            <img src="{{ asset('foto-found/'.$found->foto_barang_found)}}" style="width: 400px">
                        @endif
                        <br><br>
                        <div>
                            @include('action.actionfound')
                        </div>
                    </td>
                    <td class="align-middle w-25">{{ $found->tgl_ditemukan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#tableFound').DataTable({
                "lengthMenu": [5,10,25]
            });
        });
    </script>
@endpush
