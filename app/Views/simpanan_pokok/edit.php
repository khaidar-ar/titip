<!DOCTYPE html>
<html>
<head>
    <title>Edit Simpanan Pokok</title>
</head>
<body>
    <h2>Edit Simpanan Pokok</h2>
    <form method="post" action="/simpanan_pokok/update/<?= $simpanan_pokok['id_simpanan_pokok']; ?>">
        <label>ID Anggota</label>
        <select name="id_anggota" required>
            <?php foreach($anggota as $a): ?>
            <option value="<?= $a['id_anggota']; ?>" <?= ($a['id_anggota'] == $simpanan_pokok['id_anggota']) ? 'selected' : ''; ?>><?= $a['nama']; ?></option>
            <?php endforeach; ?>
        </select><br>
        <label>Jumlah</label>
        <input type="text" name="jumlah" value="<?= $simpanan_pokok['jumlah']; ?>" required><br>
        <label>Tanggal</label>
        <input type="date" name="tanggal" value="<?= $simpanan_pokok['tanggal']; ?>"><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
