<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kos | Form</title>
    <style>
        <style>
        body { font-family: sans-serif; margin: 40px; color: #333; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="number"], textarea {
            width: 90%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover { background-color: #0056b3; }
        .back-link { margin-top: 20px; display: inline-block; }
    </style>
    </style>
</head>
<body>
    <h1>Form Pembuatan Data Kos Baru</h1>

    <form action="/kos" method="POST">
        @csrf <div class="form-group">
            <label for="nama">Nama Kos</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan nama properti kos">
        </div>

        <div class="form-group">
            <label for="harga">Harga per Kamar</label>
            <input type="number" id="harga" name="harga" placeholder="Harga per Kamar"></textarea>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap"></textarea>
        </div>

        <button type="submit">Simpan Data</button>
    </form>
</body>
</html>