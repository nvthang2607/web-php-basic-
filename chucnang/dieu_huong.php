<?php
//đây là đoạn code để điều hướng cho phần giữ của trang, nó sẽ hiển thị theo từng nút trên thanh menu ngang,dọc,tiềm kiếm..
    if(isset($_GET['thamso']))
        {//tham số được lấy trên URL
            $tham_so=$_GET['thamso'];
        }
        else{$tham_so="";
        }
    switch($tham_so)
    {   //để hiển thị phần menu doc
        case "xuat_san_pham":
            include("chucnang\sanpham\xuat.php");
        break;
        //phần này hiển thị sau khi click vào 1 sp để xem
        case "chi_tiet_san_pham":
            include("chucnang\sanpham\chi_tiet_san_pham.php");
        break;
        //để hiển thị phần "sản phẩm" trên menu ngang
        case "xuat_san_pham_2":
            include("chucnang\sanpham\xuat_toan_bo_san_pham.php");
        break;
        //xuất phần "giới thiệu" trên menu ngang
        case "xuat_mot_tin":
            include("chucnang\xuat_mot_tin.php");
        break;
        //xuất phần tìm kiếm
        case "tim_kiem":
            include("chucnang/timkiem/xuat_sp_tim_kiem.php");
        break;
        //xuất giỏ hàng khi click vào phần giỏ hàng bên phải
        case "gio_hang":
            include("chucnang/giohang/giohang.php");
        break;
        default:
        //đây là phần chạy slideshow hình và phần sp  trong trang chủ
        include("chucnang/slideshow/slideshow.php");
        include("chucnang/sanpham/sanphamtrangchu.php");
    }
?>