<!-- app/views/equipment/create.php -->
<h2>Tambah Alat Kebugaran Baru</h2>
<form action="/equipment/store" method="POST">
    <label for="nama_alat">Nama Alat:</label><br>
    <input type="text" name="nama_alat" id="nama_alat" required></br>

    <label for="jenis_alat">Jenis Alat:</label><br>
    <input type="text" name="jenis_alat" id="jenis_alat" required></br>

    <label for="kondisi">Kondisi:</label><br>
    <input type="text" name="kondisi" id="kondisi" required></br>

    <br><button type="submit">Simpan</button></br>
</form>
