<?php
    if(isset($_GET['id']) and $_SESSION['trang_chi_tiet_gio_hang']=="co")
    {   //'id_them_vao_gio' dùng để lưu id sản phẩm của trang chi tiết sản phẩm trước đó 
        //(bấm thêm vào giỏ bao nhiêu sản phẩm khác nhau thì sẽ có bấy nhiêu 'id' để lưu vào session)
        //nếu có tồn tại ID của sp để thêm vào giỏ (nếu ko có ID nghĩa là không có sp nào được thêm vào giỏ)
        $_SESSION['trang_chi_tiet_gio_hang']="huy_bo";
        if(isset($_SESSION['id_them_vao_gio']))
        {   //biến so để đến số lượng ID sản phẩm trong mảng session
            $so=count($_SESSION['id_them_vao_gio']);
            //tạo biến trùng lặp =0 (nghĩa là ban đầu không có ID nào trùng nhau)
            $trung_lap="khong";
            //chạy hết các phần tử trong mảng session (đi qua từng ID của sp đưuọc thêm vào giỏ)
            for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
            {   //so sánh nếu ID mới thêm vào đã có trong mảng session nghĩa là đã được thêm vào giỏ trước đó 
                if($_SESSION['id_them_vao_gio'][$i]==$_GET['id'])
                {   //đã được thêm vào giỏ trước đó thì có xảy ra trùng lặp
                    $trung_lap="co";
                    //lấy vị trí trùng lặp là vịa trí mới thêm
                    $vi_tri_trung_lap=$i;
                    break;
                }
            }//nếu không có ID sp nào trùng thì:
            if($trung_lap=="khong")
            {   //Lấy id sp để thêm vào giỏ
                $_SESSION['id_them_vao_gio'][$so]=$_GET['id'];
                //lấy số lượng sp
                $_SESSION['sl_them_vao_gio'][$so]=$_GET['so_luong'];
                if(empty($_SESSION['sl_them_vao_gio'][$so])){
                    $_SESSION['sl_them_vao_gio'][$so]=0;
                }
            }//nếu trùng thì:
            if($trung_lap=="co")
            {   //cập nhật sl cũ + sl mới:
                $_SESSION['sl_them_vao_gio'][$vi_tri_trung_lap]=$_SESSION['sl_them_vao_gio'][$vi_tri_trung_lap]+$_GET['so_luong'];
            }
        }
        else
        {
            $_SESSION['id_them_vao_gio'][0]=$_GET['id'];
            $_SESSION['sl_them_vao_gio'][0]=$_GET['so_luong'];
        }
    }

    //Đây là đoạn code xác định giỏ hàng có hay là không có sản phẩm
    //Ban đầu là không có.
    $gio_hang="khong";
    //nếu tồn tại mảng session (nghĩa là có thêm sp vào giỏ hàng)
    if(isset($_SESSION['id_them_vao_gio']))
    {   //đầu tiên số lượn sẽ =0
        $so_luong=0;
        for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
        {   //nếu có ID sản phẩm thì lấy số lượng + thêm số lượng đã được nhập khi khách thêm vào giỏ hàng
            //trường hợp khách xóa số lượng trong ô số lượng mà không điền vào sô mới
            //nếu ko có dòng kiểm tra rỗng này thì trang sẽ báo lỗi
            //ý tưởng là nêu khách quên nhập vào số lượng mới thì ta mặc định gán nó = 0
            if(empty($_SESSION['sl_them_vao_gio'][$i])){
                $_SESSION['sl_them_vao_gio'][$i]=0;
            }
            $so_luong=$so_luong+$_SESSION['sl_them_vao_gio'][$i];
        }//nếu số lượng khác không thì:
        if($so_luong!=0)
        {   //cập nhật lại tình trạng giỏ hàng là có hàng
            $gio_hang="co";
        }
    }

    echo "<h2>Thông tin đơn hàng (Vui lòng ấn nút cập nhật lần cuối trước khi mua hàng):</h2>";
    echo "<br>";
    echo "<br>";
    //nếu không có gì trong giỏ hàng thì:
    if($gio_hang=="khong")
    {   //in ra không có
        echo "Không có sản phẩm trong giỏ hàng";
    }//ngược lại là có thì:
    else
    {   //cập nhật giỏ hàng:
        echo "<form action='' method='post'>";
        echo "<input type='hidden' name='cap_nhat_gio_hang' value='co'> ";
        echo "<tr>";
        echo "<td>&nbsp;</td>";
        echo "<td><input type='submit' value='Cập nhật' > </td>";
        echo "<td>&nbsp;</td>";
        echo "<td>&nbsp;</td>";
        echo "</tr>";
        //in thông tin giỏ hàng ra
            echo "<table>";
                echo "<tr>";
                    echo "<td width='200px' >Tên</td>";
                    echo "<td width='150px' >Số lượng</td>";
                    echo "<td width='150px' >Đơn giá</td>";
                    echo "<td width='170px' >Thành tiền</td>";
                echo "</tr>";
                //tổng tiền đầu tiên cho =0
                $tong_cong=0;
                $t=1;
                //chạy hết mảng các ID sản phẩm
                for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
                {
                    //lấy thông tin sp đó ra
                    $sql="SELECT MSHH,TenHH,gia,SoLuongHang from hanghoa where MSHH='".$_SESSION['id_them_vao_gio'][$i]."'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $sl=$row['SoLuongHang'];
                        //tiền bằng giá nhân với số lượng
                        
                        $tien=$row['gia']*$_SESSION['sl_them_vao_gio'][$i];
                        //Tổng cộng thì cộng số tiền đã mua vào
                        $tong_cong=$tong_cong+$tien;
                        //nếu số lượng khác 0:
                        if($_SESSION['sl_them_vao_gio'][$i]!=0)
                        {
                            //in thông tin ra thành bảng hóa đơn
                            $name_id="id_".$i;
                            $name_sl="sl_".$i;
                            $ten=$row['TenHH'];
                            echo "<tr>";
                                echo "<td>".$row['TenHH']."</td>";
                                echo "<td>";
                                echo "<input type='hidden' name='".$name_id."' value='".$_SESSION['id_them_vao_gio'][$i]."' >";
                                echo "<input type='text' style='width:50px' name='".$name_sl."' value='". $_SESSION['sl_them_vao_gio'][$i]."' > ";
                                echo "</td>";
                                $gia=number_format($row['gia'],0,",",".");
                                $tien=number_format($tien,0,",",".");
                                echo "<td>";
                                    echo "$gia VND";
                                echo "</td>";
                                echo "<td>";
                                    echo "$tien VND";
                                echo "</td>";
                                echo "</td>";
                            echo "</tr>";
                            echo "<tr >";
                                echo "<td colspan='4' id='tbhh'>";
                                    if($sl<1){
                                        $t=0;
                                        // lấy tên và  giá trị của hàng hóa đó
                                        echo "<b>Sản phẩm $ten đã hết hàng, chân thành xin lỗi quí khách!</b>";
                                        echo "<br>";
                                    }else if($sl< $_SESSION['sl_them_vao_gio'][$i]){
                                        // lấy tên và  giá trị của hàng hóa đó
                                        $t=0;
                                        echo "<b>Sản phẩm $ten không đủ ".$_SESSION['sl_them_vao_gio'][$i]." sản phẩm, hiện shop chỉ còn $sl sản phẩm, mong quí khách thông cảm! </b>";
                                        echo "<br>";
                                    }
                                echo"</td>";
                            echo "</tr>";
                        }
                        
                }          
            echo "</table>";
        //nếu t==1 nghĩa là không có sp nào hết hàng hoặc không đủ hàng, vậy nên sẽ in ra số tiền cần thanh toán
        if($t==1){
            echo "</form>";
            echo "<br>";
            $tong_cong=number_format($tong_cong,0,",",".");
            echo "<h2>Tổng giá trị đơn hàng là : ".$tong_cong." VNĐ </h2>";
            include("chucnang\giohang\bieu_mau_mua_hang.php");
            //ngược lại thì nó có lỗi về mặt số lượng, cụ thể là thiếu số lượng hàng nên gợi ý khách liên hệ với ta
        }else{
            echo "<h3><b>Quí khách có thể liên hệ trực tiếp đến cửa hàng để đặt mua sản phẩm sớm nhất có thể khi shop về hàng</b></h3>";
        }     
    }
    //đây là đoạn code để hiển thị số lượng sản phẩm cho vùng giỏ hàng bên cột phải của trang
    $gio_hang="khong";
    if(isset($_SESSION['id_them_vao_gio']))
    {
        $so_luong=0;
        for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
        {
            $so_luong=$so_luong+$_SESSION['sl_them_vao_gio'][$i];
        }
        if($so_luong!=0)
        {
            $gio_hang="co";
        }
    }
?>