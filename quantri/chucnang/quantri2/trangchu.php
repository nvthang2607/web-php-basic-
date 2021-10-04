
<?php
    //xuất ra trang trắng nếu truy cập trực tiếp vào file này
    //nghĩa là tránh tình trạng bỏ qua bước đăng nhập
    if(!isset($bien_bao_mat)){exit();}
?>
<!--định dạng 1 xíu về css của liên kết-->

<style type="text/css" >
    a.lk_1{
        font-size:22px;
        text-decoration:none;
        color:blue;
        margin-right:30px}
    a.lk_1:hover {
        color:red
    }
    #footer{
    background-color: purple;
    color:white;
    width: 1333px;
    height: 100px;
    font-size: 18px;
    margin-top: 2px;
    margin-bottom: 2px
    }
    #mn_ngang{
        width: 1333px;
    }
</style>


<br>
<center>
    <!--quản trị cửa hàng để trở về trang chủ của admin-->
<a href="index.php" style="font-size:72px;color:blue;text-decoration:none" >Quản trị cửa hàng</a>
</center>
<br><br>
<div id="mn_ngang" >
    <div id="bg_mn">
        <a href="index.php" class="lk_1" >Trang chủ</a>
        <a href="?thamso=menu_doc" class="lk_1" >Menu dọc</a>
        <a href="?thamso=menu_ngang" class="lk_1" >Menu ngang</a>
        <a href="?thamso=san_pham" class="lk_1" >Sản phẩm</a>
        <a href="?thamso=hoa_don" class="lk_1" >Hóa đơn</a>
        <a href="?thamso=nhan_vien" class="lk_1" >Nhân viên</a>
        <a id="thoat" href="?thamso=thoat" class="lk_1" >Thoát</a>
    </div>
</div>



<br><br>

<?php
    // dựa vào biến 'thamso' trên url để đến các trang web khác nhau như trang thêm menu , sản phẩm ; trang sửa xóa menu , sản phẩm ; trang quản lý hóa đơn ... 
    include("chucnang/quantri2/dieuhuong.php");
?>
<br><br>
<div id="footer">
    <?php
            if($_SESSION['ky_danh']!='')
            {
        ?>
            <tr align="center">
                <h3>SHOP VRRDE</h3>
                <h3><a>Nhân viên: <?php echo $_SESSION['ky_danh']; ?></a></h3>
            </tr>
                <?php
            }
    ?>
</div>