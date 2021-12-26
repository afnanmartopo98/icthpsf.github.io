




 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Barang Masuk</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                                        <tr>
											<th>No</th>
											<th>Kod Item</th>
											<th>Tarikh Masuk</th>
											<th>Kategori</th> 
											 
											<th>Enter By</th>                      
											<th>Jumlah Masuk</th>	
											<th>Tindakan</th>
                                         
                                        </tr>
										</thead>
										
               
                  <tbody>
                    <?php 
									
									$no = 1;
									$sql = $koneksi->query("SELECT barang_masuk.id_transaksi, barang_masuk.tanggal,gudang.jenis_barang,users.nama,barang_masuk.jumlah FROM barang_masuk JOIN gudang ON barang_masuk.kode_barang = gudang.kode_barang JOIN users ON barang_masuk.enter_by = users.username ");
									while ($data = $sql->fetch_assoc()) {
										
									?>
									
                                        <tr>
                                            <td><?php echo $no++; ?></td>
											<td><?php echo $data['id_transaksi'] ?></td>
											<td><?php echo $data['tanggal'] ?></td>
											<td><?php echo $data['jenis_barang'] ?></td>
							 
											<td><?php echo $data['nama'] ?></td>                  
											<td><?php echo $data['jumlah'] ?></td>

											
											
								

											<td>
											
											<a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=barangmasuk&aksi=hapusbarangmasuk&id_transaksi=<?php echo $data['id_transaksi'] ?>" class="btn btn-danger" >Padam</a>
											</td>
                                        </tr>
									<?php }?>

										   </tbody>
                                </table>
								<a href="?page=barangmasuk&aksi=tambahbarangmasuk" class="btn btn-primary" >Tambah</a>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>












