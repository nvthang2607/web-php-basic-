<?php
    if(!isset($bien_bao_mat)){exit();}
    function thong_bao_abc($c)
    {
        $lien_ket_trang_truoc=$_SERVER['HTTP_REFERER'];
        ?>
            <html><head>
              <meta charset="UTF-8">
              <title>Thông báo</title></head>
            <body>
                <style type="text/css">
                a.trang_truoc_c8w{
                    text-decoration:none;
                    color:blue;
                    font-size:36px;
                    margin-left:50px}
                a.trang_truoc_c8w:hover{
                    color:red;
                }
                </style>
                <br><br><br><br>
                <a href="<?php echo $lien_ket_trang_truoc; ?>" class="trang_truoc_c8w" >
                    Bấm vào đây để trở về trang trước
                </a>
                <script type="text/javascript">
                    alert("<?php echo $c; ?>");
                </script>
            </body>
            </html>       
        <?php
        exit();
    }
    //hàm quay về trang trước
    function trang_truoc_abc()
    {
        ?>
            <html><head>
              <meta charset="UTF-8">
              <title>Đang chuyển về trang trước</title></head>
            <body>
                <script type="text/javascript">
                //dùng lệnh window.history.back trong javascript để quay trở về trang trước
                    window.history.back();
                </script>   
            </body>
            </html>
        <?php
    }
  //nếu được gửi thì có tồn tại biến $_POST['dang_nhap_quan_tri']  thì lấy dữ liệu  
    if(isset($_POST['dang_nhap_quan_tri']))
    {     // lấy thông tin tên người đăng nhập bằng cách viết $_POST['ky_danh']
        $ky_danh=$_POST['ky_danh'];
         // thay thế dấu ' và dấu " thành  rỗng trong ký danh vì nó sẽ làm câu truy vấn sai
        $ky_danh=str_replace("'","",$ky_danh);
        $ky_danh=str_replace('"',"",$ky_danh);
        //mã hóa mật khẩu
        $mat_khau=md5($_POST['mat_khau']);
        $mat_khau=md5($mat_khau);
       
        $sql="SELECT count(*) from admin where Ten='$ky_danh' and Pass='$mat_khau' ";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
        if($row[0]==1)
        {
            $_SESSION['ky_danh']=$ky_danh;
            $_SESSION['mat_khau']=$mat_khau;
        }
        else
        {
            thong_bao_abc("Thông tin nhập vào không đúng");
        }
        trang_truoc_abc();
    }
   
    if(isset($_SESSION['ky_danh']))
    {
        $ky_danh=$_SESSION['ky_danh'];
        $mat_khau=$_SESSION['mat_khau'];
        $sql="SELECT count(*) from admin where Ten='$ky_danh' and Pass='$mat_khau' ";
        $result=mysql_query($conn,$sql);
        $row=mysql_fetch_array($result);
        if(row[0]==1)
        {
            $xac_dinh_dang_nhap="co";
        }
    }
?> 