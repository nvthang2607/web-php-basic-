
<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    $sql="SELECT * from quangcao where ViTri='phai' ";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $noi_dung=$row['HTML'];

    $kydanh=$_SESSION['ky_danh'];
    $sql="SELECT ChucVu from nhanvien where HoTenNV='$kydanh';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);


    if($row['ChucVu']!='quanly'&& $row['ChucVu']!='admin'){
        thong_bao_html("Bạn không có quyền với chức năng này!");
    }
?>
<form action="" method="post" enctype="multipart/form-data" >
    <table width="990px" >
        <tr>
            <td><b style="color:blue;font-size:20px" >Sửa quảng cáo phải</b></td>
        </tr>

        <tr>
            <td align="center" >
                <br>
                <script type="text/javascript">
                  tinymce.init({
                    selector: '#noi_dung',
                    theme: 'modern',
                    width: 980,
                    height: 200,
                    plugins: [
                      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                      'save table contextmenu directionality emoticons template paste textcolor jbimages'
                    ],
                    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons jbimages',
                    relative_urls: false
                  });
                 
                  </script>
                  <textarea id="noi_dung" name="noi_dung" ><?php echo $noi_dung; ?></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <br>
                <input type="submit" name="bieu_mau_sua_quang_cao_phai" value="Sửa quảng cáo" style="width:200px;height:50px;font-size:24px" >
            </td>
        </tr>
    </table>
</form>