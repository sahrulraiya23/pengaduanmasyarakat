<div class="card">
    <div class="card-header">
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="index.html"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Data Pengaduan Masuk</a>
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
                    ob_start();
                    $query = "SELECT*FROM pengaduan JOIN masyarakat ON pengaduan.nik=masyarakat.nik WHERE status='0' ORDER BY tgl_pengaduan DESC";
                    $sql = mysqli_query($koneksi, $query);
                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $no; ?></th>
                            <td><?php echo $data['tgl_pengaduan']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><img src="../foto/<?php echo $data['foto']; ?>" style="height: 100px;" class="img-fuild"></td>
                            <td>
                                <?php
                                if ($data['status'] == '0') {
                                    echo 'Belum dikonfirmasi';
                                } else {
                                    echo strtoupper($data['status']);
                                }
                                ?>
                            </td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">
                                    <i class="ti-check"></i> Konfirmasi
                                </button>


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Laporan Ini?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">
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
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" name="konfirm" class="btn btn-primary">Konfirmasi</button>
                                                    </div>

                                                </form>
                                            </div>




                                        </div>
                                    </div>
                                </div>



                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#batal">
                                    <i class="ti-close"></i> Tolak
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
                                                        <label class="col-sm-2 col-form-label">Alasan <br> Ditolak</label>
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
if (isset($_POST['konfirm'])) {
    $id = $_POST['id'];

    $query = "UPDATE pengaduan SET status='proses' WHERE id_pengaduan='$id'";

    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        echo '<script>
            Swal.fire({
                title: "Konfirmasi Pengaduan Berhasil",
                text: "Pengaduan sedang tahap Proses",
                icon: "success",
                willClose: () => {
                    window.location.href = "?halaman=pengaduanproses";
                }
            });
        </script>';
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
