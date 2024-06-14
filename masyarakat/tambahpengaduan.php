<div class="col-12 col-lg-10 mx-auto">
    <div class="card radius-15">
        <div class="container mt-5">
            <div class="section-title">
                <h2>Tambah Laporan</h2>
            </div>
            <div class="card-body p-bd-5">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="date" name="tgl_pengaduan" id="" class="form-control mt-3">
                    </div>
                    <div class="form-group">
                        <label for="">foto</label>
                        <input type="file" name="foto" id="" class="form-control mt-3">
                    </div>
                    <div class="form-group">
                        <label for="">Isi Laporan</label>
                        <textarea col="30" rows="6" name="isi_laporan" class="form-control mt-3" id=""></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-sm btn-info mt-3"><i class="bi bi-send"></i> Submit</button>
                    <button type="button" onclick="window.history.back()" class="btn btn-sm btn-secondary mt-3"><i class="bi bi-arrow-counterclockwise"></i> Kembali</button>
                </form>
                <?php
                include 'koneksi.php';
                if (isset($_POST['submit'])) {
                    $nik = $_SESSION['masyarakat']['nik'];
                    $tanggal = $_POST['tgl_pengaduan'];
                    $isi_laporan = $_POST['isi_laporan'];
                    $status = 0;

                    $foto = $_FILES['foto']['name'];
                    $lokasi = $_FILES['foto']['tmp_name'];
                    move_uploaded_file($lokasi, "../foto/" . $foto);

                    if ($nik && $tanggal && $isi_laporan != "") {
                        $query = "INSERT INTO pengaduan(tgl_pengaduan,nik,isi_laporan,foto,status) 
                        VALUES('$tanggal','$nik','$isi_laporan','$foto','$status')";
                        $sql = mysqli_query($koneksi, $query);
                        if ($sql) {
                            echo '<script>
                Swal.fire({
                    title: "Pengaduan Terkirim!",
                    text: "Terimakasih Telah menggunakan Layanan Kami.",
                    icon: "success",
                    willClose: () => {
                        window.location.href = "index.php";
                    }
                });
              </script>';
                        }
                    } else {
                        echo '<script>
                        Swal.fire({
                            title: "Gagal Mengirim Pengaduan",
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