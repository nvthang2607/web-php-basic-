<?php
//quay  về giao diện đăng nhập nếu truy cập trực tiếp
    if(!isset($bien_bao_mat)){exit();}
?>
 <!-- tìm id menu thông qua biến 'id_menu' trên url-->
<?php
//nếu không tìm thấy id_menu trên url thì mặc định cho id là toàn bộ sp, tức là in tất cả
    if(!isset($_GET['id_menu']))
    {//gán id= toàn bộ sp ,tức là in tất cả
        $id_menu="toan_bo_san_pham";
    }
    else//ngược lại nghĩa là có id_menu trên url
    {//nếu id khác rỗng và id khác toàn bộ sp thì:
        if($_GET['id_menu']!="" and $_GET['id_menu']!="toan_bo_san_pham")
        {//lấy giá trị đó
            $id_menu=$_GET['id_menu'];
        }
        else//ngược lại nếu id = rỗng hoặc = toàn bộ sp thì:
        {//in toàn bộ sp
            $id_menu="toan_bo_san_pham";
        }
    }
?>
<br>
<div style="width:990px;text-align:left" >
<!-- xuất vùng chứa hộp chọn xuất sản phẩm, khi thay đổi tùy chọn ( sự kiện onchange ) 
thì chuyển trang với biến 'thamso'='quan_ly_san_pham' cùng với biến 'id_menu' trên url = MaNhom trong bảng'nhomhanghoa'-->
    Chọn : <select name="danh_muc" onchange="window.location='?thamso=quan_ly_san_pham&id_menu='+this.value" >
    <option value="" >Toàn bộ sản phẩm</option>
    <?php
    //láy được biến tham số và id_menu
    //tiến hành kết nối đến bảng nhomhanghoa
        $sql="SELECT * from nhomhanghoa order by MaNhom ";
        $result=mysqli_query($conn,$sql);
        $a="";
        while($row=mysqli_fetch_array($result))
        {//lấy tên nhóm hàng hóa
            $ten=$row['TenNhom'];
            //lấy MSHH
            $id=$row['MaNhom'];
            if($id_menu==$id)
            {  // khi xảy ra trùng khớp thì sẽ cho biến $a có giá trị là 'selected' rồi xuất vào thẻ 'option'
                // thẻ 'option' nào có 'selected' thì sẽ được chọn và hiển thị ra trước
                $a="selected";
            }// xuất giá trị của thẻ 'option' (thuộc tính 'value' ,  giá trị là id menu tương ứng )
                // và biến $a (nhằm chọn tùy chọn nào hiển thị trước)
            echo "<option value='$id' $a >";
                echo $ten;
            echo "</option>";
            $a="";
        }
    ?>
    </select>
</div>
<br>
<!--tiến hành phân trang. Giải thích thêm là hiện 1 bảng ra, nhưng danh sách bảng này không quá 10 sp
Nếu nhiều hơn 10 sẽ qua trang khác, cứ như thế thì số trang = sốsp/10-->
<?php
    //số sp giới hạn trong 1 trang
    $so_dong_tren_mot_trang=10;
     // nếu không tồn tại biến 'trang' trên url thì trang= 1 , làm như vậy là để tính biến $vtbd (vị trí bất đầu)
    // biến $vtbd là vị trí bắt đầu giới hạn menu trong câu truy vấn select , limit phía dưới
    //  giá trị biến $vtbd tùy theo biến 'trang' trên url
    // (nghĩa là giá trị của biến $vtbd tùy vào trang đang hiện hành)   ví dụ trang 1 bắt đầu từ sp có id=1 đến 9
    //trang 2 bắt đầu từ sp id = 10 đến 19...
    if(!isset($_GET['trang'])){$_GET['trang']=1;}
    //nếu id_menu là toàn bộ sp thì:
    if($id_menu=="toan_bo_san_pham")
    {//đếm tất cả sp trong bảng hanghoa
        $sql="SELECT count(*) from hanghoa";
    }//ngược lại là id cụ thể thì:
    else
    {//đếm sp có id được chon thôi
        $sql="SELECT count(*) from hanghoa where MaNhom='$id_menu' ";
    }
    //truy vấn 1 trong 2 câu lệnh trên
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    //số trang = số sp/10;
    $so_trang=ceil($row[0]/$so_dong_tren_mot_trang);
   //vị trí bắt đầu tại trang 1 =(1-1)*10=0   ==> nghĩa là bắt đầu từ sp có số tự tự tên cột row là 0
   //ví dụ 2 vị trí bắt đầu tại trang 2 = (2-1)*10=10 ==>là sp có thứ tự trên cột row là 10
    $vtbd=($_GET['trang']-1)*$so_dong_tren_mot_trang;
    //nếu là toàn bộ sp thì
    if($id_menu=="toan_bo_san_pham")
    {//câu lệnh lấy thông tin với giới hạn tại vị trí bắt đầu và số lượng là số sp trên 1 trang
        $sql="SELECT MSHH,TenHH,gia,SoLuongHang,Hinh,MaNhom from hanghoa order by MSHH desc limit $vtbd,$so_dong_tren_mot_trang";
    }
    // ngược lại sẽ lấy sp theo nhóm hàng hóa cụ thể chứ không phải là toàn bộ
    else
    {
        $sql="SELECT MSHH,TenHH,gia,SoLuongHang,Hinh,MaNhom from hanghoa where MaNhom='$id_menu' order by MSHH desc limit $vtbd,$so_dong_tren_mot_trang";
    }
    $result=mysqli_query($conn,$sql);
?>

<table width="990px" class="tb_a1" >
    <tr style="background:#CCFFFF;height:40px;" >
        <td width="120px" align="center"><b>Hình ảnh</b></td>
        <td width="300px" align="center"><b>MSHH</b></td>
        <td width="450px" align="center"><b>Tên</b></td>
        <td align="center" width="140px" ><b>Giá</b></td>
        <td align="center" width="140px" ><b>Số Lượng</b></td>
        <td align="center" width="200px" ><b>Thêm Số Lượng</b></td>
        <td align="center" width="140px" ><b>Sửa</b></td>
        <td align="center" width="140px" ><b>Xóa</b></td>
    </tr>
    <?php
    //in hết sp đã được chọn
        while($row=mysqli_fetch_array($result))
        {
            $id=$row['MSHH'];
            $ten=$row['TenHH'];
            $gia=$row['gia'];
            $sl=$row['SoLuongHang'];
            $gia=number_format($gia,0,",",".");
            $manhom=$row['MaNhom'];

            $sql2="SELECT TenNhom from nhomhanghoa where MaNhom='$manhom';";
            $result2=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_array($result2);
            $tennhom=$row2['TenNhom'];


            $link_hinh="../hinhanh/sanpham/".$tennhom.'/'.$row['Hinh'];
            $link_themsl="?thamso=them_so_luong_san_pham&id_menu=".$id_menu."&id=".$id."&trang=".$_GET['trang'];
            $link_sua="?thamso=sua_san_pham&id_menu=".$id_menu."&id=".$id."&trang=".$_GET['trang'];
            $link_xoa="?xoa_san_pham=co&id=".$id;
            ?>
                <tr class="a_1" >
                    <td align="center" >
                        <a href="<?php echo $link_sua; ?>" >
                            <img src="<?php echo $link_hinh; ?>" style="width:100px;margin-top:10px;margin-bottom:10px;" border="0" >
                        </a>
                    </td>
                    <td align="center">
                        <a href="<?php echo $link_sua; ?>" class="lk_a1" style="margin-left:10px" ><?php echo $id; ?></a>
                    </td>
                    <td align="center">
                        <a href="<?php echo $link_sua; ?>" class="lk_a1" style="margin-left:10px" ><?php echo $ten; ?></a>
                    </td>
                    <td align="center" >
                        <?php echo $gia; ?>
                    </td>
                    <td align="center" >
                        <?php echo $sl; ?>
                    </td>
                    <td align="center" >
                        <a href="<?php echo $link_themsl; ?>" class="lk_a1" >Thêm</a>
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
        <td colspan="8" align="center" >
            <br>
            <?php
                for($i=1;$i<=$so_trang;$i++)
                {
                    $link_phan_trang="?thamso=quan_ly_san_pham&id_menu=".$id_menu."&trang=".$i;
                    echo "<a href='$link_phan_trang' class='phan_trang' >";
                        echo '|';
                        echo $i.'| ';
                    echo "</a> ";
                }
            ?>
            <br><br>
        </td>
    </tr>
</table>