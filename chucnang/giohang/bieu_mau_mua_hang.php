<?php
    //khi ấn vào "thêm vào giỏ hàng" trong chi tiết sản phẩm thì sẽ hiện ra 
    //tác dụng để khách hàng nhập vào thông tin
    //lưu ý nếu số lượng sản phẩm cập nhật bằng 0 hoặc quá số lượng có trong dữ liệu thì sẽ không hiện
    //để tránh tình trạng nhập sai dữ liệu
    echo "<br>";
    echo "<br>";
    echo "<form method='post' action='' >";
        echo "<input type='hidden' name='thong_tin_khach_hang' value='co' > ";
        echo "<table>";
            echo "<tr>";
                echo "<td colspan='2' height='30px' >";
                    echo "<h2><b>Thông tin khách hàng</b></h2>";
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td height='40px' >Lưu ý : </td>";
                echo "<td>";
                    echo "Tên người mua , địa chỉ , điện thoại bắt buộc phải điền vào<br>";
                    echo "Kiểm tra lại thông tin đơn hàng, nếu chưa chính xác vui lòng ấn nút cập nhật, xin cảm ơn!";
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td width='180px' >Tên người mua :</td>";
                echo "<td>";
                    echo "<input type='text' style='width:400px' name='ten_nguoi_mua' >";
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>Địa chỉ : </td>";                  
                echo "<td>";
                    echo "<textarea style='width:400px;' name='dia_chi' ></textarea>";
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>Điện thoại : </td>";
                echo "<td>";
                    echo "<input type='text' style='width:400px' name='dien_thoai' >";
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>&nbsp;</td>";
                echo "<td>";
                    echo "<input type='submit' value='Mua hàng' >";
                echo "</td>";
            echo "</tr>";
        echo "</table>";
    echo "</form>";
?>