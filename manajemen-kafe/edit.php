
<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM menu WHERE id='$id'");
$menu = mysqli_fetch_assoc($data);

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
        $sql = "UPDATE menu SET
                kode_menu='$kode',
                nama_menu='$nama',
                kategori='$kategori',
                harga='$harga',
                status='$status'
                WHERE id='$id'";

        if (mysqli_query($conn, $sql)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Gagal mengubah data. Pastikan kode menu belum digunakan.";
        }
    }
}
?>

<h2>Edit Menu</h2>

<form method="POST">
    Kode Menu:<br>
    <input type="text" name="kode_menu"
           value="<?php echo htmlspecialchars($menu['kode_menu']); ?>" required>
    <br><br>

    Nama Menu:<br>
    <input type="text" name="nama_menu"
           value="<?php echo htmlspecialchars($menu['nama_menu']); ?>" required>
    <br><br>

    Kategori:<br>
    <select name="kategori" required>
        <option value="Makanan" <?php if ($menu['kategori'] == 'Makanan') echo 'selected'; ?>>Makanan</option>
        <option value="Minuman" <?php if ($menu['kategori'] == 'Minuman') echo 'selected'; ?>>Minuman</option>
        <option value="Camilan" <?php if ($menu['kategori'] == 'Camilan') echo 'selected'; ?>>Camilan</option>
    </select>
    <br><br>

    Harga:<br>
    <input type="number" name="harga"
           value="<?php echo $menu['harga']; ?>" min="0" required>
    <br><br>

    Status:<br>
    <select name="status" required>
        <option value="Tersedia" <?php if ($menu['status'] == 'Tersedia') echo 'selected'; ?>>Tersedia</option>
        <option value="Habis" <?php if ($menu['status'] == 'Habis') echo 'selected'; ?>>Habis</option>
    </select>
    <br><br>

    <button type="submit" name="simpan">Simpan Perubahan</button>
</form>

<br>
<a href="index.php">Kembali</a>
