<!DOCTYPE html>
<html>
<head>
    <title>Edit Transaksi</title>
</head>
<body>
    <h2>Edit Transaksi</h2>
    <form method="post" action="/transaksi/update/<?= $transaksi['id_transaksi']; ?>">
        <label>ID Anggota</label>
        <select name="id_anggota" required>
            <?php foreach($anggota as $a): ?>
            <option value="<?= $a['id_anggota']; ?>" <?= ($a['id_anggota'] == $transaksi['id_anggota']) ? 'selected' : ''; ?>><?= $a['nama']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label>Jenis Transaksi</label>
        <select name="jenis_transaksi" required>
            <option value="Simpanan Wajib" <?= ($transaksi['jenis_transaksi'] == 'Simpanan Wajib') ? 'selected' : ''; ?>>Simpanan Wajib</option>
            <option value="Simpanan Pokok" <?= ($transaksi['jenis_transaksi'] == 'Simpanan Pokok') ? 'selected' : ''; ?>>Simpanan Pokok</option>
        </select><br>
        <label>Jumlah</label>
        <input type="text" name="jumlah" value="<?= $transaksi['jumlah']; ?>" required><br>
        <label>Tanggal</label>
        <input type="date" name="tanggal" value="<?= $transaksi['tanggal']; ?>"><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>


