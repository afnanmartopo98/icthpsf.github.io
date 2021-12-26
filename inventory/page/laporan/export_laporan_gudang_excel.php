 <?php
	
	$koneksi = new mysqli("localhost","root","","inventori");

	
	
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan_Stok_Gudang(".date('d-m-Y').").xls");

?>	

<h2>Laporan Stok Alat Ganti ICT HPSF</h2>

<table border="1">
	  <tr>
										<th>No</th>
									    <th>Kod Barang</th>												
										<th>Kategori</th>
										<th>Enter By:</th>
										<th>Jumlah</th>
										
                                         
     </tr>
	
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

                                </table>