<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Claim History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 30px;
        }

        .table th, .table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tbody tr:hover {
            background-color: #e0e0e0;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Claim History</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Pengambil</th>
                <th>Nama Barang</th>
                <th>Tanggal Claim</th>
                <th>Nomor Hp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($founds as $found)
                <tr>
                    <td class="text-center">{{ $found->nama }}</td>
                    <td class="text-center">{{ $found->nama_barang }}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($found->tgl_claim)) }}</td>
                    <td class="text-center">{{ $found->nomorhp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
