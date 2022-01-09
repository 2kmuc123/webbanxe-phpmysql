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
    <title> QUẢN LÝ XE </title>
    <link href="./CSS/styles_1.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="./JS/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

</head>

</head>

<style>
    #layoutSidenav_content {
        padding: 56px 0 0 200px;
    }

    table tr td.thongtin {
        padding: 0;
    }

    .thongtin table {
        font-size: 14px;
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
                    <h1 class="mt-4"> SẢN PHẨM
                    </h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="admin.php"> DANH MỤC </a></li>
                        <li class="breadcrumb-item active">
                            SẢN PHẨM
                        </li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-3">
                                    <i class="fas fa-motorcycle"></i>
                                    Dữ liệu sản phẩm
                                </div>

                                <div class="col-lg-3">
                                    <a href="productControl.php" class="btn btn-primary"> Thêm sản phẩm </a>
                                </div>

                                <form class="input-group col-lg-6" method="post" action="">
                                    <div class="form-outline">
                                        <input id="search-input" type="search" id="form1" class="form-control" name="txttimkiem" placeholder="Nhập vào tên xe để tìm kiếm..." />
                                    </div>
                                    &nbsp;
                                    <button id="search-button" type="submit" class="btn btn-primary" name="btntimkiem">
                                        <i class="fas fa-search"></i> Tìm kiếm
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="col-lg-1"> Chức năng </th>
                                            <th class="col-lg-1"> ID</th>
                                            <th class="col-lg-3"> Hình ảnh</th>
                                            <th class="col-lg-1"> Tên sản phẩm</th>
                                            <th class="col-lg-1"> Giá VND</th>
                                            <th class="col-lg-5">Thông tin chi tiết</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $sql = 'SELECT * FROM product';

                                        if (isset($_POST['btntimkiem'])) {
                                            $key = '';
                                            if (isset($_POST['txttimkiem'])) {
                                                $key = $_POST['txttimkiem'];
                                            }
                                            $sql = "SELECT * FROM product WHERE productName LIKE '%$key%'";
                                        }

                                        // lấy dữ liệu hãng ra
                                        $productList = mysqli_query($conn, $sql);
                                        foreach ($productList  as $item) {

                                            echo '<tr>
                                                        <td> 
                                                            <form method="post">
                                                                
                                                                <a class="btn btn-primary" href="productControl.php?id=' . $item['productID'] . '"> Sửa </a> &emsp; ' ?>

                                            <a class="btn btn-danger" onclick="xoa(<?php echo $item['productID'] ?>)" href="deleteProduct.php?id=<?php echo $item['productID'] ?>"> Xóa </a>

                                            <script type="text/javascript">
                                                function xoa(id) {

                                                    if (!confirm('bạn có muốn xóa <?php echo $item['productName'] ?>')) {};
                                                }
                                            </script>
                                        <?php
                                            echo '</form>
                                                        </td> 
                                                        <td>' . $item['productID'] . '</td>
                                                        <td> <img src=' . $item['imgDemo'] . ' height="100" width-max="100" alt="Khong tai duoc"> </td>
                                                        <td>' . $item['productName'] . '</td>
                                                        <td>' . $item['price'] . '</td>
                                                        <td class=thongtin>
                                                            <table class="table table-striped">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class=col-lg-4>Kích thước</td>
                                                                        <td>' . $item['size'] . '</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Chiều cao yên</td>
                                                                        <td>' . $item['saddleHeight'] . '</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Kích thước bánh</td>
                                                                        <td>' . $item['cakeSize'] . '</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Động cơ</td>
                                                                        <td>' . $item['engine'] . '</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Dung tích xilanh</td>
                                                                        <td>' . $item['cc'] . '</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Công suất</td>
                                                                        <td>' . $item['wattage'] . '</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Dung tích nhớt</td>
                                                                        <td>' . $item['viscous'] . '</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Phanh</td>
                                                                        <td>' . $item['brake'] . '</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Dung tích bình xăng</td>
                                                                        <td>' . $item['gasoline'] . '</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
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