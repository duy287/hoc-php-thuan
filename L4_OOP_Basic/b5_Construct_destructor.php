<!--
    PHƯƠNG THỨC KHỞI TẠO VÀ PHƯƠNG THỨC HUỶ
[1] PHƯƠNG THỨC KHỞI TẠO
- Phương thức khởi tạo là một phương thức mà khi chúng ta khởi tạo một đối tượng thì nó tự động được gọi kèm theo.
Phương thức khởi tạo cũng sử dụng được đầy đủ chức năng của các phương thức bình thường khác và trong một class có thể có hoặc không có phương thức khởi tạo.

- Trong PHP có hỗ trợ 2 cách khai báo phương thức khởi tạo:
Cách 1: Khai báo trùng với tên của class (PHP version > 7x không hỗ trợ nữa).
Cách 2: Khai báo phương thức có tên  __construct()
    class Food
    {
        public function __construct(){
            ...
        }
    }

[2] PHƯƠNG THỨC HUỶ
-Phương thức hủy sẽ tự động được gọi khi class đó được hủy (khi đối tượng của class đó không còn sử dụng nữa).
Nó thường dùng để giải phóng tài nguyên của một class và trong một class có thể có hoặc không có phương thức hủy.

-Để khai báo phương thức hủy trong class thì chúng ta chỉ cần khai báo phương thức có tên là __destruct().
    class Food
    {
        public function __destruct(){
            ...
        }
    }

[3] PHƯƠNG THỨC KHỞI TẠO VÀ PHƯƠNG THỨC HUỶ TRONG KẾ THỪA
Nếu lớp Con có hàm khởi tạo/huỷ thì được ưu tiên chạy hàm khởi tạo/huỷ của lớp con, 
còn nếu lớp Con không có thì sẽ chạy hàm khởi tạo/huỷ của lớp Cha, còn nếu cả 2 đều không có thì sẽ không chạy hàm mặc định.
T/H 1: Cả lớp A và B đều có hàm khởi tạo
    class A {
        function __construct() {
            echo 'Lớp A được khởi tạo';
        }
    }  
    class B extends A {
        function __construct() {
            echo 'Lớp B được khởi tạo';
        }
    }
    $b = new B(); // Kết quả: Lớp B được khởi tạo

T/H 2: class Con không có hàm khởi tạo
    class A {
        function __construct() {
            echo 'Lớp A được khởi tạo';
        }
    }  
    class B extends A {
        ...
    }
    $b = new B(); // Kết quả: Lớp A được khởi tạo;

[*] Nhận xét:
Trong thực tế thì phương thức khởi tạo sẽ được sử dụng rất nhiều còn phương thức hủy thì hầu như không sử dụng đến
nhưng các bạn cũng nên biết để khi đi phỏng vấn người ta có hỏi thì còn biết mà trả lời.
-->

<!--Nên đóng mở từng mục bên dưới để thấy kết quả đúng-->
<h4>---------- PHƯƠNG THỨC KHỞI TẠO/HUỶ TRONG KẾ THỪA --------- </h4>
<?php

class Bar
{
    public function __construct(){
        echo 'Class Bar được khởi tạo <br>';
    }

    public function __destruct(){
        echo 'Class Bar được hủy <br>';
    }
}

class Foo extends Bar
{
    public function __construct(){
        echo 'Class Foo được khởi tạo <br>';
    }

    public function __destruct(){
        echo 'Class Foo được hủy <br>';
    }
}

$foo = new Foo();
//Kết quả: Class Foo được khởi tạo
//kết quả: Class Foo được hủy
?>

<h4>---------- GỌI PHƯƠNG THỨC KHƠI TẠO/HUỶ TRONG LỚP CON ----------</h4>
<?php

class ParentClass
{
    public function __construct(){
        echo 'Class Parent được khởi tạo <br>';
    }

    public function __destruct(){
        echo 'Class Parent được hủy <br>';
    }
}

class ChildrenClass extends ParentClass
{
    public function __construct(){
        //gọi phương thức khởi tạo của class cha
        parent::__construct();
        echo 'Class Children được khởi tạo <br>';
    }

    public function __destruct(){
        //gọi phương thức hủy của class cha
        parent::__destruct();
        echo 'Class Children được hủy <br>';
    }
}

$child = new ChildrenClass();
// Kết quả:
// Class Parent được khởi tạo 
// Class Children được khởi tạo 
// Class Parent được hủy 
// Class Children được hủy 

?>