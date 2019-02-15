<!--
    BỘ LỌC TRONG PHP
[1] Khái niệm.
- Nếu trước đây chúng ta sử dụng Regular Expression để kiểm tra định dạng dữ liệu thì rất phức tạp phải không nào?
Mình cũng vậy, trước đây mình toàn đi lên mạng kiếm những hàm người ta viết sẵn về sử dụng mà không hề biết ý nghĩa của nó như thế nào.
Nhưng bây giờ thì khác vì trong PHP có một module hỗ trợ việc này khá tốt đó là PHP Filters.
- PHP Filters là một extension được tích hợp sẵn vào thư viện của PHP,
đây là một thư viện dùng để kiểm tra tính hợp lệ của dữ liệu (validate data), lọc và xóa đi những ký tự trùng khớp (Sanitizing data).
Thông thường chúng ta hay sử dụng PHP Filters để kiểm tra định dạng dữ liệu vì nó tương đối đơn giản. 

[2] Các loại Filter.
Có 2 loại sau:
- Validating data : Xác định xem dữ liệu có đúng không.
- Sanitizing data : Loại bỏ các ký tự lạ ra khỏi dữ liệu.

[3] Tại sao nên dùng Filter
Trong ứng dụng web chúng ta thường sử dụng dữ liệu được lấy từ các nguồn bên ngoài như dưới đây:
    Form (dữ liệu từ form)
    Cookies (dữ liệu từ cookie)
    Web services data (dữ liệu từ nhà cung cấp theo dạng json, xml, v.v..)
    Server variables (dữ liệu từ các biến của server)
    Database query results (dữ liệu từ cơ sở dữ liệu như mysql, sql, postgresql, v.v..)
    ==> Bạn nên luôn luôn kiểm tra các dữ liệu được lấy từ những nguồn trên.
    Vì khi dữ liệu không hợp lệ có thể dẫn đến các vấn đề về bảo mật và làm hư hại trang web của bạn.
    Bằng cách sử dụng hàm filter trong PHP, bạn có thể chắc chắn ứng dụng của bạn nhận được dữ liệu đưa vào là chính xác!

[4] Một số hàm Filter
- filter_val()
    Được dùng để thực hiện cả hai chức năng là validate data và sanitize data.
    Cú pháp
        filter_var(variable, type)
    Trong đó 
        variable là biến chứa dữ liệu mà bạn muốn kiểm tra
        type là loại kiểm tra nào sẽ được sử dụng.

[*] http://phpcanban.com/ham-filter-trong-php-chuong-8.html  

-->
<?php
    //[1] Xoá tất cả các thẻ ra khỏi một chuỗi
    $str = "<h1>Hello World!</h1>";
    $newstr = filter_var($str, FILTER_SANITIZE_STRING);
    echo $newstr;

    //[2] xóa tất cả các ký tự bất hợp pháp khỏi biến $email, sau đó kiểm tra xem đó có phải là địa chỉ email hợp lệ không.
    $email = "phpcanbaninfo@example.com";
    // Xóa tất cả ký tự bất hợp pháp trong email.
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    // Kiểm tra tính hợp lệ của e-mail
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === true) {
        echo("$email :là email hợp lệ");
    } else {
        echo("$email : không hợp lệ");
    }
    
    // kết quả
    // phpcanbaninfo@example.com là email hợp lệ
?>