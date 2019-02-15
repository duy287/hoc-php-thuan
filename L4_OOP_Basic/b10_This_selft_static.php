<!--
    SO SÁNH GIỮA CÁC TỪ KHOÁ THIS, SELF
- Dựa vào bài 8 trong series này thì chúng ta cũng đã biết về self rồi, ở đây chúng ta tạm hiểu self dùng để gọi các thành phần tĩnh trong class.
- Còn $this thì từ đầu series đến giờ chúng ta cũng dùng rất là nhiều, có thể hiểm nôm na là $this
dùng để gọi các thành phần thường( không phải là tĩnh) trong class.
- Nhưng ở bài này chúng ta sẽ cùng nhau đi tìm hiểu về sự khác nhau sâu xa giữa 2 từ khóa này như: $this có gọi được phương thức,thuộc tính tĩnh không,
self có gọi được thuộc tính, phương thức thường không,...???
-->
<h4>----------- THIS VÀ SELF TRONG CLASS -----------</h4>
<?php
class ConNguoi
{
    public function getClass(){
        return 'Đây là class con người';
    }

    public function echoClass(){
        echo $this->getClass(); //hãy thay từ $this->getClass() THÀNH self::getClass(); để so sánh kết quả
    }
}

class NguoiLon extends ConNguoi
{
    public function getClass(){
        return 'Đây là class người lớn';
    }
}

$nguoilon = new NguoiLon();
$nguoilon->echoClass();
/*
    Nếu dùng $this thì kết quả là: Đây là class người lớn
    Nếu dùng $selft thì kết quả là: Đây là class con người
    ==> 2 điều sau:
        +  self hoàn toàn có thể gọi được phương thức bình thường.
        +  self sẽ gọi đến class khai báo nó, còn $this sẽ gọi đến đối tượng hiện tại.
    Ngoài ra còn 1 chú ý nữa là: $this không được dùng trong các phương thức tĩnh.
 */
?>

<!--
    SO SÁNH GIỮA SELF VÀ STATIC
- Nhìn chung thì cả self và static đều dùng để gọi các thành phần tĩnh trong class
- Tuy Nhiên: 
+ static nó có nguyên tắc gần giống $this, là đều truy xuất đến đối tượng hiện tại.
+ Còn self là truy xuất đến class khai báo nó.
-->    
<h4>------------- SO SELF VÀ STATIC TRONG CLASS</h4>
<?php 
    class Person
    {
        private static $name = 'ConNguoi';

        public static function getName(){
            echo self::$name;
            echo '<br>';
            echo static::$name;
        }
    }

    class Chidren extends Person
    {
        private static $name = 'TreEm'; //overide lại thuộc tính name
    }

    Chidren::getName(); //gọi thành phần tĩnh
    // Kết quả:
    // ConNguoi
    // Fatal error: Cannot access private property NguoiLon::$name

    /**
     * ĐỂ CHẠY ĐÚNG THÌ THAY QUYỀN TRUY CẬP CỦA THUỘC TÍNH NAME THÀNH PROTECTED
     */
?>