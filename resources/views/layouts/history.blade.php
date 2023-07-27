@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-1 col-xl-1">
        <div class="">
            <a href="{{ route('founds.index') }}" style="background-color: #FFA559;" class="btn btn-warning text-black fw-bold fs-5 mb-5 mt-3">
                <i class="bi bi-arrow-return-left"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xl-4">
        <P class="text-white mt-3 fs-3">
            Claim History Table
        </P>
    </div>
    <div class="col-lg-3 col-xl-5"></div>
    <div class="col-lg-1 col-xl-1 mt-2">
        <a href="{{ route('exportPdf') }}">
            <svg width="100" height="60" viewBox="0 0 149 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 10C0 4.47715 4.47715 0 10 0H139C144.523 0 149 4.47715 149 10V45C149 50.5228 144.523 55 139 55H10C4.47716 55 0 50.5228 0 45V10Z" fill="#FFA559"/>
                <path d="M76.184 23.504C76.184 24.5493 75.932 25.5293 75.428 26.444C74.9427 27.3587 74.168 28.096 73.104 28.656C72.0587 29.216 70.7333 29.496 69.128 29.496H65.852V37H61.932V17.456H69.128C70.64 17.456 71.928 17.7173 72.992 18.24C74.056 18.7627 74.8493 19.4813 75.372 20.396C75.9133 21.3107 76.184 22.3467 76.184 23.504ZM68.96 26.332C70.0427 26.332 70.8453 26.0893 71.368 25.604C71.8907 25.1 72.152 24.4 72.152 23.504C72.152 21.6 71.088 20.648 68.96 20.648H65.852V26.332H68.96Z" fill="#232323"/>
                <path d="M85.7992 17.456C87.8525 17.456 89.6538 17.8573 91.2032 18.66C92.7712 19.4627 93.9752 20.6107 94.8152 22.104C95.6738 23.5787 96.1032 25.296 96.1032 27.256C96.1032 29.216 95.6738 30.9333 94.8152 32.408C93.9752 33.864 92.7712 34.9933 91.2032 35.796C89.6538 36.5987 87.8525 37 85.7992 37H78.9672V17.456H85.7992ZM85.6592 33.668C87.7125 33.668 89.2992 33.108 90.4192 31.988C91.5392 30.868 92.0992 29.2907 92.0992 27.256C92.0992 25.2213 91.5392 23.6347 90.4192 22.496C89.2992 21.3387 87.7125 20.76 85.6592 20.76H82.8872V33.668H85.6592Z" fill="#232323"/>
                <path d="M111.105 17.456V20.62H102.957V25.632H109.201V28.74H102.957V37H99.0375V17.456H111.105Z" fill="#232323"/>
                <path d="M29.75 32.25C29.9489 32.25 30.1397 32.329 30.2803 32.4697C30.421 32.6103 30.5 32.8011 30.5 33V35.25C30.5 35.388 30.612 35.5 30.75 35.5H43.25C43.3163 35.5 43.3799 35.4737 43.4268 35.4268C43.4737 35.3799 43.5 35.3163 43.5 35.25V33C43.5 32.8011 43.579 32.6103 43.7197 32.4697C43.8603 32.329 44.0511 32.25 44.25 32.25C44.4489 32.25 44.6397 32.329 44.7803 32.4697C44.921 32.6103 45 32.8011 45 33V35.25C45 35.7141 44.8156 36.1592 44.4874 36.4874C44.1592 36.8156 43.7141 37 43.25 37H30.75C30.2859 37 29.8408 36.8156 29.5126 36.4874C29.1844 36.1592 29 35.7141 29 35.25V33C29 32.8011 29.079 32.6103 29.2197 32.4697C29.3603 32.329 29.5511 32.25 29.75 32.25Z" fill="black"/>
                <path d="M30.22 24.97C30.2896 24.9003 30.3722 24.8451 30.4631 24.8074C30.5541 24.7697 30.6516 24.7502 30.75 24.7502C30.8484 24.7502 30.9459 24.7697 31.0369 24.8074C31.1278 24.8451 31.2104 24.9003 31.28 24.97L36.25 29.939V17.75C36.25 17.5511 36.329 17.3603 36.4697 17.2197C36.6103 17.079 36.8011 17 37 17C37.1989 17 37.3897 17.079 37.5303 17.2197C37.671 17.3603 37.75 17.5511 37.75 17.75V29.939L42.72 24.97C42.8606 24.8294 43.0512 24.7505 43.25 24.7505C43.4488 24.7505 43.6394 24.8294 43.78 24.97C43.9206 25.1106 43.9995 25.3012 43.9995 25.5C43.9995 25.6988 43.9206 25.8894 43.78 26.03L37.53 32.28C37.4604 32.3497 37.3778 32.4049 37.2869 32.4426C37.1959 32.4803 37.0984 32.4998 37 32.4998C36.9016 32.4998 36.8041 32.4803 36.7131 32.4426C36.6222 32.4049 36.5396 32.3497 36.47 32.28L30.22 26.03C30.1503 25.9604 30.0951 25.8778 30.0574 25.7869C30.0197 25.6959 30.0002 25.5984 30.0002 25.5C30.0002 25.4016 30.0197 25.3041 30.0574 25.2131C30.0951 25.1222 30.1503 25.0396 30.22 24.97Z" fill="black"/>
            </svg>
        </a>
    </div>
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
                        @if($found->foto_identitas)
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
