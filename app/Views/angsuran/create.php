<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Angsuran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }

        .container {
            max-width: 600px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-custom {
            background-color: #007bff;
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .form-group label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-4">Tambah Angsuran</h2>
        <form method="post" action="/angsuran/store">
            <div class="form-group">
                <label for="id_anggota">ID Anggota</label>
                <select class="form-control" id="id_anggota" name="id_anggota" required>
                    <?php foreach ($anggota as $a) : ?>
                        <option value="<?= $a['id_anggota']; ?>"><?= $a['nama']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="form-group">
                    <label for="jumlah_angsuran">Angsuran Pembayaran</label>
                    <input type="text" class="form-control" id="angsuran_pembayaran" name="angsuran_pembayaran">
                </div>
                <div class="form-group">
                    <label for="jumlah_angsuran">Angsuran Ke-</label>
                    <input type="text" class="form-control" id="angsuran_ke" name="angsuran_ke">
                </div>
                <div class="form-group">
                    <label for="tanggal_bayar">Tanggal Bayar</label>
                    <input type="date" class="form-control" id="tanggal_bayar" name="tanggal_bayar" required>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="dibayar">Dibayar</option>
                        <option value="tertunda">Tertunda</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-custom btn-block">Simpan</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>