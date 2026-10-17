
<?php
include 'koneksi.php';

$id = $_GET['id'];

$sql = "DELETE FROM menu WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
    exit;
} else {
    echo "Gagal menghapus menu!";
}
?>
