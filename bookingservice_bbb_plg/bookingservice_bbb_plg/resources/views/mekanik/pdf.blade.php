<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Stooring Batavia Pulogadung</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .title {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .info {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="title">FORM STOORING BATAVIA PULOGADUNG</div>
    <div class="info">
        <strong>Hari/Tanggal:</strong> {{ date('d-m-Y', strtotime(@$booking->tanggal)) ?? '-' }} <br>
        <strong>Alamat:</strong> {{ @$booking->Customer->alamat ?? '-' }}
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nomor Polisi</th>
                <th>Pengerjaan Service</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($history as $value)
                <tr>
                    <td>{{ @$value->id }}</td>
                    <td>{{ @$value->Customer->name }}</td>
                    <td>{{ @$value->no_polisi }}</td>
                    <td>{{ @$value->Service->name }}</td>
                    <td>{{ @$value->catatan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
