<!--
    STATIC VÀ FINAL TRONG HƯỚNG ĐỐI TƯỢNG
[1] STATIC
- Như ta đã biết, các đối tượng cùng được khởi tạo từ một lớp, thì khi thao tác trên đối tượng này sẽ không ảnh hưởng
đến đối tượng kia
    Nhưng trong thực tế, đôi lúc ta muốn bất kỳ thao tác nào đều được lưu lại trên mọi đối tượng của lớp đó (dạng toàn cục) 
thì kiểu dữ liệu tĩnh giúp chúng ta giải quyết vấn đề này.
Dữ liệu tĩnh giống như một biến toàn cục của một lớp, chỉ cần một đối tượng trong lớp đó thay đổi thì tất cả các đối tượng còn lại của lớp đó cũng thay đổi theo.

- Cách khai báo: 
//phuộc tính dạng static
protected static $Tên_biến = 'xyz'; 
// phương thức dạng static
public static function Ham1($tmp){
    ...
}

- Cách gọi thành phần static
    + Gọi bên trong lớp
    Khi bạn khai báo một thuộc tính hay một phương thức ở dạng static thì bạn sẽ không thể gọi bằng cách thông thường
    là dùng từ khóa this được nữa mà sẽ có các cách gọi khác như sau:
        Cách 1: selft::tenthuoctinh - selft::tenphuongthuc()
        Cách 2: TenLop::tenthuoctinh - TenLop::tenphuongthuc() //thường dùng

    + Gọi bên ngoài lớp
        TenLop::tenPhuongThuc()
        TenLop::$tenthuoctinh;
    ==>tóm lại: để gọi thành phần tĩnh thì nên gọi thông qua tên lớp (kể cả bên trong và bên ngoài lớp).

- Nhược điểm của static
Như ở trên mình có nói static nó hoạt động như một biến toàn cục và cũng vì điều này mà khi sử dụng static
trong chương trình thì nó sẽ chiếm nhiều tài nguyên hơn các thành phần thường.

- Chú ý: Một phương thức non-static mới gọi được phương thức hoặc thuộc tính static (điều ngược lại là không đúng).

[2] FINAL
- Final Class
Lớp Final là lớp được khai báo là lớp cuối cùng, tức là không cho một lớp nào có thể kế thừa nó.
    final class ConNguoi
    {
        //...
    }
    //Sai vì không thể kế thừa final class
    class NguoiLon extends ConNguoi
    {
        //
    }
- Final Method
Hàm Final chỉ được phép sử dụng, không được định nghĩa lại (override)ở lớp khác.
    class ClassName
    {
        final public function methodName()
        {
            //...
        }
    }
-->
<h4>------------- STATIC -------------</h4>
<?php 
class ConNguoi
{
    public static $name = 'Vũ Thanh Tài';

    public static function getName()
    {
        //gọi thuộc tính tĩnh
        return self::$name;
        //hoặc
        //return ConNguoi::$name;
    }

    public static function showAll()
    {
        //gọi phương thức tĩnh
        return self::getName();
        //hoặc 
        //return ConNguoi::getName();
    }
}
//gọi thuộc tính tĩnh
echo ConNguoi::$name."<br>";

//gọi phương thức tĩnh
ConNguoi::showAll();
//hoặc
$connguoi = new ConNguoi();
echo $connguoi->showAll();
?>