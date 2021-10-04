<?php
    //Dòng code này để xác định là bạn có truy cập vào trang chi tiết sản phẩm
    $_SESSION['trang_chi_tiet_gio_hang']="co";
    $id=$_GET['id'];
    $sql="SELECT * from hanghoa where MSHH='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $manhom=$row['MaNhom'];

    $sql2="SELECT TenNhom from nhomhanghoa where MaNhom='$manhom';";
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_array($result2);
    $tennhom=$row2['TenNhom'];
    $link_anh="hinhanh/sanpham/".$tennhom.'/'.$row['Hinh'];
    echo "<table>";
        echo "<tr>";
            echo "<td width='300px' align='center' >";
                echo "<img src='$link_anh' width='300px' >";
            echo "</td>";
            echo "<td valign='top' >";
                echo "<a href='?thamso=chi_tiet_san_pham&id=$id'>";
                    echo $row['TenHH'];
                echo "</a>";
                echo "<br>";
                echo "<br>";
                $gia=$row['gia'];
                $giafm=number_format($gia,0,",",".");//giá đã format
                echo "<div style='margin-top:5px' >";                       
                echo $giafm;
                echo "</div>";
                echo "<br>";
                //[thêm vào giỏ hàng
                echo "<br>";
                echo "<br>";
                echo "<form>";
                    echo "<input type='hidden' name='thamso' value='gio_hang' > ";
                    echo "<input type='hidden' name='id' value='".$_GET['id']."' > ";
                    echo "<input type='text' name='so_luong' value='1' style='width:50px' > ";
                    echo "<input type='submit' value='Thêm vào giỏ' style='margin-left:15px' > ";
                echo "</form>";
                //thêm vào giỏ hàng]
            echo "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td  id='mthh' colspan='2' >";
                echo "<br>";
                echo "<br>";
                echo $row['MoTaHH'];
            echo "</td>";
        echo "</tr>";
    echo "</table>";
?>