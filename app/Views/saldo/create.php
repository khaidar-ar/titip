<!DOCTYPE html>
<html>
<head>
    <title>Tambah Saldo</title>
</head>
<body>
    <h2>Tambah Saldo</h2>
    <form method="post" action="/saldo/store">
        <label>ID Anggota</label>
        <select name="id_anggota" required>
            <?php foreach($anggota as $a): ?>
            <option value="<?= $a['id_anggota']; ?>"><?= $a['nama']; ?></option>
            <?php endforeach; ?>
        </select><br>
        <label>Saldo Wajib</label>
        <input type="text" name="saldo_wajib" required><br>
        <label>Saldo Pokok</label>
        <input type="text" name="saldo_pokok" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
                