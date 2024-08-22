<!DOCTYPE html>
<html>
<head>
    <title>Edit Saldo</title>
</head>
<body>
    <h2>Edit Saldo</h2>
    <form method="post" action="/saldo/update/<?= $saldo['id_saldo']; ?>">
        <label>ID Anggota</label>
        <select name="id_anggota" required>
            <?php foreach($anggota as $a): ?>
            <option value="<?= $a['id_anggota']; ?>" <?= ($a['id_anggota'] == $saldo['id_anggota']) ? 'selected' : ''; ?>><?= $a['nama']; ?></option>
            <?php endforeach; ?>
        </select><br>
        <label>Saldo Wajib</label>
        <input type="text" name="saldo_wajib" value="<?= $saldo['saldo_wajib']; ?>" required><br>
        <label>Saldo Pokok</label>
        <input type="text" name="saldo_pokok" value="<?= $saldo['saldo_pokok']; ?>" required><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
