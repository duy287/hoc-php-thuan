<!--
    LỚP TRỪ TƯỢNG ABSTRACT CLASS
[1] ĐỊNH NGHĨA
Abstract một loại class đặt trưng cho tính trừu tượng của hướng đối tượng.
- Các đặc điểm của nó:
+ Trong Absctract class có thể chứa các phương thức trừu tượng (abstract method) và các phương thức thông thường khác
    + Phương thức trừu tượng là phương thức chỉ được khai báo và không có phần cài đặt bên trong.
    + Các phương thức thông thường vẫn viết như bình thường (kể cả contructor)
+ Các thuộc tính trong abstract class thì không được khai báo là abstract (mà chỉ được khai báo như một thuộc tính thông thường).
+ abstract class không thể khởi tạo được đối tượng. 
    Vì không thể khởi tạo được đối tượng nên các phương thức chỉ được khai báo ở mức độ protected và public.
+ Các lớp kế thừa từ một abstract class phải định nghĩa lại tất cả các phương thức trừu tượng trong abstract class đó
 ( nếu không sẽ bị lỗi).

[2] PHƯƠNG THỨC TRỪU TƯỢNG (ABSTRACT METHOD)
+ Tất cả các phương thức trừu tượng phải ở mức protected hoặc public (hoặc có thể bỏ trống - bỏ trống thì là public)
+ không được viết code bên trong phương thức trừu tượng.
+ Khi định nghĩa lại (override) phương thức trừu tượng thì chú ý đến mức độ truy cập của nó 
(phương thức có mức độ truy cập nào thì khi định nghĩa lại phải để ở mức truy cập đó).

[3] CÚ PHÁP
abstract class Person
{
    //thuộc tính
    protected $tenSV;

    //khai báo phương thức trừu tượng
    abstract public function TinhDiem(); 

    //các phương thức thông thường khác
    protected function getInfo(){
        ...
    }
}
//Class Kế thừa từ Abstract class trên
class SinhVien extends Person
{
    //định nghĩa lại phương thức trừu tượng khi kế thừa
    public function TinhDiem(){
  		echo '10 điểm';
    }
}

[*] chú ý cho mình phần này vì sau này chúng ta sẽ phải sử dụng rất nhiều đến nó khi xây dựng các design pattern.
-->

<?php
abstract class Person
{
    private $lastName; //họ
    private $firstName; //tên
    
    public function setLastName($ln){
        $this->lastName = $ln;
    }
    public function getLastName(){
        return $this->lastName;
    }
    
    public function setFirstName($fn){
        $this->firstName = $fn;
    }
    public function getFirstName(){
        return $this->firstName;
    }

    //abstract method
    abstract public function introduceSelf();
}

class Employee extends Person
{
    private $role; //chức vụ
    
    public function setRole($r){
        $this->role = $r; 
    }
    
    public function getRole(){
        return $this->role;
    }
    
    //định nghĩa lại phương thức trừu tượng
    public function introduceSelf() //giới thiệu
    {
        echo $this->getRole() .":". $this->getLastName() ." ". $this->getFirstName()."<br>";
    }
}

$nhanvien = new Employee();
$nhanvien -> setLastName('Nguyễn Văn');
$nhanvien -> setFirstName('An');
$nhanvien -> setRole('Nhân viên');

$nhanvien ->introduceSelf();
?>
