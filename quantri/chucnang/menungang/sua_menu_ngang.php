<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    $id=$_GET['id'];
    $sql="SELECT * from menu_ngang where ID='$id' ";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $ten=$row['Ten'];
    $loai_menu=$row['Loai_menu'];
    $noi_dung=$row['Noi_Dung'];
     // tạo link đóng để quay về trang quản lý menu ngang
    $link_dong="?thamso=quan_ly_menu_ngang&trang=".$_GET['trang'];
?>
<form action="" method="post">
    <table width="990px" >
        <tr>
            <td width="180px" ><b style="color:blue;font-size:20px" >Sửa menu ngang</b><br><br> </td>
            <td width="810px" align="right" >
            <!-- khi bạn bấm vào liên kết 'Đóng' này thì web sẽ trở về trang quản lý menu ngang  --> 
                <a href="<?php echo $link_dong; ?>" class="lk_a1" style="margin-right:30px" >Đóng</a>
            </td>
        </tr>
        <tr>
            <td >Tên : </td>
            <td >
            <!--xuất khung nhập liệu tên -->
                <input style="width:400px;margin-top:3px;margin-bottom:3px;" name="ten" value="<?php echo $ten; ?>" >
            </td>
        </tr>
        <tr>
            <td>Loại menu : </td>
            <td>
                <?php
                //phần select option, xem menu là bình thường hay sản phẩm
                    //tạo 2 biến
                    $a_1="";
                    $a_2="";
                    //nếu loại menu chon là sản phẩm
                    if($loai_menu=="san_pham")
                    {// biến 2 đưuọc chọn
                        $a_2="selected";
                    }
                ?><!--Khung chọn 2 option-->
                <select name="loai_menu" style="margin-top:3px;margin-bottom:3px;" >
                    <option value="" <?php echo $a_1; ?> >Bình thường</option>
                    <option value="san_pham" <?php echo $a_2; ?> >Sản phẩm</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nội dung : </td>
            <td><!--Nhập nội dung menu-->
                <script type="text/javascript">
                  tinymce.init({
                    selector: '#noi_dung',
                    theme: 'modern',
                    width: 800,
                    height: 300,
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
            <td>&nbsp;</td>
            <td>
                <br>
                <input type="submit" name="bieu_mau_sua_menu_ngang" value="Sửa menu" style="width:200px;height:50px;font-size:24px" >
            </td>
        </tr>
    </table>
</form>