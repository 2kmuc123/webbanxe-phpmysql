<?php
session_start();

if ($_SESSION['USER'] == '') {
    header('Location: login.php');
}
include("../db/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> ADMIN </title>
    <link href="./CSS/styles_1.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="./JS/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="./JS/datatables-demo.js"></script>

</head>


<?php
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$title = ($id != '') ? 'Cập nhật sản phẩm' : 'Thêm sản phẩm';
$btn = ($id != '') ? 'CẬP NHẬT' : 'THÊM';
$name = '';
$gia = '';
$hinhanh = '';
$kichthuoc = '';
$chieucaoyen = '';
$kichthuocbanh = '';
$dongco = '';
$cc = '';
$congsuat = '';
$ccnhot = '';
$ccxang = '';
$phanh = '';
$mahang = '';
$madongxe = '';

if ($id != null) {
    $sql = "SELECT * FROM product where productID = $id";
    $product = mysqli_query($conn, $sql);
    foreach ($product  as $item) {
        $name = $item['productName'];
        $gia = $item['price'];
        $hinhanh = $item['imgDemo'];
        $kichthuoc = $item['size'];
        $chieucaoyen = $item['saddleHeight'];
        $kichthuocbanh = $item['cakeSize'];
        $dongco = $item['engine'];
        $cc = $item['cc'];
        $congsuat = $item['wattage'];
        $ccnhot = $item['viscous'];
        $ccxang = $item['gasoline'];
        $phanh = $item['brake'];
        $mahang = $item['brandID'];
        $madongxe = $item['categoryID'];
    }
}
echo $kichthuoc;

?>
<style>
    #layoutSidenav_content {
        padding: 56px 0 0 200px;
    }
</style>

<body>
    <?php include("./component/header.php") ?>
    <div id="layoutSidenav">
        <?php include("./component/category.php") ?>

        <!-- phần main  -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 style="text-transform: uppercase;" class="mt-4"> <?php echo $title ?></h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="admin.php"> DANH MỤC </a></li>
                        <li class="breadcrumb-item active"> Xe </li>
                        <li class="breadcrumb-item active"> <?php echo $title ?> </li>

                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-users"></i>
                            <?php echo $title ?>
                        </div>
                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1"> Hãng </label>
                                            <select name="tenhang" id="tenhang">
                                                <?php
                                                // lấy dữ liệu hãng ra
                                                $sql = 'SELECT * FROM brand';
                                                $brand = mysqli_query($conn, $sql);
                                                foreach ($brand as $item) {
                                                    if ($item['brandID'] == $mahang) {
                                                        echo '<option value= ' . $item['brandID'] . ' selected> ' . $item['brandName'] . ' </option>';
                                                    } else {
                                                        echo '<option value= ' . $item['brandID'] . '> ' . $item['brandName'] . ' </option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1"> Dòng xe </label>
                                            <select name="dongxe" id="dongxe">
                                                <?php
                                                // lấy dữ liệu hãng ra
                                                $sql = 'SELECT * FROM category';
                                                $category = mysqli_query($conn, $sql);
                                                foreach ($category as $item) {
                                                    if ($item['categoryID'] == $madongxe) {
                                                        echo '<option value= ' . $item['categoryID'] . ' selected> ' . $item['categoryName'] . ' </option>';
                                                    } else {
                                                        echo '<option value= ' . $item['categoryID'] . '> ' . $item['categoryName'] . ' </option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1"> Tên sản phẩm </label>
                                            <input class="form-control py-4" id="name" name="name" type="text" value="<?php echo $name ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1"> Giá </label>
                                            <input class="form-control py-4" id="gia" name="gia" type="text" value="<?php echo $gia ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="small mb-1"> Hình ảnh </label>
                                    <input class="form-control py-4" id="hinhanh" name="hinhanh" type="text" value="<?php echo $hinhanh ?>">
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1"> Kích thước </label>
                                            <input class="form-control py-4" id="kichthuoc" name="kichthuoc" type="text" value="<?php echo $kichthuoc ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1"> Chiều cao yên </label>
                                            <input class="form-control py-4" id="chieucaoyen" name="chieucaoyen" type="text" value="<?php echo "$chieucaoyen" ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1"> Kích thước bánh </label>
                                            <input class="form-control py-4" id="kichthuocbanh" name="kichthuocbanh" type="text" value="<?php echo "$kichthuocbanh" ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1"> Động cơ </label>
                                            <input class="form-control py-4" id="dongco" name="dongco" type="text" value="<?php echo $dongco ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1"> Dung tích </label>
                                            <input class="form-control py-4" id="cc" name="cc" type="text" value="<?php echo "$cc" ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1"> Công suất </label>
                                            <input class="form-control py-4" id="congsuat" name="congsuat" type="text" value="<?php echo "$congsuat" ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="name"> Dung tích nhớt </label>
                                            <input class="form-control py-4" id="ccnhot" name="ccnhot" type="text" value="<?php echo "$ccnhot" ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1"> Dung tích xăng </label>
                                            <input class="form-control py-4" id="ccxang" name="ccxang" type="text" value="<?php echo "$ccxang" ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1"> Phanh </label>
                                            <input class="form-control py-4" id="phanh" name="phanh" type="text" value="<?php echo "$phanh" ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-4 mb-0">
                                    <button class="btn btn-primary btn-block" name="add"> <?php echo $btn; ?> </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </main>

            <?php include("./component/footer.php") ?>
        </div>
    </div>
</body>

</html>

<?php
if (!empty($_POST)) {
    if (!empty($_POST['gia']) && !empty($_POST['name'])) {
        $name = $_POST['name'];
        $gia = $_POST['gia'];
        $hinhanh = $_POST['hinhanh'];
        $kichthuoc = $_POST['kichthuoc'];
        $chieucaoyen = $_POST['chieucaoyen'];
        $kichthuocbanh = $_POST['kichthuocbanh'];
        $dongco = $_POST['dongco'];
        $cc = $_POST['cc'];
        $congsuat = $_POST['congsuat'];
        $ccnhot = $_POST['ccnhot'];
        $ccxang = $_POST['ccxang'];
        $phanh = $_POST['phanh'];
        $tenhang = $_POST['tenhang'];
        $dongxe = $_POST['dongxe'];


        $sql = "INSERT INTO product VALUES (NULL, '$dongxe', '$tenhang', '$name', '$hinhanh', '$gia', '$kichthuoc', '$chieucaoyen', '$kichthuocbanh', '$dongco', '$cc', '$congsuat', '$ccnhot', '$ccxang', '$phanh',  '')";
        if ($id != '') {
            $sql = "UPDATE product 
                SET categoryID =$dongxe, brandID = $tenhang, productName = '$name', imgDemo = '$hinhanh', price = '$gia', size = '$kichthuoc', saddleHeight = '$chieucaoyen', cakeSize = '$kichthuocbanh', engine = '$dongco', cc = '$cc', wattage = '$congsuat', viscous = '$ccnhot', gasoline = '$ccxang', brake = '$phanh' WHERE productID = $id";
        }



        if (mysqli_query($conn, $sql)) {
            mysqli_close($conn);
            echo "<script type='text/javascript'>alert('Thành công!');</script>";
            echo "<script type='text/javascript'>location.href = 'product.php';</script>";
        }

        echo "<script type='text/javascript'>alert('Thất bại!');</script>";
        mysqli_close($conn);
    } else {
        echo "<script type='text/javascript'>alert('Vui lòng nhập các thông tin cần thiết!');</script>";
    }
}
?>