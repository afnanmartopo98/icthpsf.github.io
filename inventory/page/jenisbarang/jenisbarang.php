




 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Kategori Alat Ganti</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                                        <tr>
											<th>No</th>
											<th>Kategori</th>
											
											<th>Tindakan</th>
                                         
                                        </tr>
										</thead>
										
               
                  <tbody>
                    <?php 
									
									$no = 1;
									$sql = $koneksi->query("select * from jenis_barang");
									while ($data = $sql->fetch_assoc()) {
										
									?>
									
                                        <tr>
                                            <td><?php echo $no++; ?></td>
											<td><?php echo $data['jenis_barang'] ?></td>
											
                                         

											<td>
											<a href="?page=jenisbarang&aksi=ubahbarang&id=<?php echo $data['id'] ?>" class="btn btn-success" >Ubah</a>
											<a onclick="return confirm('Adakah anda yakin akan membuang data ini?')" href="?page=supplier&aksi=hapussupplier&id=<?php echo $data['kode_supplier'] ?>" class="btn btn-danger" >Padam</a>
											</td>
                                        </tr>
									<?php }?>

										   </tbody>
                                </table>
								<a href="?page=jenisbarang&aksi=tambahjenis" class="btn btn-primary" >Tambah</a>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>












