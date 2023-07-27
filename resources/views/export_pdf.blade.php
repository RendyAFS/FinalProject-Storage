<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Claim History</title>
    <style>
        html {
            font-size: 12px;
        }

        .table {
            border-collapse: collapse !important;
            width: 100%;
        }

        .table-bordered th,
        .table-bordered td {
            padding: 0.5rem;
            border: 1px solid black !important;
        }
    </style>
</head>
<body>
    <h1>Claim History</h1>
    <table class="table table-bordered">
        <thead>
            <tr class="fs-5 text-center">
                <th>Nama Pengambil</th>
                <th>Nama Barang</th>
                <th>Tanggal Claim</th>
                <th>Nomor Hp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($founds as $found)
                <tr class="text-center">
                    <td class="align-middle">{{ $found->nama }}</td>
                    <td class="align-middle">{{ $found->nama_barang }}</td>
                    <td class="align-middle">{{ date('d-m-Y', strtotime($found->tgl_claim)) }}</td>
                    <td class="align-middle">{{ $found->nomorhp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
