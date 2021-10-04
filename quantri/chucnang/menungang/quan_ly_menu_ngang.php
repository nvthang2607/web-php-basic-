
<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    //đây là 1 danh sách các menu ngang
    //nếu nhiều menu ngang quá thì ta phân trang , mỗi trang chỉ tối đa 20 menu
    $so_dong_tren_mot_trang=20;
    //nếu không có biến trang trên URL thì cho trang =1;
    if(!isset($_GET['trang'])){$_GET['trang']=1;}
   //điếm số menu có trong bảng menu
    $sql="SELECT count(*) from menu_ngang";
    $resutl=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($resutl);
    //kiểm tra xem sẽ có bao nhiêu trang
    $so_trang=ceil($row[0]/$so_dong_tren_mot_trang);
    
    // tính vị trí bắt đầu giới hạn của bảng 'menu_ngang' tùy theo trang hiện hành
    // ở đây , nếu là trang 1 thì $vtbd=0 , nếu là trang 2 thì $vtbd=20 , nếu là trang 3 thì $vtbd=40
    $vtbd=($_GET['trang']-1)*$so_dong_tren_mot_trang;
    $sql="SELECT ID,Ten from menu_ngang order by ID limit $vtbd,$so_dong_tren_mot_trang";
    $resutl=mysqli_query($conn,$sql);
?>
<table width="990px" class="tb_a1" >
    <tr style="background:#CCFFFF;height:40px;" >
        <td width="550px" ><b>Tên</b></td>
        <td align="center" width="220px" ><b>Sửa</b></td>
        <td align="center" width="220px" ><b>Xóa</b></td>
    </tr>
    <?php
        while($row=mysqli_fetch_array($resutl))
        {
            $id=$row['ID'];
            $ten=$row['Ten'];
            $link_sua="?thamso=sua_menu_ngang&id=".$id."&trang=".$_GET['trang'];
            $link_xoa="?xoa_menu_ngang=co&id=".$id;
            ?>
                <tr class="a_1" >
                    <td>
                        <a href="<?php echo $link_sua; ?>" class="lk_a1" ><?php echo $ten; ?></a>
                    </td>
                    <td align="center" >
                        <a href="<?php echo $link_sua; ?>" class="lk_a1" >Sửa</a>
                    </td>
                    <td align="center" >
                        <a href="<?php echo $link_xoa; ?>" class="lk_a1" >Xóa</a>
                    </td>
                </tr>
            <?php
        }
    ?>
    <tr>
        <td colspan="3" align="center" >
            <br>
            <?php
                for($i=1;$i<=$so_trang;$i++)
                {
                    $link_phan_trang="?thamso=quan_ly_menu_ngang&trang=".$i;
                    echo "<a href='$link_phan_trang' class='phan_trang' >";
                        echo $i;
                    echo "</a> ";
                }
            ?>
            <br><br>
        </td>
    </tr>
</table>