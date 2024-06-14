<?php
include 'koneksi.php';
$nik = "";
$tanggal = "";
$isi_laporan = "";
$status = "";

$id = $_GET['id_pengaduan'];
$query = "SELECT*FROM pengaduan WHERE id_pengaduan = '$id'";
$sql = mysqli_query($koneksi, $query);
while ($data = mysqli_fetch_array($sql)) {
?>
    <div class="col-12 col-lg-10 mx-auto">
        <div class="card radius-15">
            <div class="container mt-5">
                <div class="section-title">
                    <h2>Edit Laporan</h2>
                </div>
                <div class="card-body p-bd-5">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <input type="date" name="tgl_pengaduan" value="<?php echo $data['tgl_pengaduan']; ?>" id="" class="form-control mt-3">
                        </div>
                        <div class="form-group">
                            <label for="">foto</label>
                            <input type="file" name="foto" value="<?php echo $data['foto']; ?>" id="" class="form-control mt-3">
                        </div>
                        <div class="form-group">
                            <label for="">Isi Laporan</label>
                            <textarea name="isi_laporan" class="form-control" id=""><?php echo $data['isi_laporan']; ?></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-sm btn-info mt-3"><i class="bi bi-send"></i> Submit</button>
                        <button type="button" onclick="window.history.back()" class="btn btn-sm btn-secondary mt-3"><i class="bi bi-arrow-counterclockwise"></i> Kembali</button>
                    </form>
                <?php
            }

            if (isset($_POST['submit'])) {
                $nik = $_SESSION['masyarakat']['nik'];
                $tanggal = $_POST['tgl_pengaduan'];
                $isi_laporan = $_POST['isi_laporan'];
                $status = 0;
                if ($_FILES["foto"]["name"] != "") {
                    $queryhapus = "SELECT * FROM pengaduan WHERE id_pengaduan='$id'";
                    $sql = mysqli_query($koneksi, $queryhapus);
                    $data = mysqli_fetch_array($sql);
                    unlink("../foto/" . $data['foto']);

                    $foto = $_FILES['foto']['name'];
                    $dir = "../foto/";
                    $dirfile = $_FILES['foto']['tmp_name'];
                    move_uploaded_file($dirfile, $dir . $foto);

                    $query = "UPDATE pengaduan SET tgl_pengaduan='$tanggal',nik='$nik',isi_laporan='$isi_laporan',foto='$foto',status='$status' WHERE id_pengaduan='$id'";
                    $sql = mysqli_query($koneksi, $query);
                } else {
                    $query = "UPDATE pengaduan SET tgl_pengaduan='$tanggal',nik='$nik',isi_laporan='$isi_laporan',status='$status' WHERE id_pengaduan='$id'";
                    $sql = mysqli_query($koneksi, $query);
                }
                if ($sql) {
                    echo '<script>
                    Swal.fire({
                        title: "Pengaduan Berhasil Diedit!",
                        text: "Terimakasih Telah menggunakan Layanan Kami.",
                        icon: "success",
                        willClose: () => {
                            window.location.href = "index.php";
                        }
                    });
                  </script>';
                } else {

                    echo '<script>
                        Swal.fire({
                            title: "Gagal Mengedit Pengaduan",
                            text: "Silahkan Coba Lagi!",
                            icon: "error",
                        });
                      </script>';
                }
            }
                ?>
                </div>
            </div>
        </div>
    </div>