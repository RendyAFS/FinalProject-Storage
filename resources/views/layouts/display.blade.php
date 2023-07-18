@extends('layouts.appdisplay')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <p class="fw-bold fs-2 pb-5 mb-4 text-center" style="color: white;">
                    Barang ditemukan
                </p>
            </div>
            <div class="col-4">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($founds as $index => $sf)
                            <div class="carousel-item {{$index == 0 ? 'active' : ''}}">
                                @if($sf->foto_barang_found)
                                    <img class="rounded mx-auto d-block" src="{{ asset('foto-found/'.$sf->foto_barang_found)}}" style="width: 350px">
                                @endif
                                <br><br><br><br><br><br><br><br><br><br>
                                <div class="carousel-caption">
                                    <h5>{{$sf->nama_barang}}</h5>
                                    <textarea class="form-control border border-black" style="background-color: transparent;
                                    color:white; resize:none; border:none; outline:none;"
                                    rows="5" disabled>{{ $sf->deskripsi_barang }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="table-responsive border border-warning p-3 rounded-3" style="color: #FFA559;">
                    <table class="table table-bordered table-hover table-striped mb-0 table-dark"
                    id="tableFound">
                        <thead>
                            <tr class="fs-6 text-center align-middle">
                                <th>Nama Barang</th>
                                <th>Foto Barang</th>
                                {{-- <th>Deskripsi Barang</th> --}}
                                <th>Tanggal ditemukan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($founds as $found)
                                <tr class="text-center align-middle">
                                    <td >{{ $found->nama_barang }}</td>
                                    <td>
                                        @if($found->foto_barang_found)
                                            <img src="{{ asset('foto-found/'.$found->foto_barang_found)}}" style="width: 100px">
                                        @endif
                                    </td>
                                    {{-- <td>{{ $found->deskripsi_barang }}</td> --}}
                                    <td>{{ $found->tgl_ditemukan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @push('scripts')
                    <style>
                        /* Tambahkan gaya transisi */
                        .dataTables_wrapper {
                            transition: opacity 0.4s ease;
                        }

                        /* Tambahkan gaya untuk halaman aktif */
                        .dataTables_wrapper.current-page {
                            opacity: 0;
                        }
                    </style>

                    <script type="module">
                        $(document).ready(function() {
                            var table = $('#tableFound').DataTable({
                                "ordering": false,
                                "lengthChange": false,
                                "searching": false,
                                "paging": true,
                                "lengthMenu": [6]
                            });

                            var totalPages = table.page.info().pages; // Jumlah total halaman
                            var currentPage = table.page.info().page; // Halaman saat ini

                            function loadNextPage() {
                                currentPage++;

                                if (currentPage >= totalPages) {
                                    currentPage = 0; // Mengatur kembali ke halaman awal
                                }

                                // Tambahkan kelas 'current-page' untuk memulai transisi
                                $('.dataTables_wrapper').addClass('current-page');

                                table.page(currentPage).draw('page');

                                // Tunda penghapusan kelas 'current-page' agar transisi terlihat
                                setTimeout(function() {
                                    $('.dataTables_wrapper').removeClass('current-page');
                                }, 300);

                                setTimeout(loadNextPage, 5080);
                            }

                            loadNextPage();
                        });
                    </script>
                @endpush
            </div>
        </div>
    </div>
@endsection
