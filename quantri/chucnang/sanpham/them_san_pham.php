<?php
    //truy cập trực tiếp mà không qua đăng nhập thì không được
    if(!isset($bien_bao_mat)){exit();}
?><!--lưu ý là có viết enctype="multipart/form-data" , cách viết này cho phép biểu mẫu tải hình ảnh lên-->
<form action="" method="post" enctype="multipart/form-data" >
    <table width="990px" >
        <tr>
        <!-- xuất tiêu đề màu xanh và kích cỡ chữ 20px-->   
            <td colspan="2" ><b style="color:blue;font-size:20px" >Thêm sản phẩm</b><br><br> </td>
           
        </tr>
        <!--ô nhập tên sp cần thêm vào-->
        <tr>
            <td width="150px" >Tên : </td>
            <td width="840px">
                <input style="width:400px;margin-top:3px;margin-bottom:3px;" name="ten" value="" >
            </td>
        </tr>
        <tr>
            <td width="150px" >Mã hàng hóa : </td>
            <td width="840px">
                <input style="width:400px;margin-top:3px;margin-bottom:3px;" name="mahanghoa" value="" >
            </td>
        </tr>
        <!-- in ra option các danh mục menu đã tạo để chọn thêm sp vào-->
        <tr>
            <td>Danh mục : </td>
            <td>
                <?php
                    //
                    if(!isset($_SESSION['danh_muc_menu']))
                    {// vì muốn sau khi thêm sản phẩm thì web sẽ giữ lại phần danh mục menu được chọn trước đó nên tạo ra biến session này
                        // biến session 'danh_muc_menu' sẽ lưu giá trị của danh mục menu được chọn sau khi thêm sản phẩm
                        $_SESSION['danh_muc_menu']="";
                    }
                ?>
                <select name="danh_muc" style="margin-top:3px;margin-bottom:3px;" >
                
                    <?php
                    // chọn các menu trong bảng 'menu_doc' để xuất vào thẻ 'select'
                        $sql="SELECT * from nhomhanghoa order by MaNhom ";
                        $result=mysqli_query($conn,$sql);
                        // khi xảy ra trùng khớp thì sẽ cho biến $a có giá trị là 'selected' rồi xuất vào thẻ 'option'
                        // thẻ 'option' nào có 'selected' thì sẽ được chọn và hiển thị ra trước
                        $a="";
                        while($row=mysqli_fetch_array($result))
                        {   //xuất ra tên của menu
                            $ten=$row['TenNhom'];
                            $id_menu=$row['MaNhom'];
                            if($_SESSION['danh_muc_menu']==$id_menu)
                            {
                                $a="selected";
                            }
                            echo "<option value='$id_menu' $a >";
                                echo $ten;
                            echo "</option>";
                            $a="";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <!--cho phép tải hình ảnh lên-->
        <tr>
            <td >Hình ảnh : </td>
            <td>
            <!-- xuất hộp chọn tải ảnh , hộp chọn tải ảnh sẽ có type là file-->
                <input type="file" name="hinh_anh" >
            </td>
        </tr>
        <!--ô cho phép nhập giá-->
        <tr>
            <td>Giá : </td>
            <td>
                <input style="width:400px;margin-top:3px;margin-bottom:3px;" name="gia" value="" >
            </td>
        </tr>
        <!--ô cho phép nhập số lượng sp-->
        <tr>
            <td>Số lượng: </td>
            <td>
                <input style="width:400px;margin-top:3px;margin-bottom:3px;" name="soluong" value="" >
            </td>
        </tr>
        <!--thuộc tính trang chủ "Có" hoặc "Không" để xác định sản phẩm được thêm vào ở trên có được hiện ra ở trang chủ hay không-->
        <tr>
            <td>Trang chủ : </td>
            <td>
                <?php
                    $a_1="";
                    $a_2="";
                    if(isset($_SESSION['tuy_chon_trang_chu']))
                    {
                        if($_SESSION['tuy_chon_trang_chu']=="co")
                        {
                            $a_2="selected";
                        }
                    }
                ?>
                <select name="trang_chu" style="margin-top:3px;margin-bottom:3px;" >
                <!--cho biến $a_1 vào tùy chọn 'Không'-->
                    <option value="" <?php echo $a_1; ?> >Không</option>
                <!-- cho biến $a_2 vào tùy chọn 'Có'-->
                    <option value="co" <?php echo $a_2; ?> >Có</option>
                </select>
            </td>
        </tr>
        <!--cũng có 2 giá trị Có hay Không nhưng để xác định sp có được hiện ra ở cột nổi bật bên trái trang hay không-->
        <tr>
            <td>Nổi bật : </td>
            <td>
                <?php
                    $a_1="";
                    $a_2="";
                    //nếu có tùy chọn thì
                    if(isset($_SESSION['tuy_chon_noi_bat']))
                    {//xét xem tùy chọn là CÓ hay KHÔng
                        if($_SESSION['tuy_chon_noi_bat']=="co")
                        {//nếu là có thì $a_2 được đặt là có ở trên được chọn
                            $a_2="selected";
                        }
                    }
                ?>
                <select name="noi_bat" style="margin-top:3px;margin-bottom:3px;" >
                <!-- Ô hiện ra 2 tùy chon để mình chọn-->
                    <option value="" <?php echo $a_1; ?> >Không</option>
                    <option value="co" <?php echo $a_2; ?> >Có</option>
                </select>
            </td>
        </tr>
        <!--Ô nhaạp nội dung sản phẩm -->
        <tr>
            <td valign="top" >Nội dung : </td>
            <td>
                <script type="text/javascript">
                  tinymce.init({
                    selector: '#noi_dung',
                    theme: 'modern',
                    width: 800,
                    height: 400,
                    plugins: [
                      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                      'save table contextmenu directionality emoticons template paste textcolor jbimages'
                    ],
                    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons jbimages',
                    relative_urls: false
                  });
                 
                  </script>
                  <textarea id="noi_dung" name="noi_dung" ></textarea>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <br>
                <input type="submit" name="bieu_mau_them_san_pham" value="Thêm sản phẩm" style="width:200px;height:50px;font-size:24px" >
            </td>
        </tr>
    </table>
</form>