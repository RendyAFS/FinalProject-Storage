@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-9 col-xl-10">
        <P class="text-white mt-3 fs-3">
            Lost Table
        </P>
    </div>
    <div class="col-lg-3 col-xl-2">
        <div class="d-grid gap-2">
            <a href="{{ route('losts.create') }}" style="background-color: #FFA559;" class="btn btn-warning text-black fw-bold fs-5 mb-5 mt-3">
                Add <i class="bi bi-plus fw-bold fs-4"></i>
            </a>
        </div>
    </div>
</div>

<div class="table-responsive border border-warning p-3 rounded-3" style="color: #FFA559">
    <table  class="table table-bordered table-hover table-striped mb-0 table-dark datatable"
    id="tableLost">
        <thead>
            <tr class="fs-5">
                <th>Id</th>
                <th>No</th>
                <th>Nama </th>
                <th class="w-75">Nama Barang</th>
                <th >Deskripsi Barang</th>
                <th>Nomor Hp</th>
                <th class="w-25">Tanggal Kehilangan</th>
                <th>Foto Barang</th>
                <th class="w-25">Opsi</th>
            </tr>
        </thead>
        {{-- <tbody>
            @foreach ($losts as $lost)
                <tr>
                    <td>{{ $lost->nama_barang }}</td>
                    <td>{{ date('d-m-Y', strtotime($lost->tgl_kehilangan)) }}</td>
                    <td>@include('action.actionlost')</td>
                </tr>
            @endforeach
        </tbody> --}}
    </table>
</div>
@endsection

{{-- @push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#tableLost').DataTable();
        });
    </script>
@endpush --}}

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $("#tableLost").DataTable({
                serverSide: true,
                processing: true,
                ajax: "/getlosts",
                columns: [
                    { data: "id", name: "id", visible: false },
                    { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false,
                    searchable: false },
                    { data: "nama", name: "nama", visible: false  },
                    { data: "nama_barang", name: "nama_barang" },
                    { data: "deskripsi_barang", name: "deskripsi_barang", visible: false  },
                    { data: "nomorhp", name: "nomorhp", visible: false  },
                    { data: "tgl_kehilangan", name: "tgl_kehilangan" },
                    { data: "foto_barang_lost", name: "foto_barang_lost", visible: false  },
                    { data: "actions", name: "actions", orderable: false,
                    searchable: false },
                ],
                order: [[0, "desc"]],
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"],
                ],
            });
            $(".datatable").on("click", ".btn-delete", function (e) {
                e.preventDefault();

                var form = $(this).closest("form");
                var name = $(this).data("name");

                Swal.fire({
                    title: "Are you sure want to delete\n" + name + "?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "bg-primary",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

    </script>
@endpush

