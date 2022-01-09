<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
	.sb-topnav {
		width: 100%;
		position: fixed;
	}
</style>

<body>
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
		<a class="navbar-brand" href="admin.php" style="cursor: pointer;"> QUẢN TRỊ WEBSITE</a>
		<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
			<ul class="navbar-nav ml-auto ml-md-0">
				<li><a class="navbar-brand" href="../public" style="cursor: pointer;"> SHOP </a></li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="#"> Đổi mật khẩu </a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="logout.php"> Đăng xuất </a>
					</div>
				</li>
			</ul>
		</form>
	</nav>
</body>

</html>