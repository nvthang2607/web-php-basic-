<br>


<?php
    //đầu tiên giỏ hàng sẽ không có gì cả
    $so_luong=0;
    //kiểm tra nếu có MSHH
    if(isset($_SESSION['id_them_vao_gio']))
    {   //chạy hết các MSHH đó
        for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
        {   //lấy số lượng tương ứng với MSHH
            $so_luong=$so_luong+$_SESSION['sl_them_vao_gio'][$i];
        }
    }
?>
<div id="vunggiohang">
    <div id="title_gh">
        Giỏ hàng
    </div>
    <br><br>
    <!--in ra số lượng sp--> 
    Số sản phẩm : <?php echo $so_luong; ?>
    <br><br>
    <a href="?thamso=gio_hang" ><img  id="img1" src='/webbanhang/cart5.png' width='30px'></a>
    <!--vào lại giỏ hàng chỗ form mua hàng để bạn tiến hành mua hàng--> 
    <a id="giohang" href="?thamso=gio_hang">Giỏ hàng</a>
</div>