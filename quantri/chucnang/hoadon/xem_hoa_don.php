<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    $so_dong_tren_mot_trang=20;
//lấy để in ra mã hóa đơn
    $id=$_GET['id'];
    $sql="SELECT * from dathang where SoDonDH='$id';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $mskh=$row['MSKH'];

//lấy để in ra tên khách hàng
    $sql="SELECT * from khachhang where MSKH='$mskh' ";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $tenkh=$row['HoTenKH'];


    //lấy để in ra danh sách hàng hóa
    $sql="SELECT count(*) from chitietdathang where SoDonDH='$id' ";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $so_trang=ceil($row[0]/$so_dong_tren_mot_trang);
  
    $vtbd=($_GET['trang']-1)*$so_dong_tren_mot_trang;
    $sql="SELECT * from chitietdathang where SoDonDH='$id' order by MSHH ";
    $result=mysqli_query($conn,$sql);
    $tongtien=0;
    while($row=mysqli_fetch_array($result)){
        $tongtien=$tongtien+$row['GiaDatHang'];
    }
    $tongtien=number_format($tongtien,0,",",".");

    $sql1="SELECT * from chitietdathang where SoDonDH='$id' order by MSHH limit $vtbd,$so_dong_tren_mot_trang ";
    $result1=mysqli_query($conn,$sql1);
    $link_dong="?thamso=hoa_don&&trang=".$_GET['trang'];
?>

<table width="990px" class="tb_a1">
    <tr>
        <td width="300px" ><h3>Hóa đơn số: <?php echo'<b>'. $id .'</b>';?></h3></td>
    </tr>
    <tr>
        <td width="300px" ><h3>Tên Khách hàng: <?php echo '<b>'.$tenkh .'</b>';?></h3></td>
    </tr>
    <tr>
        <td width="500px" ><h3>Tổng Giá trị: <?php echo '<b>'. "$tongtien" .' đồng' .'</b>';?> </h3></td>
    </tr>
    <tr>
        <td width="400px" ><b style="color:blue;font-size:20px" >Sản phẩm được đặt hàng </b><br><br> </td>   
        <td width="100px" align="right" >
            <a href="<?php echo $link_dong; ?>" class="lk_a1" style="margin-right:30px" >Đóng</a>
        </td>       
    </tr>
    <tr style="background:#CCFFFF;height:40px;" >
        <td align="center"width="200px" ><b>Tên hàng hóa</b></td>
        <td align="center"width="250px" ><b>Số Lượng</b></td>
        <td align="center"width="100px" ><b>Thành tiền</b></td>
        <td align="center"width="100px" ><b>Xóa</b></td>
    </tr>
    <?php
        while($row1=mysqli_fetch_array($result1))
        {
            $mshh=$row1['MSHH'];
            $soluong=$row1['SoLuong'];
            $giadathang=$row1['GiaDatHang'];
            
            $sql="SELECT * from hanghoa where MSHH='$mshh' ";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result);
            $tenhh=$row['TenHH'];


            
            $link_xoa="?xoa_chi_tiet_don_hang=co&id=".$id."&MSHH=".$mshh."&trang=".$_GET['trang'];
            ?>
                <tr class="a_1" > 
                    <td>
                        <a class="lk_a1" ><?php echo $tenhh; ?></a>
                    </td>
                    <td>
                        <a class="lk_a1" ><?php echo $soluong; ?></a>
                    </td>
                    <td>
                        <a class="lk_a1" ><?php echo $giadathang; ?></a>
                    </td>
                    <td>
                        <a href="<?php echo $link_xoa; ?>" class="lk_a1" >Xóa</a>
                    </td>
                </tr>
            <?php
        }
    ?>
    <tr>
        <td colspan="7" align="center" >
            <br>
            <?php
                echo "<center>";
                for($i=1;$i<=$so_trang;$i++)
                {
                    $link_phan_trang="?thamso=chi_tiet_don_hang&trang=".$i;
                    echo "<a href='$link_phan_trang' class='phan_trang' >";
                        echo $i;
                    echo "</a> ";
                }
                echo "</center>";
            ?>
            <br><br>
        </td>
    </tr>
</table>
