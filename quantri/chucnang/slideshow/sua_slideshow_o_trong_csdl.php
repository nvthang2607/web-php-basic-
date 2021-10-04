<?php
    if(!isset($bien_bao_mat)){exit();}
    //lấy id hình ảnh trên URL
    $id=$_GET['id'];
    //lấy dữ liệu nội dung là liên kết
    $lien_ket=trim($_POST['lien_ket']);
    //lấy tên file ảnh đưọc chọn
    $ten_file_anh_tai_len=$_FILES['hinh_anh']['name'];
    //nếu có ảnh tải lên
    if($ten_file_anh_tai_len!="")
    {//lấy tên
        $ten_file_anh=$ten_file_anh_tai_len;
    }
    else
    {//nếu không có thì lấy tên ảnh cũ
        $ten_file_anh=$_POST['ten_anh'];
    }
    $kiem_tra_anh="hop_le"; 
    //nếu có ảnh tải lên
    if($ten_file_anh_tai_len!="")
    {   //kiểm tra xem ảnh đã có trong slideshow chưa
        //lấy ra tất cả ảnh trong slideshow
        $sql="SELECT count(*) from slideshow where Hinh='$ten_file_anh' ";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
        // row[0]!=0 nghĩa là đã có ảnh
        if($row[0]!=0)
        {//in ra không hợp lệ
            $kiem_tra_anh="khong_hop_le";   
        }
    }
    //nếu kiểm tra thấy ok thì hợp lệ:
    if($kiem_tra_anh=="hop_le")
    {
        //hợp lệ thì xem nếu có ảnh mới thì:
        if($ten_file_anh_tai_len!="")
        {    //lấy đường dẫn để thêm ảnh mới tải lên
            $duong_dan_anh="../hinhanh/slideshow/".$ten_file_anh_tai_len;
            move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$duong_dan_anh);
            //lấy đường dẫn ảnh cũ để xóa
            $duong_dan_anh_cu="../hinhanh/slideshow/".$_POST['ten_anh'];
            unlink($duong_dan_anh_cu);
        }       

        $sql="UPDATE slideshow SET Hinh = '$ten_file_anh',LK = '$lien_ket' WHERE ID =$id;";
        $result=mysqli_query($conn,$sql);   
               

    }
    else
    {
        thong_bao_html("Hình ảnh bị trùng tên");
    }
?>