<?php
 	session_start();
	$timeout = 1; // setting timeout dalam menit
	$logout = "login.php"; // redirect halaman logout

	$timeout = $timeout * 360; // menit ke detik
	if(isset($_SESSION['start_session'])){
		$elapsed_time = time()-$_SESSION['start_session'];
		if($elapsed_time >= $timeout){
			session_destroy();
			echo "<script type='text/javascript'>alert('Sesi telah berakhir');window.location='$logout'</script>";
		}
	}

	$_SESSION['start_session']=time();

	include('config.php');
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>Dashboard || BukaToko</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	
    <!-- header -->
	<header>
		<div class="container">
		<h1><a href="home.php">Sembakouu</a></h1>
			<ul>
				<li><a href="home.php">Dashboard</a></li>
				<li><a href="admin.php">Profile</a></li>
				<li><a href="listbarang.php">Barang</a></li>
				<li><a href="listsupplier.php">Supplier</a></li>
				<li><a href="listsupplier.php">Transaksi</a></li>
				<li><a href="listsupplier.php">Laporan</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</header>
	
	<!-- Content -->
	<div class="section">
		<div class="container">
			<h3>Data Barang</h3>
			<div class="row gutter30">
			<div class="block full">
				<div class="block-title">
					<h2><i class="fa fa-search"></i> Tambah Barang</h2>
				</div>
				<form action="addbarang.php" method="POST">
					<div class="input-group">
						<input type="text" id="search-term" value="<?php echo addslashes($_POST['add-term']); ?>" name="add-term" class="form-control" placeholder="Nama Barang...">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</form>
			</div>
			
			<div class="block full">
				<div class="block-title">
					<h2><i class="fa fa-search"></i> Cari Barang</h2>
				</div>
				<form action="" method="post">
					<div class="input-group">
						<input type="text" id="search-term" value="<?php echo addslashes($_POST['search-term']); ?>" name="search-term" class="form-control" placeholder="Cari Barang...">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</form>
			</div>
			<table align="center">
				<tr>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Kode Barang</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Nama Barang</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Jenis Barang</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Harga Beli</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Harga Jual</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Stok</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center"><b>Satuan</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center" href="editbarang.php"><b>Edit</b></td>
					<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align="center" href="#" onClick="return confirm('apakah kamu yakin?');"><b>Hapus</b></td>
				</tr>
				<?php
				$cek = mysqli_query($conn,"SELECT * FROM barang ");
					while ($tampil = mysqli_fetch_array($cek)){
					
					$id = $tampil['kdBarang'];
					$nama = $tampil['NamaBarang'];
					$jenis_barang = $tampil['jenis_barang'];
					$HargaBeli = $tampil['HargaBeli'];
					$HargaJual = $tampil['HargaJual'];
					$Stok = $tampil['Stok'];
					$Satuan = $tampil['Satuan'];
					echo "
						<tr>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$id</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$nama</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$jenis_barang</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$HargaBeli</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$HargaJual</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$Stok</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>$Satuan</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>
								<a href='admin.php?edit=$id'><img src='img/edit.jpg' width='16px' alt='Função Editar'></a>
							</td>
							<td style='border: 1px #000; padding: 10px 25px 10px 25px;' align='center'>
								<a href='hapusadmin.php'><img src='img/edit.jpg' width='16px' alt='fungsi hapus'></a>
							</td>
						</tr>
					";
		}
				?>
		</div>
	</div>
	
	
</body>

</html>