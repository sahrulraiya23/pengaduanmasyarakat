<?php
$id = $_GET['id_petugas'];
$query = "DELETE FROM petugas WHERE id_petugas='$id'";
$sql = mysqli_query($koneksi, $query);
if ($sql) {
    echo '<script>
    Swal.fire({
        title: "Data Petugas Berhasil Dihapus",
        text: "Terimakasih",
        icon: "success",
        willClose: () => {
            window.location.href = "?halaman=petugas";
        }
    });
  </script>';
}
