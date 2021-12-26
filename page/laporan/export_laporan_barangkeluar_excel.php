
<?php
if (isset($_POST['submit']))
{?>

 <?php



	$koneksi = new mysqli("localhost","root","","inventori");

	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan_Barang_Keluar (".date('d-m-Y').").xls");
	
	$bln = $_POST['bln'] ;
	$thn = $_POST['thn'] ;

?>	

<body>
<center>
<h2>Laporan Barang Keluar Bulan <?php echo $bln;?> Tahun <?php echo $thn;?></h2>
</center>
<table border="1">
  <tr>
											                      <th>No</th>
                                            <th>Kod Item</th>
                                            <th>Tarikh Keluar</th>
                                            <th>Kategori</th> 
                                            <th>Butiran</th> 
                                            <th>Enter By</th>                      
                                            <th>Jumlah Keluar</th>

                                        </tr>
	

                    <?php 
									
									$no = 1;
									$sql = $koneksi->query("SELECT barang_keluar.id_transaksi, barang_keluar.tanggal,gudang.jenis_barang,barang_keluar.nama_barang,users.nama,barang_keluar.jumlah FROM barang_keluar JOIN gudang ON barang_keluar.kode_barang = gudang.kode_barang JOIN users ON barang_keluar.enter_by = users.username where MONTH(tanggal) = '$bln' and YEAR(tanggal) = '$thn'");
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
                                            <th>Tarikh Keluar</th>
                                            <th>Kategori</th> 
                                            <th>Butiran</th> 
                                            <th>Enter By</th>                      
                                            <th>Jumlah Keluar</th>

                                        </tr>
                                    </thead>
		<tbody>
									
		
		<?php
		$no = 1;
		$sql = $koneksi->query("select * from barang_keluar where YEAR(tanggal) = '$thn'");
		while ($data = $sql->fetch_assoc()) {
									
		?>
	
						
				  <tr>
                                            <td><?php echo $no++; ?></td>
											                      <td><?php echo $data['id_transaksi'] ?></td>
                                            <td><?php echo $data['tanggal'] ?></td>
                                            <td><?php echo $data['jenis_barang'] ?></td>
                                            <td><?php echo $data['nama_barang'] ?></td>
                                            <td><?php echo $data['nama'] ?></td> 
                                            <td><?php echo $data['jumlah'] ?></td

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
                                            <th>Tarikh Keluar</th>
                                            <th>Kategori</th> 
                                            <th>Butiran</th> 
                                            <th>Enter By</th>                      
                                            <th>Jumlah Keluar</th>

                                        </tr>
                                    </thead>
		<tbody>
									
		
		<?php
		$no = 1;
		$sql = $koneksi->query("SELECT barang_keluar.id_transaksi, barang_keluar.tanggal,gudang.jenis_barang,barang_keluar.nama_barang,users.nama,barang_keluar.jumlah FROM barang_keluar JOIN gudang ON barang_keluar.kode_barang = gudang.kode_barang JOIN users ON barang_keluar.enter_by = users.username where MONTH(tanggal) = '$bln' and YEAR(tanggal) = '$thn'");
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