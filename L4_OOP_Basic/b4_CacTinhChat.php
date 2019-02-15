<!--
    CÁC TÍNH CHẤT TRONG LẬP TRÌNH HƯỚNG ĐỐI TƯỢNG
[1] Tính trừu tượng (Abstraction)
    Trừu tượng hóa là chúng ta xác định những phương thức và thuộc tính nào cần thiết cho chương trình,
    từ đó loại bỏ đi những thứ không cần thiết. Quá trình trừu tượng hóa sẽ giảm bớt không gian lưu trữ,
    tối ưu hóa CSDL giúp phần mềm hoạt động hiệu quả hơn.
    Trong OOP có abstract class và interface để trừu tượng hóa các đối tượng.

[2] Tính đóng gói (Encapsulation)
    - Tính chất này không cho phép người dùng các đối tượng có thể thay đổi trạng thái của một đối tượng.
    Chỉ có các phương thức nội tại của đối tượng mới được phép thay đổi trạng thái của nó.
    Việc cho phép môi trường bên ngoài tác động lên các dữ liệu nội tại của một đối tượng theo cách nào là hoàn toàn tùy thuộc vào người viết mã.
    Đây là tính chất đảm bảo sự toàn vẹn, bảo mật của đối tượng.
    - Trong OOP, có các access modifier quy định phạm vi sử dụng của thuộc tính và phương thức:
    + private: các thuộc tính và phương thức private chỉ có thể truy cập từ bên trong class
    + protected: các thuộc tính và phương thức protected có thể truy cập từ bên trong class và các class kế thừa nó
    + public: các thuộc tính và phương thức public có thể truy cập từ bên ngoài.

[3] Tính kế thừa (Inheritance)
    Là một lớp con được xây dựng dựa trên một lớp cha đã có từ trước.
    khi đó trong lớp con này sẽ kế thừa tất cả các phương thức và thuộc tính của lớp cha (trừ các phương thức hoặc thuộc tính có mức độ truy cập là private).
    Ngoài ra lớp con còn có thêm các thuộc tính và phương thức khác cho riêng mình.
    Trong PHP, một lớp chỉ có thể kế thừa từ một lớp khác.

[4] Tính đa hình (polymorphism)
    tính đa hình là sự đa hình của mỗi hành động cụ thể ở những đối tượng khác nhau.
    Một lớp con được kế thừa từ lớp cha thì lớp con đó sẽ có các phương thức và thuộc tính của lớp cha đó.
    Tuy nhiên trong nhiều trường hợp thì một số phương thức của lớp cha không còn phù hợp với lớp con nữa
    do đó Lớp con sẽ có nhiệu vụ là định nghĩa lại các phương thức đó sao cho phù hợp với mình.
-->
<h4>--------- DEMO VỀ TÍNH ĐA HÌNH -----------</h4>
<?php
    class Hinh
    {
        protected function tinhDienTich(){
            //code
        }
    }
    
    class HinhVuong extends Hinh
    {
        private $canh;
    
        public function setCanh($canh){
            $this->canh = $canh;
        }
    
        public function getCanh(){
            return $this->canh;
        }
    
        //tính diện tích của hình vuông
        public function tinhDienTich(){
            return pow($this->canh, 2);
        }
    }
    
    class HinhTron extends Hinh
    {
        private $bankinh;
    
        public function setBanKinh($bankinh){
            $this->bankinh = $bankinh;
        }
    
        public function getBanKinh(){
            return $this->bankinh;
        }
    
        //tính diện tích của hình tròn
        public function tinhDienTich(){
            return pow($this->bankinh, 2) * pi();
        }
    }
    
    $hinhvuong = new HinhVuong();
    $hinhvuong->setCanh(4);
    echo $hinhvuong->tinhDienTich()."<br>";

    $hinhtron = new HinhTron();
    $hinhtron->setBanKinh(4);
    echo $hinhtron->tinhDienTich();
?>