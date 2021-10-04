<?php
    //nếu truy cập trực tiếp thì ko hiện gì
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    //lấy thông tin từ form thêm sản phẩm
    $ten=trim($_POST['ten']);
    $ten=str_replace("'","&#39;",$ten);
    $mahanghoa=trim($_POST['mahanghoa']);
    $mahanghoa=str_replace("'","&#39;",$mahanghoa);
    $danh_muc=$_POST['danh_muc'];
    $soluong=trim($_POST['soluong']);
    $gia=trim($_POST['gia']);
    //nếu giá trống thì mặc định =0
    if($gia==""){$gia=0;}
    $ten_file_anh=$_FILES['hinh_anh']['name'];
    $trang_chu=$_POST['trang_chu'];
    $noi_bat=$_POST['noi_bat'];
    $noi_dung=$_POST['noi_dung'];
    $noi_dung=str_replace("'","&#39;",$noi_dung);
    //câu lệnh lấy thứ tự sắp xếp để hiện sp trên trang chủ vào csdl
    //nhắc lại là sản phẩm được thêm vào gần nhất sẽ có giá trị ở côt SXTrangChủ(trong bảng hanghoa) là lớn hơn sp cũ
    //điều trên cũng có nghĩa là sp nào mới thêm được in ở đầu trang chủ 
    $sql="SELECT max(SXTrangChu) from hanghoa";
    //thực hiện câu lệnh
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    //tăng thêm giá trị này lên 1 để chèn sp mới vào
    $sap_xep_trang_chu=$row[0]+1;
    $kydanh=$_SESSION['ky_danh'];
    $sql="SELECT ChucVu from nhanvien where HoTenNV='$kydanh';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);


    if($row['ChucVu']=='edit'|| $row['ChucVu']=='admin'){
        //nếu dữ liệu biến tên( được lấy bằng phương thức POST ở trên) là khác rỗng
        if($ten!=""){   
            //nếu tên file ảnh cũng khách rỗng
            if($ten_file_anh!="")
            {//xem tên ảnh có bị trùng không
                $sql="SELECT count(*) from hanghoa where Hinh='$ten_file_anh' ";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_array($result);

                $sql1="SELECT count(*) from hanghoa where MSHH='$mahanghoa' ";
                $result1=mysqli_query($conn,$sql1);
                $row1=mysqli_fetch_array($result1);
                //nếu lấy tên sp = không có nghĩa tên hình ảnh không có trong scdl
                if($row[0]==0)
                {
                    if($row1[0]==0){
                        //thực hiện câu lệnh thêm sp vào csdl
                        $sql="INSERT INTO hanghoa (MSHH ,TenHH ,gia ,SoLuongHang,Hinh ,MoTaHH ,MaNhom ,noi_bat ,TrangChu ,SXTrangChu)
                        VALUES ('$mahanghoa','$ten','$gia','$soluong','$ten_file_anh','$noi_dung','$danh_muc','$noi_bat','$trang_chu','$sap_xep_trang_chu');";
                        $result=mysqli_query($conn,$sql);

                        $sql2="SELECT TenNhom from nhomhanghoa where MaNhom='$danh_muc';";
                        $result2=mysqli_query($conn,$sql2);
                        $row2=mysqli_fetch_array($result2);
                        $tennhom=$row2[0];
                        //lấy đường dẫn ảnh
                        $duong_dan_anh="../hinhanh/sanpham/".$tennhom.'/'.$ten_file_anh;
                        //tải ảnh về thư mục webbanhang/hinhanh/sanpham (cái ảnh mà bạn upload từ client) trên sever
                        move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$duong_dan_anh);
                        //gán biến session bằng các lựa chọn.
                        // việc này nhằm để lưu giữ sự lựa chọn danh mục menu cho việc tải lại trang thêm sản phẩm
                        // (không bao gồm việc thoát trình duyệt web)
                        $_SESSION['danh_muc_menu']=$danh_muc;
                        $_SESSION['tuy_chon_trang_chu']=$trang_chu;
                        $_SESSION['tuy_chon_noi_bat']=$noi_bat;
                    }
                    else
                        {
                            thong_bao_html("Mã sản phẩm bị trùng!");
                        }
                }
                else
                {
                    thong_bao_html("Hình ảnh bị trùng tên!");
                }
            }
            else
            {
                thong_bao_html("Chưa chọn ảnh!");
            }
        }else
        {
            thong_bao_html("Tên sản phẩm chưa được điền vào!");
        }
    }
    else
    {
        thong_bao_html("Bạn không có quyền thêm sản phẩm!");
    }
?>