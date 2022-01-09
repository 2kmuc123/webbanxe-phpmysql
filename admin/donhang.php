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
    <title> QUẢN LÝ ĐƠN HÀNG </title>
    <link href="./CSS/styles_1.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="./JS/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

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
                    <h1 class="mt-4"> ĐƠN HÀNG
                    </h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="admin.php"> DANH MỤC </a></li>
                        <li class="breadcrumb-item active">
                            QUẢN LÝ ĐƠN HÀNG
                        </li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-3">
                                    <i class="fas fa-motorcycle"></i>
                                    Dữ liệu đơn hàng
                                </div>


                                <form class="input-group col-lg-6" method="post" action="">
                                    <div class="form-outline">
                                        <input id="search-input" type="search" id="form1" class="form-control" name="txttimkiem" placeholder="Nhập vào mã đơn hàng..." />
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
                                            <th class="col-lg-1"> ID </th>
                                            <th class="col-lg-1"> Tên sản phẩm </th>
                                            <th class="col-lg-1"> Màu </th>
                                            <th class="col-lg-1"> SL </th>
                                            <th class="col-lg-2"> Tên khách hàng </th>
                                            <th class="col-lg-3"> Thông tin khách hàng </th>
                                            <th class="col-lg-2"> Ghi chú </th>
                                            <th class="col-lg-1"> Xóa </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        // lấy dữ liệu hãng ra
                                        $sql = "SELECT od.note, oderID, productName, color, name, phone, mail, address, productName, compare FROM `order` od INNER JOIN `product` prd ON od.productID = prd.productID";

                                        if (isset($_POST['btntimkiem'])) {
                                            $key = 0;

                                            if (isset($_POST['txttimkiem'])) {
                                                $key = $_POST['txttimkiem'];
                                            }
                                            $where = ($key != 0) ? "oderID=$key" : "1";
                                            $sql = "SELECT od.note, oderID, productName, color, name, phone, mail, address, productName, compare FROM `order` od INNER JOIN `product` prd ON od.productID = prd.productID WHERE $where";
                                        }
                                        $orderList = mysqli_query($conn, $sql);
                                        foreach ($orderList as $item) {
                                            echo '<tr>
                                                        <td>' . $item['oderID'] . '</td>
                                                        <td>' . $item['productName'] . '</td>  
                                                        <td>' . $item['color'] . '</td>  
                                                        <td>' . $item['compare'] . '</td>  
                                                        <td>' . $item['name'] . '</td>
                                                        <td class=thongtin>
                                                            <table class="table table-striped">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class=col-lg-4>SĐT</td>
                                                                        <td>' . $item['phone'] . '</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Gmail</td>
                                                                        <td>' . $item['mail'] . '</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Địa chỉ</td>
                                                                        <td>' . $item['address'] . '</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td>' . $item['note'] . '</td>
                                                        <td> 
                                                            <form method="post">
                                                            <input value="' . $item['oderID'] . '" type="hidden" name="id" id="id">
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
if (isset($_POST['xoa'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM `order` WHERE oderID = $id";
    if (mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>alert('Đã xóa đơn hàng có id = $id');</script>";
        echo "<script type='text/javascript'>location.href = 'donhang.php';</script>";
    } else {
        echo "<script type='text/javascript'>alert('Đã có lỗi xảy ra, vui lòng thử lại sau!');</script>";
    }
}

?>