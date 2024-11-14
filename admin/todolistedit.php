<?php

$idtodolist = $koneksi->query("SELECT * FROM todolist WHERE idtodolist = '$_GET[id]'");
$data = $idtodolist->fetch_assoc();
?>
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Edit To Do List</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Edit To Do List</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit To Do List</h5>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-12 col-lg-12">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label>Judul To Do List</label>
                                                <input type="text" class="form-control" name="judul_todolist" value="<?= $data['judul_todolist'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label>Tanggal To Do List</label>
                                                <input type="date" class="form-control" name="tanggal_todolist" value="<?= $data['tanggal_todolist'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label>Deadline To Do List</label>
                                                <input type="date" class="form-control" name="deadline_todolist" value="<?= $data['deadline_todolist'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Deskripsi todolist</label>
                                                <textarea class="form-control" name="isi_todolist" id="isi" required><?= $data['isi_todolist'] ?></textarea>
                                                <script>
                                                    CKEDITOR.replace('isi');
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <a target="_blank" class="btn btn-primary" href="../foto/<?php echo $data['lampiran']; ?>">Lihat Lampiran</a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label>Lampiran </label>
                                                <input type="file" class="form-control" name="lampiran">
                                                <p>Kosongkan jika tidak ingin mengubah gambar<p>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary float-right" name="ubah">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
if (isset($_POST['ubah'])) {

    $namalampiran = $_FILES['lampiran']['name'];
    $lokasilampiran = $_FILES['lampiran']['tmp_name'];

    if (!empty($lokasilampiran)) {
        move_uploaded_file($lokasilampiran, "../foto/$namalampiran");

        $koneksi->query("UPDATE todolist SET judul_todolist='$_POST[judul_todolist]',tanggal_todolist='$_POST[tanggal_todolist]',deadline_todolist='$_POST[deadline_todolist]',isi_todolist='$_POST[isi_todolist]',lampiran='$namalampiran' WHERE idtodolist='$_GET[id]'");
    } else {
        $koneksi->query("UPDATE todolist SET judul_todolist='$_POST[judul_todolist]', tanggal_todolist='$_POST[tanggal_todolist]',deadline_todolist='$_POST[deadline_todolist]',isi_todolist='$_POST[isi_todolist]' WHERE idtodolist='$_GET[id]'");
    }
    echo "<script>alert('Data Berhasil Diubah');</script>";
    echo "<script>location='index.php?halaman=todolistdaftar';</script>";
}
?>