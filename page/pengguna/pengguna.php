




 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Staff ICT</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
               <tr>
											<th>No</th>
											<th>No KP</th>
											<th>Nama</th>
											<th>No Telefon</th>
											<th>Username</th>
                      <th>Kata Laluan</th>                       
											<th>Tindakan</th>
											
              </tr>
										</thead>
										
               
                  <tbody>
                    <?php 
									
									$no = 1;
									$sql = $koneksi->query("select * from users");
									while ($data = $sql->fetch_assoc()) {
										
									?>
									
                                        <tr>
                                            <td><?php echo $no++; ?></td>
											<td><?php echo $data['nik'] ?></td>
											<td><?php echo $data['nama'] ?></td>
											
											<td><?php echo $data['telepon'] ?></td>
                      <td><?php echo $data['username'] ?></td>
								
											<td><?php echo $data['password'] ?></td>
										
										
											<td>
											<a href="?page=pengguna&aksi=ubahpengguna&id=<?php echo $data['id'] ?>" class="btn btn-success" >Ubah</a>
											<a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=pengguna&aksi=hapuspengguna&id=<?php echo $data['id'] ?>" class="btn btn-danger" >Padam</a>
											</td>
                                        </tr>
									<?php }?>

										   </tbody>
                                </table>
								<a href="?page=pengguna&aksi=tambahpengguna" class="btn btn-primary" >Tambah</a>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>












