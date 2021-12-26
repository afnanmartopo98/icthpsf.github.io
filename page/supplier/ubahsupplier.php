

<?php
 $id = $_GET['id'];
 $sql2 = $koneksi->query("select * from jenis_barang where id = '$id'");
 $tampil = $sql2->fetch_assoc();
 

 
 
 
 ?>
 
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Kategori</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							
							
							<div class="body">

							<form method="POST" enctype="multipart/form-data">
							
							<label for="">Kategori</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="jenis_barang" value="<?php echo $tampil['jenis_barang']; ?>" class="form-control" />
	 
							</div>
                            </div>
							
							<!--<label for="">Nama Supplier</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_supplier" value="<?php echo $tampil['nama_supplier']; ?>" class="form-control" />
	 
							</div>
                            </div>
							
							<label for="">Alamat</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="alamat" value="<?php echo $tampil['alamat']; ?>" class="form-control" />
	 
							</div>
                            </div>
							
							<label for="">Telepon</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="telepon" value="<?php echo $tampil['telepon']; ?>" class="form-control" />
	 
							</div>
                            </div>-->
							
						
							
							
						
							
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							
							</form>
							
							
							
							<?php
							
							if (isset($_POST['simpan'])) {
								
								$id= $_POST['id'];
								$jenis_barang= $_POST['jenis_barang'];
								//$alamat= $_POST['alamat'];
								//$telepon= $_POST['telepon'];
								
								
								$sql = $koneksi->query("update jenis_barang set jenis_barang='$jenis_barang' where id='$id'"); 
								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berjaya Diubah");
										window.location.href="?page=jenisbarang";
										</script>
										
										<?php
								}
							
								}
							
							
								
							?>
										
										
										
								
								
								
								
								
