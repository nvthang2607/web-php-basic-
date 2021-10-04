<?php
    //các hàm để chuyển trnag và hiển thị thông báo để dùng cho dễ về sau
    //hàm quay lại trang trước
    function trang_truoc(){
            ?>
                <html><head>
                <meta charset="UTF-8">
                <title>Đang chuyển về trang trước</title></head>
                <body>
                    <script type="text/javascript">
                        window.history.back();
                    </script>   
                </body>
                </html>
            <?php
    }
    // thông báo rồi hiện ra 1 dòng cho phép quay lại trang trước đó
    function thong_bao_html($chuoi_thong_bao){
        $lien_ket_trang_truoc=$_SERVER['HTTP_REFERER'];
        ?>
            <html><head>
            <meta charset="UTF-8">
            <title>Thông báo</title></head>
            <body>
                <style type="text/css">
                a.trang_truoc_c8w{
                    text-decoration:none;
                    background-color: yellowgreen;
                    color:black;
                    font-size:36px;
                    margin-left:50px
                    border: 3px solid yellowgreen;
                }
                a.trang_truoc_c8w:hover{
                    background-color: blue;
                    color:red;
                    border: 4px solid blue;
                }
                </style>
                <br><br><br><br>
                <a href="<?php echo $lien_ket_trang_truoc; ?>" class="trang_truoc_c8w" >
                    Bấm vào đây để trở về trang trước
                </a>
                <script type="text/javascript">
                    alert("<?php echo $chuoi_thong_bao; ?>");
                </script>
            </body>
            </html>
        <?php
        exit();
    }
    // thông báo rồi hiện ra 1 dòng cho phép quay lại trang chỉ định
    function thong_bao_html_roi_chuyen_trang($chuoi_thong_bao,$link_chuyen_trang){
        $lien_ket_trang_truoc=$_SERVER['HTTP_REFERER'];
        ?>
            <html><head>
            <meta charset="UTF-8">
            <title>Thông báo</title></head>
            <body>
                <script type="text/javascript">
                    alert("<?php echo $chuoi_thong_bao; ?>");
                    window.location="<?php echo $link_chuyen_trang; ?>";
                </script>
            </body>
            </html>
        <?php
        exit();
    }
?>