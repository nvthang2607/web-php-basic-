
<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    $lien_ket=trim($_POST['lien_ket']);
    $ten_file_anh=$_FILES['hinh_anh']['name'];

    if($ten_file_anh!="")
    {   //kiểm tra có ảnh trong slideshow chưa
        $sql="SELECT count(*) from slideshow where Hinh='$ten_file_anh' ";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
        //nếu chưa thì mới cho thêm
        if($row[0]==0)
        {
            $sql="INSERT INTO slideshow (Hinh,LK)VALUES ('$ten_file_anh','$lien_ket');";
            $result=mysqli_query($conn,$sql);

            $duong_dan_anh="../hinhanh/slideshow/".$ten_file_anh;
            move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$duong_dan_anh);
        }
        else
        {
            thong_bao_html("Hình ảnh bị trùng tên");
        }
    }
    else
    {
        thong_bao_html("Chưa chọn ảnh");
    }

?>