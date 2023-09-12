<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Document</title>
</head>

<body>
    <?php include "../model/header.php"; ?>
    <div class="contentcontact">
        <div class="contentcontact-left">
            <div class="first">
                <div class="choose">
                    <a href=""><i class="fa fa-map-marker"></i></a>
                    <span style="font-family: sans-serif;font-size: 20px; overflow-wrap: break-word; inline-size: 35rem;">Địa chỉ shop Số 273 Đ. An D. Vương, Phường 3, Quận 5, Thành phố Hồ Chí Minh</span>
                </div>
                <div class="choose">
                    <a href=""><i class="fa fa-fax"></i></a>
                    <span>0903725156489</span>
                </div>
                <div class="choose">
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <span>Shop giày Mona</span>
                </div>
            </div>
            <div class="second">
                <h1>Liên hệ với chúng tôi</h1>
                <div>
                    <form action="/action_page.php">
                        <label for="fname">Tên của bạn</label>
                        <input class="second-input" type="text" id="fname" name="firstname" placeholder="">

                        <label for="lname">Số điện thoại</label>
                        <input class="second-input" type="text" id="lname" name="lastname" placeholder="">
                        </select>
                    </form>
                </div>
                <button class="btn5-hover btn5">Nhấn gửi</button>
            </div>
        </div>
        <div class="honer">
            <input type="hidden">
        </div>



        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d37290.80751769916!2d106.64293002453445!3d10.756565289380958!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f1b7c3ed289%3A0xa06651894598e488!2sSaigon%20University!5e0!3m2!1sen!2s!4v1679928772147!5m2!1sen!2s"
                width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <?php include "../model/footer.php"; ?>
</body>
<script src="../js/contact.js"></script>

</html>