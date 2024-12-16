<!-- app/views/member/create.php -->
<h2>Tambah Pengguna Baru</h2>
<form action="/member/store" method="POST">
<table class="table table-borderless">
    <tr>
    <td>Nama :</td>
    <td><input type="text" name="nama" id="nama" required></td>
    </tr>
    <tr>
    <td> Usia :</td>
    <td><input type="text" name="usia" id="usia" required></td>
    </tr>
    <tr>
    <td>Jenis Kelamin :</td>
    <td>
    <select name="jenis_kelamin" id="" value="<?= @$x['jenis_kelamin'] ?>">
         <option value="<?= @$x['jenis_kelamin'] ?>"required>P/L</option>
		 <option value="P"> P</option>
		 <option value="L"> L</option>
    </select>
    </td>
    </tr>
    <tr>
    <td>Paket Langganan:</td>
    <td><input type="text" name="paket_langganan" id="paket_langganan" required></td>
    </tr>
    <tr>
    <td><button type="submit">Simpan</button></td>
    </tr>
</form>
