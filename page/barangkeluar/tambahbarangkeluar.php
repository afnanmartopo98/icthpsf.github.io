  
   <script>
 function sum() {
	 var stok = document.getElementById('stok').value;
	 var jumlahkeluar = document.getElementById('jumlahkeluar').value;
	 var result = parseInt(stok) - parseInt(jumlahkeluar);
	 if (!isNaN(result)) {
		 document.getElementById('total').value = result;
	 }
 }
 </script>
  
  <?php 
  
  
$koneksi = new mysqli("localhost","root","","inventori");
$no = mysqli_query($koneksi, "select id_transaksi from barang_keluar order by id_transaksi desc");
$idtran = mysqli_fetch_array($no);
$kode = $idtran['id_transaksi'];


$urut = substr($kode, 8, 3);
$tambah = (int) $urut + 1;
$bulan = date("m");
$tahun = date("y");

if(strlen($tambah) == 1){
	$format = "ICT-".$bulan.$tahun."00".$tambah;
} else if(strlen($tambah) == 2){
	$format = "ICT-".$bulan.$tahun."0".$tambah;
	
} else{
	$format = "ICT-".$bulan.$tahun.$tambah;

}

  

$tanggal_keluar = date("Y-m-d");


?>
  
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Barang Keluar</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							
							
							<div class="body">
							
							<form method="POST" enctype="multipart/form-data">
							
							<label for="">Id Transaksi</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="id_transaksi" class="form-control" id="id_transaksi" value="<?php echo $format; ?>" readonly />  
							</div>
                            </div>
							
						
							
							<label for="">Tarikh Keluar</label>
                            <div class="form-group">
                               <div class="form-line">
                                 <input type="date" name="tanggal_keluar" class="form-control" id="tanggal_kelauar" value="<?php echo $tanggal_keluar; ?>" />
							</div>
                            </div>
							
							 <label for="">Butiran</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_barang" class="form-control" id="nama_barang" />	 
							</div>
                            </div>
					
							<label for="">Kategori</label>
                            <div class="form-group">
                               <div class="form-line">
                                <select name="barang" id="cmb_barang" class="form-control" />
								<option value="">-- Pilih Kategori  --</option>
								<?php
								
								$sql = $koneksi -> query("select * from gudang order by kode_barang");
								while ($data=$sql->fetch_assoc()) {
									echo "<option value='$data[kode_barang].$data[jenis_barang]'>$data[kode_barang] | $data[jenis_barang]</option>";
								}
								?>
								
								</select>
                                     
									 
							</div>
                            </div>
							<div class="tampung"></div>
					
							<label for="">Jumlah</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="jumlahkeluar" id="jumlahkeluar" onkeyup="sum()" class="form-control" />
							
                                     
									 
							</div>
                            </div>
							
							<label for="total">Total Stok</label>
                            <div class="form-group">
                               <div class="form-line">
                               <input readonly="readonly" name="total" id="total" type="number" class="form-control">
                            

							</div>
                            </div>

                             <label for="">Enter By</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input readonly type="text" name="enter_by" class="form-control" id="enter_by" value="<?php echo $user = $_SESSION['login_user']; ?>"/>			 
							</div>
                            </div>
							
							
							
						
						
							
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							
							</form>
							
							
							
							<?php
							
								if (isset($_POST['simpan'])) {
								$id_transaksi= $_POST['id_transaksi'];
								$tanggal= $_POST['tanggal_keluar'];

								$barang= $_POST['barang'];
								$nama_barang= $_POST['nama_barang'];
								$pecah_barang = explode(".", $barang);
								$kode_barang = $pecah_barang[0];
								//$nama_barang = $pecah_barang[1];
								$jumlah= $_POST['jumlahkeluar'];
								
								//$satuan= $_POST['satuan'];
								//$tujuan= $_POST['tujuan'];
								$enter_by=$_POST['enter_by'];
								
								
								$total= $_POST['total'];
								$sisa2 = $total;
								if ($sisa2 < 0) {
									?>
									
										<script type="text/javascript">
										alert("Stok Barang Habis, Transaksi Tidak Dapat Dilakukan");
										window.location.href="?page=barangkeluar&aksi=tambahbarangkeluar";
										</script>
										
											<?php
								}else {
							
								
								$sql = $koneksi->query("insert into barang_keluar (id_transaksi, tanggal, nama_barang,kode_barang, jumlah,enter_by ) values('$id_transaksi','$tanggal','$nama_barang','$kode_barang','$jumlah','$enter_by')");
								$sql2 = $koneksi-> query("update gudang set jumlah=(jumlah) where kode_barang='$kode_barang'");
								?>
								


									
									
									<script type="text/javascript">
										alert("Data berjaya disimpan");
										window.location.href="?page=barangkeluar";
										
										</script>
										<?php
								}
							}
							
							
							?>
								
								
								
								
								
