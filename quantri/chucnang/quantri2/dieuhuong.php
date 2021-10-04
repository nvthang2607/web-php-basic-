<?php
    //không thể bỏ qua đăng nhập admin trước khi vào điều hướng
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    if(!isset($_GET['thamso'])){$thamso="";}else{$thamso=$_GET['thamso'];}
   
    switch($thamso)
    {
        case "menu_ngang":
            include("chucnang/menungang/lien_ket_menu_ngang.php");
        break;
        case "them_menu_ngang":
            include("chucnang/menungang/them_menu_ngang.php");
        break;
        case "quan_ly_menu_ngang":
            include("chucnang/menungang/quan_ly_menu_ngang.php");
        break;
        case "sua_menu_ngang":
            include("chucnang/menungang/sua_menu_ngang.php");
        break;
        case "menu_doc":
            include("chucnang/menudoc/lien_ket_menu_doc.php");
        break;
        case "them_menu_doc":
            include("chucnang/menudoc/them_menu_doc.php");
        break;
        case "quan_ly_menu_doc":
            include("chucnang/menudoc/quan_ly_menu_doc.php");
        break;
        case "sua_menu_doc":
            include("chucnang/menudoc/sua_menu_doc.php");
        break;
        case "san_pham":
            include("chucnang/sanpham/lien_ket_san_pham.php");
        break;
        case "them_san_pham":
            include("chucnang/sanpham/them_san_pham.php");
        break;
        case "them_so_luong_san_pham":
            include("chucnang/sanpham/capnhatsoluong.php");
        break;
        case "them_so_luong_san_pham":
            include("chucnang/sanpham/them_san_pham.php");
        break;
        case "quan_ly_san_pham":
            include("chucnang/sanpham/quan_ly_san_pham.php");
        break;
        case "sua_san_pham":
            include("chucnang/sanpham/sua_san_pham.php");
        break;
        case "hoa_don":
            include("chucnang/hoadon/lien_ket_hoa_don.php");
        break;
        case "xem_hoa_don":
            include("chucnang/hoadon/xem_hoa_don.php");
        break;
        case "tat_ca_hoa_don":
            include("chucnang/hoadon/tat_ca_hoa_don.php");
        break;
        case "hoa_don_dang_cho":
            include("chucnang/hoadon/quan_ly_hoa_don.php");
        break;
        case "hoa_don_da_duyet":
            include("chucnang/hoadon/quan_ly_hoa_don2.php");
        break;
        
        case "hoa_don_hoan_thanh":
            include("chucnang/hoadon/quan_ly_hoa_don_thanh_cong.php");
        break;
        case "nhan_vien":
            include("chucnang/nhanvien/lien_ket_nhan_vien.php");
        break;
        case "them_nhan_vien":
            include("chucnang/nhanvien/them_nhan_vien.php");
        break;
        case "sua_thong_tin_nhan_vien":
            include("chucnang/nhanvien/sua_thong_tin_nhan_vien.php");
        break;
        case "quan_ly_nhan_vien":
            include("chucnang/nhanvien/quan_ly_nhan_vien.php");
        break;
        case "xoa_nhan_vien":
            include("chucnang/nhanvien/xoa_nhan_vien.php");
        break;
        case "san_pham_trang_chu":
            include("chucnang/sanphamtrangchu/san_pham_trang_chu.php");
        break;
        case "san_pham_noi_bat":
            include("chucnang/sanphamnoibat/san_pham_noi_bat.php");
        break;
        case "slideshow":
            include("chucnang/slideshow/lien_ket_slideshow.php");
        break;
        case "them_slideshow":
            include("chucnang/slideshow/them_slideshow.php");
        break;
        case "quan_ly_slideshow":
            include("chucnang/slideshow/quan_ly_slideshow.php");
        break;
        case "sua_slideshow":
            include("chucnang/slideshow/sua_slideshow.php");
        break;
        case "sua_footer":
            include("chucnang/footer/sua_footer.php");
        break;
        case "them_quang_cao_trai":
            include("chucnang/quangcaotrai/themquangcaotrai.php");
        break;
        case "quan_ly_quang_cao_trai":
            include("chucnang/quangcaotrai/quanlyquangcaotrai.php");
        break;
        case "sua_quang_cao_trai":
            include("chucnang/quangcaotrai/sua_quang_cao_trai.php");
        break;
        case "them_quang_cao_phai":
            include("chucnang/quangcaophai/themquangcaophai.php");
        break;
        case "quan_ly_quang_cao_phai":
            include("chucnang/quangcaophai/quanlyquangcaophai.php");
        break;
        case "sua_quang_cao_phai":
            include("chucnang/quangcaophai/sua_quang_cao_phai.php");
        break;
        case "sua_thong_tin_quan_tri":
            include("chucnang/quantri2/suathongtinquan_tri.php");
        break;
        default:
            include("chucnang/quantri2/trangchu2.php");
    }
?>