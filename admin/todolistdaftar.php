<section class="pcoded-main-container">
	<div class="pcoded-content">
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="page-header-title">
							<h5 class="m-b-10">Data To Do List</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#!">Data To Do List</a></li>
						</ul>
						<br><br>
						<a class="btn btn-primary" href="index.php?halaman=todolisttambah">Tambah Data To Do List</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h5>Data To Do List</h5>
					</div>
					<div class="card-body table-border-style">
						<div class="table-responsive">
							<table class="table table-hover" id="tabel">
								<thead>
									<tr>
										<th>No</th>
										<th>Judul</th>
										<th>Tanggal</th>
										<th>Deadline</th>
										<th>File</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									$todolist = $koneksi->query("SELECT * FROM todolist");
									$ambiltodolist = $todolist;
									while ($data = $ambiltodolist->fetch_array()) {
									?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $data['judul_todolist'] ?></td>
											<td><?= formatTanggal($data['tanggal_todolist']) ?></td>
											<td><?= formatTanggal($data['deadline_todolist']) ?></td>
											<td> <a class="btn btn-success" href="../foto/<?php echo $data['lampiran'] ?>" target="_blank">Lihat File</a>
											</td>

											<td>
												<a class="btn btn-warning" href="index.php?halaman=todolistedit&id=<?php echo $data['idtodolist']; ?>">Edit</a>
												<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" href="index.php?halaman=todolisthapus&id=<?php echo $data['idtodolist']; ?>">Hapus</a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>