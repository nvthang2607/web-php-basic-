<?php
    if(trim($_GET['tu_khoa'])!=""){
        $m=explode(" ",$_GET['tu_khoa']);  
        $chuoi_tim_sql="";
        for($i=0;$i<count($m);$i++)
        {
            $tu=trim($m[$i]);
            if($tu!="")
            {
                $chuoi_tim_sql=$chuoi_tim_sql." TenHH like '%".$tu."%' or";
            }
        }
        
        $m_2=explode(" ",$chuoi_tim_sql);  
        $chuoi_tim_sql_2="";
        for($i=0;$i<count($m_2)-1;$i++)
        {
            $chuoi_tim_sql_2=$chuoi_tim_sql_2.$m_2[$i]." ";
        }
        //[phân trang sản phẩm:
        $so_du_lieu=15;
        $sql="SELECT count(*) from hanghoa where $chuoi_tim_sql_2";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $so_trang = ceil($row[0]/$so_du_lieu);
        //Lệnh limit có tác dụng là giới hạn dữ liệu xuất ra (ở đây là giới hạn sản phẩm xuất ra)
        if(!isset($_GET['trang']))
            {
                $vtbd=0;
            }
            else{
                $vtbd=($_GET['trang']-1)*$so_du_lieu;
            }
        //phân trang sp]
        //[giới hạn sp xuất ra
        $sql="SELECT MSHH,tenHH,gia,Hinh,MaNhom from hanghoa where $chuoi_tim_sql_2 order by MSHH desc limit $vtbd,$so_du_lieu";
        //giới hạn sp xuất ra]
        
        $result = mysqli_query($conn, $sql);
        echo "<table>";
        while($row = mysqli_fetch_array($result))
        {   
            $manhom=$row['MaNhom'];
            $sql2="SELECT TenNhom from nhomhanghoa where MaNhom='$manhom';";
            $result2=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_array($result2);
            $tennhom=$row2['TenNhom'];
            echo "<tr>";
                for($i=1;$i<=3;$i++)
                {
                    echo "<td align='center' width='215px' >";
                        if($row!=false)
                        {   //[xuất sp ra
                            $link_anh="hinhanh/sanpham/".$tennhom.'/'.$row['Hinh'];
                            //[chi tiết sp
                            $link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$row['MSHH'];
                            //chi tiết sp]
                            echo "<a href='$link_chi_tiet' >";
                                echo "<img src='$link_anh' width='300px' >";
                            echo "</a>"; 
                            echo "<br>";
                            echo "<a href='$link_chi_tiet' >";
                                echo $row['tenHH'];
                            echo "</a>"; 
                            echo "<br>";
                            $gia=$row['gia'];
                            $gia=number_format($gia,0,",",".");
                            echo "<div style='margin-top:5px' >";                       
                            echo $gia;
                            echo "</div>";
                            echo "<br>";
                            //xuat sp ra]
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
        mysqli_free_result($result);
        // [xuất link phân trang
        echo "<tr>";
        echo "<td colspan='3' align='center' >";
            echo "<div class='phan_trang' >";
                for($i=1;$i<=$so_trang;$i++)
                {
                    $link="?thamso=tim_kiem&tu_khoa=".$_GET['tu_khoa']."&trang=".$i;
                    echo "<a href='$link' >";
                        echo $i;echo " ";
                    echo "</a>";
                }
            echo "</div>";
        echo "</td>";
        echo "</tr>";
        //xuất link phân trang]
        echo "</table>";
    }
    else
    {
    echo "Bạn chưa nhập từ khóa";
    }
?>