<!--
    Source:      https://github.com/huongnguyen08/php2509
    Giao trình:  https://github.com/huongnguyen08/php2
-->
<h4>---------------- ARRAY --------------</h4>
<?php
/*
    //tạo mảng
    //cách 1:
    $arr1=[1,2,3,"aaa", "hello"];
    //cách 2
    $arr2=array(1,2,3,"aaa",true);

    //in mang
    $arr = ['key1'=> 1, 'key2'=>'aaa', 'key3'=>'khoapham',$arr1];
    print_r($arr);

    echo $arr[0][4];  //truy xuất phần tử trong mảng đa cấp

    //gep chuoi
    $arr3 =['aaa','bbb','ccc'];
    echo implode(" ",$arr3);

    in_array(value, $arr); //kiểm tra phần tử value có trong mảng hay không (yes/no)
*/
?>

<h4>------------- Time ------------</h4>
<?php
/*
    // $time = time();
    // echo date('d/m/Y H:i:s', $time);

    //Trong database lưu trữ dạng: 2018-10-14 20:25:30 ->nhưng khi show ra: 14/10/2018 20:25:30
    $tg = strtotime('2018-10-14 20:25:30'); //chuyển chuỗi thời gian về dạng timestamp (string to time)
    echo date('d/m/Y H:i:s', $tg); //format lại theo ý
*/
?>

<h4>------------ Function -------------</h4>
<?php
/*
    function inSo($min, $max){
        $result="";
        if($min<=$max){
            for($i= $min; $i<=$max; $i++)
                $result =$result. ' '.$i;
        }
        else{
            for($i= $min; $i>=$max; $i--)
                $result =$result. ' '.$i;
        }
        return $result;
    }
    echo inSo(1,10);
*/
?>

<h4>------------ NUMBER_FORMAT -------------</h4>
<?php
/*
    $a = 20000.06;
    echo number_format($a);  // 20,000 
    echo "<br>";
    echo number_format($a,1); 
    echo "<br>";
    echo number_format($a, 1, ',', '.');   //thay dấu , thành dấu . và ngược lại
*/
?>

<h4>------------ Quy định kiểu dữ liệu trả về của hàm (chỉ có ở php7) -------------</h4>
<!-- inddex3.php-->
<?php
    // function Myfunction(int $a, int $b, int $c): array 
    // {   
    //     return [$a, $b, $c] ; 
    // }
    // $data = Myfunction(1, 2, 3);
    // print_r($data);  
    

    // function Myfunction(int ... $a){
    //     return $a; //luôn trả về array
    // }
    // Myfunction(1,2,3,4,5); //truyền bao nhiên tham số cũng đc

?>

<h4>-------------- Bắt lỗi Try...catch --------------</h4>
<!--Index04.php-->

<h4>-------------- Upload 1 file --------------</h4>
<!-- upload.php -->
<?php
/*
    $file = $_FILES['avatar'];
    $tmpName = $file['tmp_name'];
    $name = $file['name'];
    move_uploaded_file($tmpName,"avatars/$name");

    //lấy đuôi file
    $ext = pathinfo($name, PATHINFO_EXTENSION);//ext = extension
    $ext = strtolower($ext); //đề phòng đuôi file dạng in PNG, JPG, GIF.
    $arrExt = ['png', 'jpg','gif'];
    if(in_array($ext, $arrExt)){
        echo "file upload là file hình";
    }
    
    //tạo tên mới cho file
    $newName = date('Y-m-d-H-i-s', time()).'-'.$name;
    //move_uploaded_file($tmpName,"avatars/$newName");

    //Kiểm tra file có tồn tại không.
    if(file_exists("avatar/$name")){
        echo "file chưa tồn tại";
    }
*/
?>

<h4>-------------- Upload multi file --------------</h4>
<form action="" method ="POST" enctype="multipart/form-data">
    <input type="file" name="avatar[]" multiple> <!--Tên file là một mảng-->
    <button>Upload</button>
</form>

<?php
/*
    $file= $_FILES['avatar']; //lúc này nó trả về một mảng
    
    print_r($file);
    echo "<br>";

    //--------- Upload file
    //cách 1
    $total = count($_FILES['avatar']['name']);
    for( $i=0 ; $i < $total ; $i++ ) {
        $tmpName= $_FILES['avatar']['tmp_name'][$i];
        $name = $_FILES['avatar']['name'][$i];
        //Upload the file 
        if(move_uploaded_file($tmpName, "uploads/$name")) {
            echo "thanh cong";
        }
    }


    //cách 2
    foreach($file['tmp_name'] as $key => $tmpName){
        $name = $file['name'][$key]; //$key =[0,1,2,...]
        move_uploaded_file($tmpName, "uploads/$name");
        echo "thanh cong";
    }

    //--------- Ràng buộc trước khi upload
    //Kiểm tra kích thước file upload
    foreach ($file['size'] as $key => $size){
        $name = $file[name][$key];
        if( $size >= 1024){
            echo "$name quá lớn, không đc upload";
            exit(); //chỉ cần 1 file quá kích thước thì dừng việc upload
        }
    }
    //kiểm tra loại file
    $arrExt = ['png','jpg', 'gif'];
    foreach ($file['name'] as $key => $name){
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        if(!in_array($ext, $arrExt)){
            echo "có file quá lớn, không đc upload";
            exit(); //chỉ cần 1 file quá kích thước thì dừng việc upload
        }
    }
    //Tiến hành upload
    foreach($file['tmp_name'] as $key => $tmpName){
        $name = $file['name'][$key]; //$key =[0,1,2,...]
        if(move_uploaded_file($tmpName, "uploads/$name")){
            echo "thanh cong";
        }
    }  
*/
?>
<h4>---------------- SESSION -----------------</h4>
<?php
/*
    //session sẽ lưu trên browser của bạn (có thể có ở server), khi ban tắt browser đi thì session sẽ bị xoá.
    //chức năng nhớ đăng nhập không phải là của session.
    //chức năng giỏ hàng sử dụng session

    session_start();
    $_SESSION['user']='admin'; 

    //delete 1 session
    unset($_SESSION['user']); 

    // Xoá tất cả các session
    session_destroy(); 
*/
?>

<h4>---------------- COOKIE -----------------</h4>
<?php
    //cookie chỉ lưu trên browser
    //cookie vẫn còn khi tắt trình duyệt, nó chỉ bị xoá khi hết thời gian sống của nó.
    //thường được sử dụng ở chức năng nhớ đăng nhập

    // setcookie(name, value, time)
    //Tham số 3: set 1 phút, nếu không set thời gian thì nó sẽ giống như session( nghĩa là khi thoát browser thì nó sẽ mất)
    setcookie('remember', 'on', time() + 60); 

    echo $_COOKIE['remember'];

    //xoá cookie
    unset( $_COOKIE['remember']);
    //hoặc
    setcookie('remember', '', time() - 60);
?>

