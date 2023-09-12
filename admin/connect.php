<?php
    $conn = new  mysqli('localhost','root','','doanweb');
    mysqli_set_charset($conn, 'utf8');

    if($conn->connect_errno){
        echo "thanh cong";
    }
    
