<div class="card">
    <div class="card-header">
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="index.html"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Data Pengaduan</a>
            </li>
        </ul>
        <div class="card-header-right">

        </div>
    </div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table align-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Nama Pengirim</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT*FROM pengaduan JOIN masyarakat ON pengaduan.nik=masyarakat.nik WHERE status='proses' ORDER BY tgl_pengaduan DESC";
                    $sql = mysqli_query($koneksi, $query);
                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $no; ?></th>
                            <td><?php echo $data['tgl_pengaduan']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><img src="../foto/<?php echo $data['foto']; ?>" style="height: 100px;" class="img-fuild"></td>
                            <td><?php echo strtoupper($data['status']); ?></td>
                            <td>

                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#tanggapanpetugas">
                                    <i class="ti-comments"></i>Tanggapi
                                </button>
                                <div class="modal fade" id="tanggapanpetugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tanggapi Laporan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    <input type="hidden" name="id_pengaduan" value="<?php echo $data['id_pengaduan']; ?>">
                                                    <input type="hidden" name="id_petugas" value="<?php echo $_SESSION['admin']['id_petugas']; ?>">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">NIK</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" disabled name="notelp" value="<?php echo $data['nik']; ?>" placeholder="Masukkan no. telpon">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Nama</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" disabled name="notelp" value="<?php echo $data['nama']; ?>" placeholder="Masukkan no. telpon">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Foto</label>
                                                        <div class="col-sm-10">
                                                            <img src="../foto/<?php echo $data['foto']; ?>" style="height: 60px;" class="img-fuild" alt="" srcset="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Isi Laporan</label>
                                                        <div class="col-sm-10">
                                                            <textarea name="" disabled class="form-control" id="" cols="30" rows="10"><?php echo $data['isi_laporan']; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Tanggapan Anda</label>
                                                        <div class="col-sm-10">
                                                            <textarea name="tanggapan" class="form-control" id="" cols="30" rows="10"></textarea>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" name="tanggapi" class="btn btn-primary">Tanggapi</button>
                                            </div>


                                            <!-- Modal -->

                                            </form>

                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#batal">
                                    <i class="ti-face-sad"></i>Batalkan
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="batal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tolak Laporan Ini?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="" method="post">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?php echo $data['id_pengaduan']; ?>">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">NIK</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" disabled name="notelp" value="<?php echo $data['nik']; ?>" placeholder="Masukkan no. telpon">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Nama</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" disabled name="notelp" value="<?php echo $data['nama']; ?>" placeholder="Masukkan no. telpon">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Foto</label>
                                                        <div class="col-sm-10">
                                                            <img src="../foto/<?php echo $data['foto']; ?>" style="height: 60px;" class="img-fuild" alt="" srcset="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Isi Laporan</label>
                                                        <div class="col-sm-10">
                                                            <textarea name="" class="form-control" disabled id="" cols="30" rows="10"><?php echo $data['isi_laporan'] ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Alasan <br> Dibatalkan</label>
                                                        <div class="col-sm-10">
                                                            <textarea name="tanggapan" class="form-control" id="" cols="30" rows="10"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" name="alasan" class="btn btn-inversed">Kirim Alasan</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>

        </div>
    </div>

</div>
<?php
if (isset($_POST['tanggapi'])) {
    $tanggal = date("Y-m-d");
    $id_pengaduan = $_POST['id_pengaduan'];
    $id_petugas = $_POST['id_petugas'];
    $tanggapan = $_POST['tanggapan'];
    $query = "INSERT INTO tanggapan(id_pengaduan,tgl_tanggapan,tanggapan,id_petugas)VALUES('$id_pengaduan','$tanggal','$tanggapan','$id_petugas')";
    $sql = mysqli_query($koneksi, $query);
    if ($sql) {
        $querytanggapan = "UPDATE pengaduan SET status='selesai' WHERE id_pengaduan='$id_pengaduan'";
        $sqltanggapan = mysqli_query($koneksi, $querytanggapan);
        if ($sqltanggapan) {

            echo '<script>
                    Swal.fire({
                        title: "Berhasil memberi Tanggapan",
                        text: "Terima Kasih",
                        icon: "success",
                        willClose: () => {
                            window.location.href = "?halaman=pengaduanselesai";
                        }
                    });
                </script>';
        }
    }
}

if (isset($_POST['alasan'])) {
    $tanggal = date("Y-m-d");
    $id = $_POST['id'];
    $id_petugas = $_SESSION['admin']['id_petugas'];
    $tanggapan = $_POST['tanggapan'];
    $query = "UPDATE pengaduan SET status='batal' WHERE id_pengaduan='$id'";
    $sql = mysqli_query($koneksi, $query);
    if ($sql) {
        $querytanggapan = "INSERT INTO tanggapan(id_pengaduan,tgl_tanggapan,tanggapan,id_petugas)VALUES('$id','$tanggal','$tanggapan','$id_petugas')";
        $sqltanggapan = mysqli_query($koneksi, $querytanggapan);
        if ($sqltanggapan) {
            echo '<script>
            Swal.fire({
                title: "Berhasil Menolak Pengaduan",
                text: "Terimakasih",
                icon: "error",
                willClose: () => {
                    window.location.href = "?halaman=pengaduanbatal";
                }
            });
        </script>';
        }
    }
}
?>