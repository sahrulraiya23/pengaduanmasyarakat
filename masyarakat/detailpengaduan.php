<?php
$id = $_GET['id_pengaduan'];
$query = "SELECT * FROM pengaduan WHERE id_pengaduan = '$id'";
$sql = mysqli_query($koneksi, $query);
while ($data = mysqli_fetch_array($sql)) {
?>
    <div class="col-12 col-lg-10 mx-auto">
        <div class="card radius-15">
            <div class="container mt-5">
                <div class="section-title">
                    <h2>Detail Laporan Masyarakat</h2>
                </div>
                <div class="card-body" style="font-family:Poppins">
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <p><?php echo $data['tgl_pengaduan'] ?></p>
                    </div>
                    <div class="form-group">
                        <label for="">Foto Laporan</label><br>
                        <img src="../foto/<?php echo $data['foto'] ?>" alt="Foto Laporan" class="img-fluid" style="height:100px;">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">Isi Laporan</label>
                        <p><?php echo $data['isi_laporan'] ?></p>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <p><?php echo strtoupper($data['status']) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }

$querytanggapan = "SELECT * FROM tanggapan JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas WHERE id_pengaduan='$id'";
$sql = mysqli_query($koneksi, $querytanggapan);
?>

<div class="col-12 col-lg-10 mx-auto mt-5" style="margin-bottom: 50px;">
    <div class=" card radius-15">
        <div class="container mt-5">
            <div class="section-title">
                <h2>Tanggapan Petugas</h2>
            </div>
            <?php if (mysqli_num_rows($sql) > 0) { ?>
                <?php while ($data = mysqli_fetch_array($sql)) { ?>
                    <div class="card-body" style="font-family:Poppins">
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <p><?php echo $data['tgl_tanggapan'] ?></p>
                        </div>
                        <div class="form-group">
                            <label for="">Isi Tanggapan</label>
                            <p><?php echo $data['tanggapan'] ?></p>
                        </div>
                        <div class="form-group">
                            <label for="">Petugas</label>
                            <p><?php echo $data['nama_petugas'] ?></p>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="card-body" style="font-family:Poppins">
                    <h4 class="text-center">Belum ada Tanggapan</h4>
                </div>
            <?php } ?>
        </div>
    </div>
</div>