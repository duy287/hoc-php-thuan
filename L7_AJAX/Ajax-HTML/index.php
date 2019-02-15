<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <?php 
    include_once '../DBConnect.php';
    $db= new DBConnect();
    $sql = "SELECT * FROM loaisp";
    $loaisp = $db->selectMoreRow($sql);
    ?>

    <ul class="check-box-list">
        <?php foreach($loaisp as $loai): ?>
        <li>
            <input type="checkbox" id="type-<?=$loai->id?>" data-id="<?=$loai->id?>">
            <label for="type-<?=$loai->id?>">
                <?=$loai->tenloaisp?>
            </label>
        </li>
        <?php endforeach ?>
    </ul>

    <div class="result-list">
        Bạn chưa chọn loại sản phẩm
    </div>

    <script>
        $(document).ready(function(){
            //lấy content cũ
            var oldContent = $('.result-list').html();

            //xử lý click checkbox
            $("input[type=checkbox]").click(function(){
                var idType = $(this).attr('data-id');
                if($(this).prop('checked')==true){ //prop <==> attr
                    $.ajax({
                        url:'xuly-ajax.php',
                        type:'POST',
                        data:{
                            idType: idType
                        },
                        // dataType: 'text',
                        success: function(response){
                            if($('.result-list').hasClass('the-first')){ //class the-first đánh dâu cho việc click lần đầu tiên
                                $('.result-list').append(response); //giữ html cũ và chỉ thêm vào cuối phần tử
                            }
                            else{
                                $('.result-list').addClass('the-first'); //đánh dấu đây là lần đầu click vào checkbox
                                $('.result-list').html(response); //replace toàn bộ html
                            }
                        },
                        error: function(error){
                            console.log(error);
                        }
                    });
                }else //nếu uncheck
                {
                    $('.type-'+ idType).remove(); //remove tất cả sp của loại đó
                    if($('.result-list').find('li').length==0){ //nếu tất cả đều bị uncheck
                        $('.result-list').html(oldContent); //hiển thị lại nội dung cũ
                        $('.result-list').removeClass('the-first'); //đưa về trạng thái ban đầu
                    }
                }
            })
        })
    </script>

    <!--
    Ý tưởng xử lý:
    - Khi click lần đầu tiên => toàn bộ nội dung cũ mất hết và thay bằng nội dung mới 
    - Khi click các lần tiếp theo => nội dung lần trước sẽ đc giữ lại và chỉ thêm nội dung mới 
    ** Việc này giống như chức năng Filter của các web bán hàng thường áp dụng để lọc các sp cần quan tâm.
    -->
</body>
</html>

