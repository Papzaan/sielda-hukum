<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #000000;
            text-align: center;
            height: 20px;
            margin: 8px;
        }
    </style>
</head>

<body>
    <div style="font-size:24px; color:'#dddddd'"><i>Kode Surat</i></div>
    <hr>
    <hr>
    <p></p>
    <p style="font-size:15px">
        Kode Surat: <?= $data->id ?><br>
        Nomor Surat : <?= $data->no_usulan ?><br>
        Judul : <?= $data->judul ?><br>
    </p>
</body>

</html>