<?php
    if(!isset($bien_bao_mat)){exit();}
    for($i=1;$i<=10;$i++)
    {
        $ten_select="select_".$i;
        $ten_id="id_".$i;
        if(isset($_POST[$ten_id]))
        {
            $id=$_POST[$ten_id];
            $noi_bat=$_POST[$ten_select];
            $sql="UPDATE hanghoa set noi_bat='$noi_bat' where MSHH='$id';";
            $result=mysqli_query($conn,$sql);
        }
    }
?>