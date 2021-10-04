<?php
    //set up múi giờ Việt Nam
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    //lấy giá trị thời gian hiện tại
    $now=date("Y-m-d H:i:s");
    //nếu có Hàng trong giỏ thì:
    if(isset($_SESSION['id_them_vao_gio'])){
        //lấy giá trị từ form
        $ten_nguoi_mua=trim($_POST['ten_nguoi_mua']);
        $dien_thoai=trim($_POST['dien_thoai']);
        $dia_chi=trim(nl2br($_POST['dia_chi']));

        //nếu các giá trị vừa lấy đầy đủ (không có thằng nào trống thì :)
        if($ten_nguoi_mua!="" and $dien_thoai!="" and $dia_chi!="")
        {   if(strlen($ten_nguoi_mua)<=50){
                if(strlen($dia_chi)<=50){
                    if($dien_thoai)
                    //insert vào khachhang trước
                    $sql="INSERT INTO khachhang(HoTenKH,DiaChi,SDT)VALUES ('$ten_nguoi_mua','$dia_chi','$dien_thoai');";
                    $result = mysqli_query($conn, $sql);
                    //sau đó lấy MSKH được tạo tự động khi insert vào khachhang ở bước trên
                    //lấy MSKH là để  insert vào bảng dathang
                    $sql1="SELECT MSKH from khachhang where SDT='$dien_thoai' and HoTenKH='$ten_nguoi_mua' and DiaChi='$dia_chi';";
                    $result1 = mysqli_query($conn,$sql1);
                    $row1 = mysqli_fetch_array($result1);
                    $mskh=$row1['MSKH'];
                    mysqli_free_result($result1);
                    $sql2="INSERT INTO dathang(MSKH,MSNV,NgayDH,TrangThai) VALUES ('$mskh','0','$now','Đang chờ');";
                    $result2 =mysqli_query($conn,$sql2);
                    //thêm từng mẫu tin vào bảng Chi tiết đặt hàng
                    /*ý tưởng là 1 dathang có nhiều món hàng, từng mẫu tin trong bảng chi tiết đặt hàng
                    là để chia ra 1 món hàng (được xác định bằng MSHH và nó nằm trong đơn hàng nào (SoDonDH))*/
                    //đếm session bằng biến count, chạy hết các MSHH;
                    for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
                    {   //lấy SoDonDH khi mskh được chọn ở phần trên (bảng dathang)
                        $sql3="SELECT * from dathang where MSKH='$mskh';";
                        $result3 =mysqli_query($conn,$sql3);
                        $row3 = mysqli_fetch_array($result3);
                        $shd=$row3['SoDonDH'];
                        mysqli_free_result($result3);
                        //lấy lần lượt từng MSHH
                        $id=$_SESSION['id_them_vao_gio'][$i];
                        //từng MSHH sẽ có 1 số lượng cụ thể
                        $sl=$_SESSION['sl_them_vao_gio'][$i];
                        //lấy ra giá của món hàng trong bảng hanghoa
                        $sql4="SELECT gia,SoLuongHang from hanghoa where MSHH='$id';";
                        $result4 =mysqli_query($conn,$sql4);
                        $row4 = mysqli_fetch_array($result4);
                        //có giá 1 sp==> lấy giá đó nhân với số lượng thì được giá đặt hàng
                        $giahh=$row4['gia']*$sl;
                        //so luong hang trong kho
                        $slh=$row4['SoLuongHang'];
                        //nếu mua thành công thì số lượng trong kho còn là:
                        $soluong=$slh-$sl;
                        mysqli_free_result($result4);
                        //có Số đơn hàng, có MSHH, có số lượng, có giá đặt hàng, chỉ việc insert vào chitietdathang thôi
                        $sql5="INSERT INTO chitietdathang(SoDonDH,MSHH,SoLuong,GiaDatHang) VALUES('$shd','$id','$sl','$giahh');";
                        $result5 =mysqli_query($conn,$sql5);

                        $sql6="UPDATE hanghoa SET SoLuongHang='$soluong' WHERE MSHH='$id';";
                        $result6 =mysqli_query($conn,$sql6);
                        
                    }   //giải phóng
                        unset($_SESSION['id_them_vao_gio']);
                        unset($_SESSION['sl_them_vao_gio']);           
                        thong_bao_html_roi_chuyen_trang("Cảm ơn bạn đã mua hàng tại web site chúng tôi","index.php");
                }else{
                    thong_bao_html("địa chỉ người mua không quá 50 ký tự");
                }
            }else{
                thong_bao_html("tên người mua không quá 50 ký tự");
            }
        }
        else
        {   //nếu có thằng nào bị bỏ trống thì báo lỗi
            thong_bao_html("Không được bỏ trống tên người mua , điện thoại , địa chỉ");
            //quay lại trang trước để sửa
            trang_truoc();
            exit();
        }
    }
?>