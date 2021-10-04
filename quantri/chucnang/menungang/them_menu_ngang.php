<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<form action="" method="post">
    <table width="990px" >
        <tr>
            <td colspan="2" ><b style="color:blue;font-size:20px" >Thêm menu ngang</b><br><br> </td>
           
        </tr>
        <tr>
            <td width="150px" >Tên : </td>
            <td width="840px">
                <!--khung nhập tên:-->
                <input style="width:400px;margin-top:3px;margin-bottom:3px;" name="ten" value="" >
            </td>
        </tr>
        <tr>
            <td>Loại menu : </td>
            <td>
                <?php
                //2 biến $a_1 và $a_2 là nhằm xác định loại menu nào được chọn trước
                    $a_1="";
                    $a_2="";
                    //nếu có loại menu:
                    if(isset($_SESSION['loai_menu_wr8']))
                    {//xét tiếp nếu loại menu = "san_pham"
                        if($_SESSION['loai_menu_wr8']=="san_pham")
                        {//thì biến $a_2 được chọn để  xuất vào loại menu là sp
                            $a_2="selected";
                        }//còn biến $a_1 ược chọn để  xuất vào loại menu bình thường 
                    }
                ?>
                <!--xuất hộp tùy chọn select với name là 'loai_menu' -->
                <select name="loai_menu" style="margin-top:3px;margin-bottom:3px;" >
                    <!-- cho $a_1 vào menu bình tường-->
                    <option value="" <?php echo $a_1; ?> >Bình thường</option>
                    <!-- cho $a_ư vào menu sản phẩm-->
                    <option value="san_pham" <?php echo $a_2; ?> >Sản phẩm</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nội dung : </td>
            <td>
                <script type="text/javascript">
                  tinymce.init({
                    selector: '#noi_dung',
                    theme: 'modern',
                    width: 800,
                    height: 300,
                    plugins: [// các plugin được thêm vào khung nhập liệu tinymce này , để ý có plugin jbimages (dùng để tải ảnh)
                      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                      'save table contextmenu directionality emoticons template paste textcolor jbimages'
                    ],
                    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons jbimages',
                     // hiển thị các thành phần của khung nhập liệu tinymce , để ý sẽ thấy có jbimages
                    relative_urls: false
                  });
                 
                  </script>
                   <!--đây là khung nhập liệu tinymce-->
                  <textarea id="noi_dung" name="noi_dung" ></textarea>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <br>
                <!--tạo nút gửi biểu mẫu thêm menu ngang với name là 'bieu_mau_them_menu_ngang'
                // trong file 'xu_ly_post_get.php' sẽ dùng phần name này-->
                <input type="submit" name="bieu_mau_them_menu_ngang" value="Thêm menu" style="width:200px;height:50px;font-size:24px" >
            </td>
        </tr>
    </table>
</form>