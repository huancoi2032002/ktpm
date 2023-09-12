<div class="left__content">
    <div class="left__logo">LOGO</div>
    <div class="left__profile">
        <div class="left__image"><img src="modulesad/img/profile.jpg" alt=""></div>
    </div>
    <ul class="left__menu">


        <li class="left__menuItem">
            <a href="#" class="left__title"><img src="modulesad/img/icon-dashboard.svg" alt="">Dashboard</a>
        </li>
        
            <li class="left__menuItem">
                <div class="left__title"><img src="modulesad/img/icon-tag.svg" alt="">Sản Phẩm<img class="left__iconDown" src="modulesad/img/arrow-down.svg" alt=""></div>
                <div class="left__text">
                    <a class="left__link" href="../admin/themsanpham.php">Thêm Sản Phẩm</a>
                    <a class="left__link" href="../admin/list_product.php">Xem Sản Phẩm</a>
                </div>
            </li>
        


            <li class="left__menuItem">
                <div class="left__title"><img src="modulesad/img/icon-edit.svg" alt="">Thể Loại <img class="left__iconDown" src="modulesad/img/arrow-down.svg" alt=""></div>
                <div class="left__text">
                    <a class="left__link" href="#">Thêm Thể Loại</a>
                    <a class="left__link" href="#">Xem Thể Loại</a>
                </div>
            </li>
            <li class="left__menuItem">
                <a href="#" class="left__title"><img src="modulesad/img/icon-users.svg" alt="">Khách Hàng</a>
            </li>

                    
                    
            <li class="left__menuItem">
                <a href="../admin/order_confirmation.php" class="left__title"><img src="modulesad/img/icon-book.svg" alt="">Đơn Đặt Hàng</a>
            </li>
            <li class="left__menuItem">
                <div class="left__title"><img src="modulesad/img/icon-edit.svg" alt="">Chức Vụ <img class="left__iconDown" src="modulesad/img/arrow-down.svg" alt=""></div>
                <div class="left__text">
                    <a class="left__link" href="#">Thêm Chức Vụ</a>
                    <a class="left__link" href="#">Xem Chức Vụ</a>
                </div>
            </li>
            <li class="left__menuItem">
                <div class="left__title"><img src="modulesad/img/icon-user.svg" alt="">Nhân viên<img class="left__iconDown" src="modulesad/img/arrow-down.svg" alt=""></div>
                <div class="left__text">
                    <a class="left__link" href="#">Thêm nhân viên</a>
                    <a class="left__link" href="#">Xem nhân viên</a>
                </div>
            </li>
            <li class="left__menuItem">
                <a href="../admin/thongke.php" class="left__title"><img src="modulesad/img/icon-users.svg" alt="">Thống Kê</a>
            </li>
            <li class="left__menuItem">
                <a href="#" class="left__title"><img src="modulesad/img/icon-logout.svg" alt="">Đăng Xuất</a>
            </li>
    </ul>
</div>
</div>
<?php
if (isset($_GET['action'])) {
    if ($_GET["action"] == "dangxuat") {

        unset($_SESSION['admin']);
        echo "<script> location.href = 'indexad.php';</script>";
    }
}

?>
<script>
    function xoadau(str) {
        str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g, "");
        str = str.replace(/ + /g, "");
        str = str.trim();
        return str;
    }
</script>