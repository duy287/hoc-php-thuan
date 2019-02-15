<!--
    NAMESPACE
Trong một dự án lớn có bao giờ bạn nghĩ đến trường hợp là sẽ xảy ra các class có trùng tên nhau không? 
Chính vì điều đó mà kể tử phiên bản PHP 5.3 trở đi thì PHP có hỗ trợ cho chúng ta chức năng mới là namespace.

[1] NAMESPACE LÀ GÌ?
- Namespace giúp tạo ra một không gian tên cho hàm và lớp trong lập trình HĐT.
VD: như chúng ta có 2 file mỗi file đều chứa một class và 2 class này lại trùng tên nhau.
Giả sử bạn nhúng cả 2 file này vào chương trình để gọi class thì ngay lập tức chương trình sẽ báo lỗi. 
Để khắc phục điều đó thì chúng ta cần khai báo namespace cho hai class đó.

[2] KHAI BÁO NAMESPACE
- Cú pháp: namespace Tên;
Chú ý: khi khai báo namespace thì chúng ta phải đặt nó ở phía trên cùng của file
    namesapce Hello;
    class Package
    {
        public function sayHello()
        {
            echo 'Hello World!';
        }
    }
- Bạn cũng có thể hoàn toàn đặt tên namespace theo các cấp được.
VD: Tạo một class HomeController trong thư mục app\controllers và đặt tên namespace như sau:
    namespace App\Controllers;
    class HomeController
    {
        //code
    }

[3] GỌI CLASS ĐƯỢC ĐỊNH DANH BỞI NAMESPACE
- Khi mà một class đã được một namespace định danh thì bạn sẽ không thể gọi theo cách thông thường được nữa
mà phải gọi với cú pháp:
$obj = new Tên_namespace\Tên_class();

Hoặc
use Tên_namespace\Tên_class;
$obj = new Tên_class();

[4] ĐỊNH DANH CHO NAMESPACE
- Giả sử namespace của chúng ta rất dài thì PHP cũng có cung cấp cho chúng ta một phương pháp đó là tạo định danh cho namespace.
    use tenNamespace as tenMoi; 
lúc này tenMoi sẽ thay thế cho tenNamesapce cũ.

[5] TRONG FILE KHAI BÁO NHIỀU NAMESPACE
    namespace nameOne;
    class ClassOne
    {
        //
    }

    namespace nameTwo;
    class ClassTwo
    {
        //
    }

[*] Nhận xét: namespace sẽ được sử dụng rất nhiều trong các frameword như Laravrel, Zend,... 
-->