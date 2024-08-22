<!DOCTYPE html>
<html>
<head>
    <title>Edit Simpanan Wajib</title>
</head>
<body>
    <h2>Edit Simpanan Wajib</h2>
    <form method="post" action="/simpanan_wajib/update/<?= $simpanan_wajib['id_simpanan_wajib']; ?>">
        <label>ID Anggota</label>
        <select name="id_anggota" required>
            <?php foreach($anggota as $a): ?>
            <option value="<?= $a['id_anggota']; ?>" <?= ($a['id_anggota'] == $simpanan_wajib['id_anggota']) ? 'selected' : ''; ?>><?= $a['nama']; ?></option>
            <?php endforeach; ?>
        </select><br>
        <label>Jumlah</label>
        <input type="text" name="jumlah" value="<?= $simpanan_wajib['jumlah']; ?>" required><br>
        <label>Tanggal</label>
        <input type="date" name="tanggal" value="<?= $simpanan_wajib['tanggal']; ?>"><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
