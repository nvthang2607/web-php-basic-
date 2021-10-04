
<?php
    if(!isset($bien_bao_mat)){exit();}
    for($i=1;$i<=10;$i++)
    {
        $ten_select="select_".$i;
        $ten_input="input_".$i;
        $ten_id="id_".$i;
        if(isset($_POST[$ten_id]))
        {
            $id=$_POST[$ten_id];
            $trang_chu=$_POST[$ten_select];
            $sap_xep_trang_chu=$_POST[$ten_input];
            $sql="UPDATE hanghoa set TrangChu='$trang_chu',SXTrangChu='$sap_xep_trang_chu' where MSHH='$id';";
            $result=mysqli_query($conn,$sql);
        }
    }
?>