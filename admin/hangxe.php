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
    <title> QUẢN LÝ HÃNG XE </title>
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
                    <h1 class="mt-4"> HÃNG XE </h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="admin.php"> DANH MỤC </a></li>
                        <li class="breadcrumb-item active"> Hãng Xe </li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-users"></i>
                            Dữ liệu hãng


                            &emsp; &emsp;

                            <a href="hangxeControl.php" class="btn btn-primary"> Thêm sản phẩm </a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="col-lg-1"> ID </th>
                                            <th class="col-lg-3"> Tên hãng </th>
                                            <th class="col-lg-6"> Logo </th>
                                            <th class="col-lg-2"> Chức năng </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        // lấy dữ liệu hãng ra
                                        $sql = "select * from brand";
                                        $brandList = mysqli_query($conn, $sql);
                                        foreach ($brandList as $item) {
                                            echo '<tr>
                                                        <td>' . $item['brandID'] . '</td>
                                                        <td>' . $item['brandName'] . '</td>
                                                        <td> <img src=' . $item['logo'] . ' height="100" width-max="100" alt="Khong tai duoc"> </td>   
                                                        <td> 
                                                            <form method="post" style="display: flex; flex-direction: column; width: 100%">
                                                            <input value="' . $item['brandID'] . '" type="hidden" name="mahang" id="mahang">
                                                            <a class="btn btn-primary" href="hangxeControl.php?id=' . $item['brandID'] . '"> Sửa </a> <br>  
                                                            <button class="btn btn-danger" name="xoa" id="xoa"> Xóa </button>
                                                            </form>
                                                        </td> 
                                                  </tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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
    $mahang = $_POST['mahang'];

    $sql = "DELETE FROM brand WHERE brandID = $mahang";
    if (mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>alert('Đã xóa hãng có id = $mahang');</script>";
        echo "<script type='text/javascript'>location.href = 'hangxe.php';</script>";
    } else {
        echo "<script type='text/javascript'>alert('Đã có lỗi xảy ra, vui lòng thử lại sau!');</script>";
    }
}

?>