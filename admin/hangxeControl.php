<?php
session_start();

if ($_SESSION['USER'] == '') {
    header('Location: login.php');
}
include("../db/db.php");

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$title = ($id != '') ? 'Cập nhật hãng xe' : 'Thêm hãng xe';
$btn = ($id != '') ? 'CẬP NHẬT' : 'THÊM';
$name = '';
$hinhanh = '';
if ($id != null) {
    $sql = "SELECT * FROM brand WHERE brandID = '$id'";
    $brand = mysqli_query($conn, $sql);
    foreach ($brand  as $item) {
        $name = $item['brandName'];
        $hinhanh = $item['logo'];
    }
}
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
    <script src="../JS/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

</head>

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
                    <h1 class="mt-4" style="text-transform: uppercase;"> <?php echo $title ?> </h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="admin.php"> DANH MỤC </a></li>
                        <li class="breadcrumb-item active"> Hãng Xe </li>
                        <li class="breadcrumb-item active"> <?php echo $title ?> </li>

                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-users"></i>
                            Thông tin hãng
                        </div>

                        <div class="card-body">
                            <form method="post">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="name"> Tên hãng </label>
                                            <input class="form-control py-4" id="name" name="name" type="text" value=<?php echo $name; ?>>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="name"> Hình ảnh </label>
                                            <input class="form-control py-4" id="hinhanh" name="hinhanh" type="text" value=<?php echo $hinhanh; ?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-4 mb-0">
                                    <button class="btn btn-primary btn-block"> <?php echo $btn; ?></button>
                                </div>
                            </form>
                        </div>
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
    if (!empty($_POST['name'])) {
        $name = $_POST['name'];
        $hinhanh = $_POST['hinhanh'];

        $sql = "INSERT INTO brand VALUES(null, '$name', '$hinhanh')";

        if ($id != null) {
            $sql = "UPDATE brand SET brandName='$name', logo='$hinhanh' WHERE brandID=$id";
        }
        if (mysqli_query($conn, $sql)) {
            mysqli_close($conn);
            echo "<script type='text/javascript'>alert('Thành công!');</script>";
            echo "<script type='text/javascript'>location.href = 'hangxe.php';</script>";
        }
        echo "<script type='text/javascript'>alert('Thất bại!');</script>";
        mysqli_close($conn);
    } else {
        echo "<script type='text/javascript'>alert('Vui lòng nhập đầy đủ thông tin!');</script>";
    }
}
?>