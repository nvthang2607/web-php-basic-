<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<div style="width:990px;height:300px;text-align:left" >
<!--nếu ấn vào chữ menu ngang trong trang quản trị thì sẽ hiện ra 2 dòng, mỗi dòng có 1 chức năng-->
    <a href="?thamso=tat_ca_hoa_don" class="lk_c2" >1.Xem tất cả hóa đơn</a><br>
    <a href="?thamso=hoa_don_dang_cho" class="lk_c2" >2.Xem hóa đơn đang chờ duyệt</a><br>
    <a href="?thamso=hoa_don_da_duyet" class="lk_c2" >3.Xem hóa đơn đang chờ hoàn thành</a><br>
    <a href="?thamso=hoa_don_hoan_thanh" class="lk_c2">4.Xem hóa đơn thành công</a><br>
</div>