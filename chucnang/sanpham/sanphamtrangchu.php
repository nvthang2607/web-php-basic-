<html>
    <body>
    <hr  width="103%" size="15px" align="center" color="white"/>
    </body>
    <style>
        center.img :hover{
            width: 300px;
            height:340px;
        }
    </style>
</html>
<br><br>
Sản phẩm của chúng tôi
<br><br>
<?php
//đây là phần in ra sp trong trang index, chỉ những ảnh được chọn trong côt TrangChu trong bảng hanghoa mới được in ra
    $sql="SELECT MSHH,TenHH,gia,Hinh,MaNhom from hanghoa where TrangChu='co' order by SXTrangChu desc limit 0,15";
    $result=mysqli_query($conn,$sql);
    //in ra theo dạng 3 sp trong 1 hàng
    echo "<table>";
    while($row = mysqli_fetch_array($result))
    {   
        echo "<tr>";
            for($i=1;$i<=3;$i++)
            {
                echo "<td align='center' width='215px' valign='top' >";
                    if($row!=false)
                    { 
                        $manhom=$row['MaNhom'];
                        $sql2="SELECT TenNhom from nhomhanghoa where MaNhom='$manhom';";
                        $result2=mysqli_query($conn,$sql2);
                        $row2=mysqli_fetch_array($result2);
                        $tennhom=$row2['TenNhom'];
                        $link_anh="hinhanh/sanpham/".$tennhom.'/'.$row['Hinh'];
                        $link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$row['MSHH'];
                      
                        echo "<a href='$link_chi_tiet' >";
                            echo "<img src='$link_anh' width='300px' >";
                        echo "</a>";
                        echo "<br>";
                        echo "<a href='$link_chi_tiet' >";
                            echo $row['TenHH'];
                        echo "</a>";
                        echo "<br>";
                        $gia=$row['gia'];
                        $gia=number_format($gia,0,",",".");
                        echo "<div style='margin-top:5px' >";                       
                        echo $gia;
                        echo "</div>";
                        echo "<br>";
                    }
                    else
                    {
                        echo "&nbsp;";
                    }
                echo "</td>";
                if($i!=3)
                {
                    $row=mysqli_fetch_array($result);
                }
            }
        echo "</tr>";
    }
    echo "</table>";
?>