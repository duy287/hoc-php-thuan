<!--
    GIAO DIỆN INTERFACE
[1] KHÁI NIỆM
- Interface là một Template (khuôn mẫu), nó không phải là một lớp mà chỉ là một bề nhìn bên ngoài
mà nhìn vào đó ta có thể biết được tất cả các hàm của đối tượng implement nó.
- Để khai báo một Interface ta dùng từ khóa interface để thay cho từ khóa class.
Tất cả các hàm trong interface đểu ở dạng khai báo và không được định nghĩa (giống abstract method).

[2] CÁC TÍNH CHẤT
- Trong interface chúng ta chỉ được khai báo phương thức chứ không được định nghĩa chúng (interface không có các method thông thường).
- Trong interface chúng ta chỉ được khai báo hằng (const) và không thể khai báo biến.
- interface không thể khởi tạo đối tượng (vì nó không phải là một class).
- Một lớp khi implement interface thì phải định nghĩa lại tất cả các phương thức có trong interface đó.
- Một class có thể implement nhiều interface.
- Các interface có thể kế thừa lẫn nhau (dùng từ khoá extends)

[3] CÚ PHÁP
interface Tên_Interface1
{
    const HẰNG = 100;
    public function Ham1(); 
    public function Ham2();
}  
interface Tên_Interface2
{
    public function Ham3(); 
}  

// Lớp kế thừa từ các interface trên
class Tên_Lớp implements Tên_interface1,Tên_interface2
{    
    public function Ham1(){
        //code
    }
    public function Ham2(){
        //code
    }
    public function Ham3(){
        //code
    }
}

[*] Interface thường dùng hơn abstract trong việc tạo ra khuông mẫu.
-->

<!-- nên đóng mở tường mục để thấy kế quả -->
<h4>---------- CLASS KẾ THỪA NHIỀU INTERFACE -----------</h4>
<?php
interface VatNuoi
{
	public function HoatDong();
	public function ShowInfo();
}
interface GiaXuc
{
	public function ThucAn();
}

class ConTrau implements VatNuoi,GiaXuc
{
	public function HoatDong(){
		echo "Con trâu ăn cỏ<br/>";
	}
	public function ShowInfo(){
		echo "Đây là con trâu<br/>";
	}
	public function ThucAn(){
		echo "Thức ăn là Cỏ khô";
	}
}

//main 
$contrauvang = new ConTrau();
$contrauvang->HoatDong();
$contrauvang->ShowInfo();
$contrauvang->ThucAn();

?>

<h4>---------- INTERFACE KẾ THỪA LẪN NHAU ------------</h4>
<?php

interface DongVat
{
    public function getName();
}

interface ConTrau extends Dongvat
{
    public function checkSung();
}

class ConNghe implements ConTrau
{
    public $name;
    const SUNG = false;

    public function getName()
    {
        return $this->name;
    }

    public function checkSung()
    {
        return self::SUNG;
    }
}

$obj = new ConNghe();
$obj->name = "Con nghé";
echo $obj->getName()."<br>";

var_dump( $obj->checkSung() );
?>