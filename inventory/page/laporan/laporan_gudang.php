



<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Stok Alat Ganti Komputer</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
										<th>No</th>
									  <th>Kod Barang</th>												
										<th>Kategori</th>
										<th>Enter By:</th>
										<th>Jumlah</th>
								</tr>
										</thead>
										
               
                  <tbody>
                    <?php 
									
									$no = 1;
									$sql = $koneksi->query("SELECT * FROM gudang INNER JOIN users ON gudang.enter_by = users.username");
									while ($data = $sql->fetch_assoc()) {
										
									?>
									
              <tr>
               <td><?php echo $no++; ?></td>
								
 											<td><?php echo $data['kode_barang'] ?></td>
											<td><?php echo $data['jenis_barang'] ?></td>
										  <td><?php echo $data['nama'] ?></td>
										  <td><?php echo $data['jumlah'] ?></td>
              </tr>
									<?php }?>

										   </tbody>
                                </table>
								<a href="page/laporan/export_laporan_gudang_excel.php"  class="btn btn-primary" style="margin-top:8 px"><i class="fa fa-print"></i>ExportToExcel</a>
								
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>












