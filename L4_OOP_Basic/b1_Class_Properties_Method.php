<!--
LỚP, THUỘC TÍNH, PHƯƠNG THỨC
[1] LỚP
    class Name
    {
        //code
    }

[2] THUỘC TÍNH
Thuộc tính (properties) trong class có tác dụng như các biến và hằng 
    class Name
    {
        //đối với thuộc tính động
        var $propertyName; //var <==> public (public thường sử dụng hơn)
        //đối với thuộc tính cố định(hằng)
        const $constName = value;
    }

[3] PHƯƠNG THỨC
Phương thức trong class là các hành động của class đó. Và nó khá giống với hàm ở trong phương pháp lập trình hướng thủ tục
    class Name
    {
        function methodName($param)
        {
            //code  
        }
    }

[4] KHỞI TẠO ĐỐI TƯỢNG
Có 2 cách
    $bject = new className;
    //hoặc
    $bject new ClassName(); //nên dùng

[5] TRUY XUẤT THUỘC TÍNH TRONG VÀ NGOÀI LỚP
- Truy xuất trong class:
    $this->TenThuocTinh;
    Nếu thuộc tính dạng hằng thì truy xuất như sau: 
        self::TenThuocTinh; //nên dùng cách này
        //hoặc
        TenLop::TenThuocTinh;
- Truy xuất bên ngoài Class:
    $object->TenThuocTinh;
    Nếu thuộc tính dạng hằng thì truy xuất như sau: 
        TenLop::TenThuocTinh;

[6] TRUY XUẤT PHƯƠNG THỨC TRONG VÀ NGOÀI LỚP
- Truy xuất trong class:
    $this->TenPhuongThuc($param);
- Truy xuất bên ngoài Class:
    $object->TenPhuongThuc($param);

[*] GHI CHÚ
- Tham khảo https://toidicode.com
- Chúng ta có thể tạo thêm thuộc tính cho class từ bên ngoài
Class ClassName{
    public $name=20;
}
$obj = new ClassName();
$obj->age = 20; // tạo thêm thuộc tính age cho class. (điều này ko dùng đc đối với phương thức)

-->
<?php 

class ConNguoi
{
    //khai báo thuộc tính động
    public $name;
    public $mat;
    public $mui;
    //khai báo constant
    const SOCHAN = 2;

    //khai báo phương thức
    public function noi($caunoi)
    {
        //gọi phương thức trong class
        return $this->getSoChan();
    }
    public function getName()
    {
        //gọi thuộc tính trong class
        return $this->name;
    }

    public function getSoChan()
    {
        //gọi thuộc tính constant trong class
        return self::SOCHAN;
    }
}

//khởi tạo đối tượng
$connguoi = new ConNguoi();
//gọi thuộc tính ngoài class và đồng thười gán giá trị mới cho thuộc tính
$connguoi->name = 'Vũ Thanh Tài';
//gọi lại thuộc tính để xem thay đổi
echo $connguoi->name . "<br>";
//gọi phương thức
echo $connguoi->noi('Vũ Thanh Tài');

?>