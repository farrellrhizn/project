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
    <title>Dashboard || Sembakouu</title>
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
				<li><a href="admin.php">Admin</a></li>
				<li><a href="listbarang.php">Barang</a></li>
				<li><a href="listsupplier.php">Supplier</a></li>
				<li><a href="listsupplier.php">Transaksi</a></li>
				<li><a href="listsupplier.php">Laporan</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
			<h4><br><br><br>Selamat Datang &nbsp;<?php echo $_SESSION['user_global']->NamaAdmin ?> di Sembakouu<br><br></h4>
		</div>
	</header>
	
	<!-- Content -->
	<div class="section">
		<div class="container">
			<h1>Dashboard</h1>
			<div class="box">
				<h4>Selamat Datang <?php echo $_SESSION['user_global']->NamaAdmin ?> di BukaToko</h4>
			</div>
		</div>
	</div>
	
	<!-- Footer -->
	<footer class="container">
		<div class="pull-right">
			<a href="" target="_blank">Group B5</a>
		</div>
		<div class="pull-left">
			<span>Copyright &copy; 2022 - BukaToko.</span> © <a href="https://www.instagram.com/farishasan_13/" target="_blank">Developer</a>
		</div>
	</footer>
</body>
</html>