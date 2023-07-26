@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-1 col-xl-2">
        <div class=" gap-2">
            <a href="{{ route('founds.index') }}" style="background-color: #FFA559;" class="btn btn-warning text-black fw-bold fs-5 mb-5 mt-3">
                <i class="bi bi-arrow-return-left"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-7 col-xl-9"></div>
    <div class="col-lg-1 col-xl-lg-1">
        <a href="{{ url('/delete-soft-deleted') }}" style="background-color: #FFA559;" class="btn btn-warning text-black fw-bold fs-5 mb-5 mt-3 btn-delete">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
            </svg>
        </a>
    </div>
</div>
<div class="table-responsive border border-warning p-3 rounded-3" style="color: #FFA559;">

    <table class="table table-bordered table-hover table-striped mb-0 table-dark"
    id="tableFound">
        <thead>
            <tr class="fs-5 text-center">
                <th>Nama Pengambil</th>
                <th>Nama dan Gambar Barang</th>
                <th>Tanggal Claim</th>
                <th>Nomor Hp</th>
                <th>Foto Identitas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($founds as $found)
                <tr class="text-center">
                    <td class="align-middle">{{ $found->nama }}</td>
                    <td class="align-middle">
                        {{ $found->nama_barang }} <br><br>
                        @if($found->foto_barang_found)
                            <img src="{{ asset('foto-found/'.$found->foto_barang_found)}}" style="width: 200px">
                        @endif
                    </td>
                    <td class="align-middle">{{ date('d-m-Y', strtotime($found->tgl_claim)) }}</td>
                    <td class="align-middle">{{ $found->nomorhp }}</td>
                    <td class="align-middle">
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

            document.querySelector(".btn-delete").addEventListener("click", function(e) {
            e.preventDefault();

            var link = this.getAttribute("href");

            Swal.fire({
                title: "Are you sure want to delete\n",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonClass: "bg-primary",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                }
            });
        });
    </script>
@endpush
