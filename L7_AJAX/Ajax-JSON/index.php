<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>AJAX-JSON</title>
</head>
<body>
<?php 
    include_once '../DBConnect.php';
    $db= new DBConnect();
    $sql = "SELECT * FROM sanpham";
    $products = $db->selectMoreRow($sql);
    ?>

    <ul class="check-box-list">
        <?php foreach($products as $item): ?>
        <li>
            <input type="checkbox" id="type-<?=$item->id?>" data-id="<?=$item->id?>">
            <label for="type-<?=$item->id?>">
                <?=$item->tensp?>
            </label>
        </li>
        <?php endforeach ?>
    </ul>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    Model content
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="https://google.com">
                        <button type="button" class="btn btn-primary">Save changes</button> 
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function(){
        $("input[type=checkbox]").click(function(){
            var id = $(this).attr('data-id');
            if($(this).prop('checked')==true){ 
                $.ajax({
                    url:'xuly-ajax.php',
                    type:'POST',
                    data:{
                        id: id
                    },
                    dataType: 'json',
                    success: function(response){
                        if(response.status==1){
                            console.log(response.data);
                            $('.modal-title').html(response.message); //title của modal
                            $('.modal-body').html(response.data.tensp + '<br>' + response.data.gia ); //content của modal
                            $('#myModal').modal('show'); //hiển thị modal
                        }
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            }
        })
    })
    </script>

</body>
</html>