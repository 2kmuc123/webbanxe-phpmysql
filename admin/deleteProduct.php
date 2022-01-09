<?php 
	$conn = mysqli_connect('localhost:3306', 'root', '', 'baitaplon');
    if (!$conn) {
     die('Ket noi that bai: ' . mysqli_connect_error());
    }

    if(isset($_GET['id'])){
		$id = $_GET['id'];

	}
    $sql = "DELETE FROM product WHERE productID = '$id' ";
    
	if (mysqli_query($conn, $sql)) {
		header("location: product.php");
	} else
		echo "<script type='text/javascript'>alert('Xóa dữ liệu thất bại!');</script>";
	
	mysqli_close($conn);
 ?>