
<?php
if (isset($_POST['submit']))
{?>

 <?php



	$koneksi = new mysqli("localhost","root","","inventori");

	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan_Barang_Masuk (".date('d-m-Y').").xls");
	
	$bln = $_POST['bln'] ;
	$thn = $_POST['thn'] ;

?>	

<body>
<center>
<h2>Laporan Barang Masuk Bulan <?php echo $bln;?> Tahun <?php echo $thn;?></h2>
</center>
<table border="1">
  <tr>
											<th>No</th>
											<th>Kod Item</th>
											<th>Tarikh Masuk</th>
											<th>Kategori</th> 
											<th>Butiran</th> 
											<th>Enter By</th>                      
											<th>Jumlah Masuk</th>
										
                                         
   </tr>
	

                    <?php 
									
									$no = 1;
									$sql = $koneksi->query("SELECT barang_masuk.id_transaksi, barang_masuk.tanggal,gudang.jenis_barang,barang_masuk.nama_barang,users.nama,barang_masuk.jumlah FROM barang_masuk JOIN gudang ON barang_masuk.kode_barang = gudang.kode_barang JOIN users ON barang_masuk.enter_by = users.username where MONTH(tanggal) = '$bln' and YEAR(tanggal) = '$thn'");
									while ($data = $sql->fetch_assoc()) {
										
									?>
									
                   <tr>
                     <td><?php echo $no++; ?></td>
											<td><?php echo $data['id_transaksi'] ?></td>
											<td><?php echo $data['tanggal'] ?></td>
											<td><?php echo $data['jenis_barang'] ?></td>
											<td><?php echo $data['nama_barang'] ?></td> 
											<td><?php echo $data['nama'] ?></td>                  
											<td><?php echo $data['jumlah'] ?></td>
								

                   </tr>
									<?php }?>
					</table>	
					</body>
                                
	<?php 
	}
	?>
	
	<?php

	$koneksi = new mysqli("localhost","root","","inventori");
	

	$bln = $_POST['bln'] ;
	$thn = $_POST['thn'] ;
	?>
	
	<?php
	if ($bln == 'all') {
		?>
	<div class="table-responsive">
							
                                <table  class="display table table-bordered" id="transaksi">
								
                                    <thead>
                                      <tr>
											<th>No</th>
											<th>Kod Item</th>
											<th>Tarikh Masuk</th>
											<th>Kategori</th> 
											<th>Butiran</th> 
											<th>Enter By</th>                      
											<th>Jumlah Masuk</th>
										
                                         
                                        </tr>
                                    </thead>
		<tbody>
									
		
		<?php
		$no = 1;
		$sql = $koneksi->query("SELECT barang_masuk.id_transaksi, barang_masuk.tanggal,gudang.jenis_barang,barang_masuk.nama_barang,users.nama,barang_masuk.jumlah FROM barang_masuk JOIN gudang ON barang_masuk.kode_barang = gudang.kode_barang JOIN users ON barang_masuk.enter_by = users.username where YEAR(tanggal) = '$thn'");
		while ($data = $sql->fetch_assoc()) {
									
		?>
	
						
				 <tr>
                    <td><?php echo $no++; ?></td>
											<td><?php echo $data['id_transaksi'] ?></td>
											<td><?php echo $data['tanggal'] ?></td>
											<td><?php echo $data['jenis_barang'] ?></td>
											<td><?php echo $data['nama_barang'] ?></td> 
											<td><?php echo $data['nama'] ?></td>                  
											<td><?php echo $data['jumlah'] ?></td>
								

                                        </tr>
						<?php 
						}
						?>

					</tbody>
                    </table>
					</div>
					
					
					<?php
					}
					else{ ?>
						<div class="table-responsive">
							
                                <table  class="display table table-bordered" id="transaksi">
								
                                     <thead>
                                      <tr>
											<th>No</th>
											<th>Kod Item</th>
											<th>Tarikh Masuk</th>
											<th>Kategori</th> 
											<th>Butiran</th> 
											<th>Enter By</th>                      
											<th>Jumlah Masuk</th>
						
                                        </tr>
                                    </thead>
		<tbody>
									
		
		<?php
		$no = 1;
		$sql = $koneksi->query("SELECT barang_masuk.id_transaksi, barang_masuk.tanggal,gudang.jenis_barang,barang_masuk.nama_barang,users.nama,barang_masuk.jumlah FROM barang_masuk JOIN gudang ON barang_masuk.kode_barang = gudang.kode_barang JOIN users ON barang_masuk.enter_by = users.username where MONTH(tanggal) = '$bln' and YEAR(tanggal) = '$thn'");
			while ($data = $sql->fetch_assoc()) {
									
		?>
	
						 <tr>
                      <td><?php echo $no++; ?></td>
											<td><?php echo $data['id_transaksi'] ?></td>
											<td><?php echo $data['tanggal'] ?></td>
											<td><?php echo $data['jenis_barang'] ?></td>
											<td><?php echo $data['nama_barang'] ?></td> 
											<td><?php echo $data['nama'] ?></td>                  
											<td><?php echo $data['jumlah'] ?></td>
								
								

                                        </tr>
						<?php 
		}
		?>
    </tbody>
	</table>
</div>
	
	<?php

}

?>