<style type="text/css" >
    /*định nghĩa chiều rộng , chiều cao của hình ảnh slideshow,địa chỉ slideshow được chỉ định là thẻ div
    có class tên là 'slideshow'*/
    div.slideshow img {
        width:400px;
        height:400px;
    }
    jquery-3.5.1.min.js
</style>
<center>
<div class="slideshow" id="slideshow" >
    <?php
        $sql="SELECT Hinh,LK from slideshow order by ID";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result))
        {
            $link_hinh="hinhanh/slideshow/".$row['Hinh'];
            echo "<a href='".$row['LK']."'>";
                echo "<img src='".$link_hinh."'>";
            echo "</a>";
        }
        
    ?>
</div>
</center>
<script type="text/javascript" >
    /*Khai báo biến i_img , biến này có tác dụng khai báo vị trí của ảnh mỗi khi chuyển ảnh*/
    var i_img=0;
    //truy cập đến  slideshow thông qua div có id là 'slideshow',Lệnh getElementById dùng để truy cập id  
    var div_slideshow=document.getElementById("slideshow");
    //Truy cập vào hình ảnh trong slideshow thong qua lệnh getElementsByTagName 
    var img_slideshow=div_slideshow.getElementsByTagName("img");
    //chạy qua hết các hình
    for(var i=0;i<img_slideshow.length;i++)
    {   // không hiển thị hình ảnh thông qua lệnh style.display="none"; 
        img_slideshow[i].style.display="none";
    }// hiển thị hình ảnh đầu tiên (đặt thành giá trị block )
    img_slideshow[0].style.display="block";
    //cứ sau 1 khoảng thời gian là 5 giây (để ý số 5000 ở phía dưới)  sẽ hiển thị từng ảnh
    setInterval(function(){
        // không hiển thị hình ảnh hiện tại, biến i_img sẽ có giá trị là vị trí của hình ảnh hiện tại
        img_slideshow[i_img].style.display="none";
        // tăng vị trí hình ảnh lên 1 (nghĩa là đến hình kế tiếp)  
        i_img=i_img+1;
        //nếu chạy hết hình thì quay lại hình đầu (i_img=0)
        if(i_img>=img_slideshow.length){i_img=0;}
        //hiển thị hình ảnh kế tiếp ra
        img_slideshow[i_img].style.display="block";      
    },5000);
</script>