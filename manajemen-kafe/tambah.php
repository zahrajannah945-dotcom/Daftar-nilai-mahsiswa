
<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $kode = $_POST['kode_menu'];
    $nama = $_POST['nama_menu'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];

    if ($kode == "" || $nama == "" || $kategori == "" || $harga == "" || $status == "") {
        echo "Semua kolom harus diisi!";
    } elseif (!is_numeric($harga)) {
        echo "Harga harus berupa angka!";
    } else {
        $sql = "INSERT INTO menu (kode_menu, nama_menu, kategori, harga, status)
                VALUES ('$kode', '$nama', '$kategori', '$harga', '$status')";

        if (mysqli_query($conn, $sql)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Gagal menyimpan data. Pastikan kode menu belum digunakan.";
        }
    }
}
?>

<h2>Tambah Menu</h2>

<form method="POST">
    Kode Menu:<br>
    <input type="text" name="kode_menu" required><br><br>

    Nama Menu:<br>
    <input type="text" name="nama_menu" required><br><br>

    Kategori:<br>
    <select name="kategori" required>
        <option value="">Pilih kategori</option>
        <option value="Makanan">Makanan</option>
        <option value="Minuman">Minuman</option>
        <option value="Camilan">Camilan</option>
    </select><br><br>

    Harga:<br>
    <input type="number" name="harga" min="0" required><br><br>

    Status:<br>
    <select name="status" required>
        <option value="">Pilih status</option>
        <option value="Tersedia">Tersedia</option>
        <option value="Habis">Habis</option>
    </select><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>

<br>
<a href="index.php">Kembali</a>
