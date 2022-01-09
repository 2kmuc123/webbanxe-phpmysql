

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
	#layoutSidenav_nav{
		padding-top: 56px;
		position: fixed;
		width: 200px;
		height: 100vh;
	}
</style>
<body>
<div id="layoutSidenav_nav">
	<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
		<div class="sb-sidenav-menu">
			<div class="nav">
				<div class="sb-sidenav-menu-heading"> DANH MỤC </div>
				<a class="nav-link" href="admin.php">
					<div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
					HOME
				</a>

				<a class="nav-link" href="product.php">
					<div class="sb-nav-link-icon"><i class="fas fa-motorcycle"></i></i></div>
					XE
				</a>

				<a class="nav-link" href="hangxe.php">
					<div class="sb-nav-link-icon"><i class="fab fa-bandcamp"></i></div>
					HÃNG XE
				</a>

				<a class="nav-link" href="donhang.php">
					<div class="sb-nav-link-icon"><i class="fas fa-boxes"></i></div>
					ĐƠN HÀNG
				</a>

				

			</div>
		</div>
		<div class="sb-sidenav-footer">
			<div class="small">Logged in as: <?php echo $_SESSION['USER'] ?></div>
		</div>
	</nav>
</div> 
     
</body>
</html>


