
<?php
include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM menu");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Menu Kafe</title>
</head>
<body>

    <h2>Manajemen Menu Kafe</h2>

    <a href="tambah.php">Tambah Menu</a>

    <br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Kode Menu</th>
            <th>Nama Menu</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php
        while ($menu = mysqli_fetch_assoc($data)) {
        ?>
        <tr>
            <td><?php echo $menu['id']; ?></td>
            <td><?php echo $menu['kode_menu']; ?></td>
            <td><?php echo $menu['nama_menu']; ?></td>
            <td><?php echo $menu['kategori']; ?></td>
            <td><?php echo $menu['harga']; ?></td>
            <td><?php echo $menu['status']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $menu['id']; ?>">Edit</a>

                <a href="hapus.php?id=<?php echo $menu['id']; ?>"
                   onclick="return confirm('Yakin ingin menghapus menu ini?')">
                   Hapus
                </a>
            </td>
        </tr>
        <?php
        }
        ?>

    </table>

</body>
</html>
