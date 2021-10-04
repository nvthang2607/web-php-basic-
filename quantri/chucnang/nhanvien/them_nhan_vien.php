
<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<form action="" method="post">
    <table width="990px" >
        <tr>
            <td colspan="2" ><b style="color:blue;font-size:20px" >Thêm nhân viên</b><br><br> </td>
           
        </tr>
        <tr>
            <td width="150px" >Mã số nhân viên: </td>
            <td width="840px">
                <!--thêm tên-->
                <input style="width:400px;margin-top:3px;margin-bottom:3px;" name="maso" value="" >
            </td>
        </tr>
        <tr>
            <td width="150px" >Tên nhân viên: </td>
            <td width="840px">
                <!--thêm tên-->
                <input style="width:400px;margin-top:3px;margin-bottom:3px;" name="ten" value="" >
            </td>
        </tr>
        <tr>
            <td width="150px" >Mật khẩu tài khoản nhân viên: </td>
            <td width="840px">
                <!--thêm tên-->
                <input type="password" style="width:400px;margin-top:3px;margin-bottom:3px;" name="pass" value="" >
            </td>
        </tr>
        <tr>
            <td width="150px" >Chức vụ: </td>
            <td width="840px">
                <!--thêm tên-->
                <input style="width:400px;margin-top:3px;margin-bottom:3px;" name="chuc_vu" value="" >
            </td>
        </tr>
        <tr>
            <td width="150px" >Địa chỉ: </td>
            <td width="840px">
                <!--thêm tên-->
                <input style="width:400px;margin-top:3px;margin-bottom:3px;" name="dia_chi" value="" >
            </td>
        </tr>
        <tr>
            <td width="150px" >Số điện thoại: </td>
            <td width="840px">
                <!--thêm tên-->
                <input style="width:400px;margin-top:3px;margin-bottom:3px;" name="sdt" value="" >
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <br>
                <input type="submit" name="bieu_mau_them_nhan_vien" value="Thêm nhân viên" style="width:200px;height:50px;font-size:24px" >
            </td>
        </tr>
    </table>
</form>