@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-9 col-xl-10">

    </div>
    <div class="col-lg-3 col-xl-2">
        <div class="d-grid gap-2">
            <a href="{{ route('losts.create') }}" style="background-color: #FFA559;" class="btn btn-warning text-black fw-bold fs-5 mb-5 mt-3">
                Tambah <i class="bi bi-plus fw-bold fs-4"></i>
            </a>
        </div>
    </div>
</div>
<div class="table-responsive border border-warning p-3 rounded-3" style="color: #FFA559">
    <table  class="table table-bordered table-hover table-striped mb-0 table-dark"
    id="tableLost">
        <thead>
            <tr class="fs-5">
                <th class="w-75">Nama Barang</th>
                <th class="w-25">Tanggal Kehilangan</th>
                <th class="w-25">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($losts as $lost)
                <tr>
                    <td>{{ $lost->nama_barang }}</td>
                    <td>{{ date('d-m-Y', strtotime($lost->tgl_kehilangan)) }}</td>
                    <td>@include('action.actionlost')</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#tableLost').DataTable();
        });
    </script>
@endpush

