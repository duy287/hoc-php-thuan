<!--
    SƠ LƯỢC VỀ JSON
Các dạng Json thường gặp
- Dạng Basic
    [
        {'id': 1, 'name':'Ronaldo'},
        {'id': 2, 'name':'Messi'},
        {'id': 3, 'name':'Son Houng Min'}
    ];
- Dạng Advance
    {
        "sv001" : { "hoten" : "Messi",   "address" : "Agentina"},
        "sv002" : { "hoten" : "Ronaldo", "address" : "Potugal"},
        "sv003" : { "hoten" : "Muiler",  "address" : "Gemany"}
    }
- JSON thực chất là Một mảng các đối tượng (đối với dạng Bassic), Các đối tượng trong JSON giống nhau ở các thuộc tính.
- PHP không có khả năng xử lý với JSON mà chỉ có thể tạo ra một chuỗi có định dạng JSON với hàm:
    $tmp = json_encode($arr)
- Việc nhận dạng và xử lý JSON do JavaScript đảm nhận
    $json = JSON.parse("<?=$tmp?>");
+ lúc này ta hoàn toàn có thể truy cập và sử dụng nó
    aler(json[0].name)
-->
<?php
    $danhsach= [
        ['id'=> 1, 'name'=>'Ronaldo'],
        ['id'=> 2, 'name'=>'Messi'],
        ['id'=> 3, 'name'=>'Son Houng Min']
    ];
    $danhsach_Encode = json_encode($danhsach); //ép kiểu array -->string dạng json (chứ ko phải json)
    echo $danhsach_Encode;
    /*
    [{"id":1,"name":"Ronaldo"}, {"id":2,"name":"Messi"}, {"id":3,"name":"Son Houng Min"}]
    */
?>

<script>
    //mảng đối tượng (dạng JSON)
    var Students =[
        {'id': 1, 'name':'Ronaldo'},
        {'id': 2, 'name':'Messi'},
        {'id': 3, 'name':'Son Houng Min'}
    ];

    //Xuất ra thông tin HS có id=2
    console.log("ID:" + Students[1].id + " Name:" + Students[1].name);

    //Xuất ra thông tin tất cả các Học sinh
    for(i in Students){
        console.log("ID:" + Students[i].id + " Name:" + Students[i].name);
    }

    //TRAO ĐỔI DỮ LIỆU GIỮ PHP VÀ JAVASCRIPT THÔNG QUA JSON
    var str='<?php echo $danhsach_Encode;?>'; //tại dòng này nếu không có dấu nháy đơn thì sẽ ra kết quả đúng
    alert( typeof(str) );//string
    console.log(str[0].name); //undefined do một string không thể truy xuất như thế này đc

    var myObject= JSON.parse(str); //chuyển một chuỗi dạng JSON thành JSON
    alert( typeof(myObject) );//object
    console.log(myObject[0].name);//Ronaldo

    /*
        Lưu ý: Hàm JSON.parse() có thể không thực thi được đối với một số trình duyệt phiên bản cũ, do đó ta cần download 
        file json2.js từ trang http://json.org về và nhúng vào file này.
    */
</script>