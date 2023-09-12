<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="modulesad/css/thongke.css">
    <link rel="stylesheet" href="modulesad/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="modulesad/js/main1.js"></script>
    
</head>

<body>
    <script type="text/javascript">
        $(document).ready(function() {
            loadSP();
            loadSPSelling();

           
            $("#mySelect").change(function() {
                loadSPClassic($('#mySelect').val())
            })
            $("#mySelect").change(function() {
                loadSPClassicSelling($('#mySelect').val())
            })
            $("#selectMY").click(function() {
                loadSPMonth($('#monthSelect').val(), $('#yearSelect').val())
                loadSPMonthSelling($('#monthSelect').val(), $('#yearSelect').val())
                console.log($('#monthSelect').val(), $('#yearSelect').val());
            })
            
        })
        function loadSP() {
            $.ajax({
                type: "GET",
                url: "loadSP.php",
                success: function(result) {
                    $("#information").html(result);
                }
            })
        }
        function loadSPSelling() {
            $.ajax({
                type: "GET",
                url: "loadSPSelling.php",
                success: function(result) {
                    $("#selling").html(result);
                }
            })
        }
        function loadSPClassic(mySelect) {
            console.log(mySelect);
            $.ajax({
                type: "GET",
                url: "loadSPClassic.php",
                data: "mySelect=" + mySelect,
                success: function(result) {
                    $("#information").html(result);
                }
            })
        }
        function loadSPClassicSelling(mySelect) {
            $.ajax({
                type: "GET",
                url: "loadSPClassicSelling.php",
                data: "mySelect=" + mySelect,
                success: function(result) {
                    $("#selling").html(result);
                }
            })
        }
        function loadSPMonth(monthSelect, yearSelect) {
            var monthSelect = $('#monthSelect').val();
            var yearSelect = $('#yearSelect').val();
            $.ajax({
                type: "GET",
                url: "loadSPMonth.php",
                data: "monthSelect=" + monthSelect + "&yearSelect=" + yearSelect,
                success: function(result) {
                    $("#information").html(result);
                }
            })
        }
        function loadSPMonthSelling(monthSelect, yearSelect) {
            var monthSelect = $('#monthSelect').val();
            var yearSelect = $('#yearSelect').val();
            $.ajax({
                type: "GET",
                url: "loadSPMonthSelling.php",
                data: "monthSelect=" + monthSelect + "&yearSelect=" + yearSelect,
                success: function(result) {
                    $("#selling").html(result);
                }
            })
        }
    </script>
    <div class="wrapper">
        <div class="container">
            <div class="dashboard">
                <div class="left">
                    <span class="left__icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
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
                                    <a class="left__link" href="../admin/addproduct.php">Thêm Sản Phẩm</a>
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
                                <a href="../admin/customer_management.php" class="left__title"><img src="modulesad/img/icon-users.svg" alt="">Khách Hàng</a>
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

                <script>
                    function xoadau(str) {
                        str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g, "");
                        str = str.replace(/ + /g, "");
                        str = str.trim();
                        return str;
                    }
                </script>
                <div class="right">
                    <div class="right-parent">
                        <div class="title">Thống Kê</div>
                        <div class="right-primary">
                            <div class="right-children">
                                <form action="" method="get" id="">
                                    <select name="month" id="monthSelect">         
                                    </select>
                                    <select name="year" id="yearSelect">
                                    </select>
                                    <input type="button" id="selectMY" value="Chọn">
                                </form>
                                <form method="get" id="myForm">
                                    <select class="select_classic" name="product_type" id="mySelect">
                                        <option value="">Chọn</option>
                                        <option value="vansclassic">VANS CLASSIC</option>
                                        <option value="vansvault">VANS VAULT</option>
                                        <option value="vansoldskool">VANS OLD SKOOL</option>
                                        <option value="vansslipon">VANS SLIP-ON</option>
                                        <option value="vansauthentic">VANS AUTHENTIC</option>
                                        <option value="vanssk8">VANS SK8</option>
                                        <option value="vansera">VANS ERA</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="content_admin">
                            <div class="statistical">
                                <div class="statistical_detail" id="statistical_detail">
                                    <div class="title_statistical">
                                        <div class="month">Tháng</div>
                                        <div class="number_user">Số người đặt hàng</div>
                                        <div class="turnover">Doanh Thu</div>
                                        <div class="chi_tiet">Chi tiết</div>
                                        <div class="classic">Loại Sản Phẩm</div>
                                    </div>
                                    <div class="information" id="information">
                                        
                                    </div>
                                    <div class="so_luong">
                                        <div class="tieu_de"><p>Sản phẩm bán chạy</p></div> 
                                        <table id="selling">
                                            
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const selectElementMonth = document.getElementById('monthSelect');
        const selectElementYear = document.getElementById('yearSelect');
        const currentGetMonth = new Date();
        const currentGetYear = new Date();
        const currentMonth = currentGetMonth.getMonth() + 1;
        const currentYear = currentGetYear.getFullYear();
        let selectOptionsMonth = '';
        for (let i = 1; i <= 12; i++) {
            selectOptionsMonth += `<option value="${i}" ${i === currentMonth ? 'selected' : ''}>${i}</option>`;
        }
        let selectOptionsYear = '';
        for (let year = currentYear; year >= 1970; year--) {
            selectOptionsYear += `<option value="${year}">${year}</option>`;
        }
        // Set the select options in the select element
        selectElementMonth.innerHTML = selectOptionsMonth;
        selectElementYear.innerHTML = selectOptionsYear;

    </script>
</body>

</html>