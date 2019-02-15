<!--
    KẾT NỐI VỚI CSDL MYSQL
[1] Kết nối PHP với MySql bằng mysqli.
a) mysqli hướng thủ tục
    - dùng hàm mysqli_connect()
    $connect = mysqli_connect(hostame, username, password, databasename);
    => $connect sẽ là một đối tượng chứa các thông số kết nối.

b) mysqli hướng đối tượng
    - Đối với phương thức này các bạn chỉ cần khởi tạo class mysqli với cú pháp như sau:
    $connect = new mysqli(hostname, username, password, databasename);

[2] Kết nối PHP với MySql bằng PDO.
- PDO là viết tắt của chữ PHP Data Object, với gói này bạn có thể kết nối PHP đến rất nhiều các database khác
như Oracel,postpreSQL,...
    + Để kết nối PHP với MySql bằng PDO các bạn chỉ cần khởi tạo class PDO với cú pháp:
        $connect = new PDO(dsn, username, password, option);
    Trong đó: dsn chứa các thông tin như hostname,databasename,... còn option chứa các thông số tùy chỉnh(nói sau).
- Một lợi ích lớn của PDO là nó có một lớp ngoại lệ để xử lý bất kỳ vấn đề nào có thể xảy ra trong các truy vấn cơ sở dữ liệu
Nếu một ngoại lệ được ném vào trong khối try {}, script sẽ dừng lại và chuyển đến khối catch () {} đầu tiên.

[3] Ngắt kết nối.
a) mysqli hướng thủ tục
- Để hủy kết nối với phương thức này thì các bạn dùng hàm mysqli_close()
    mysqli_close($connect);
  Với $connect là biến khởi tạo kết nối.

b) mysqli hướng đối tượng
- Để hủy kết nối với cách này thì các bạn chỉ cần gọi phương thức close()
    $connect->close();
    
c) PDO
Để hủy kết nối bằng cách này thì các bạn chỉ cần set biến khởi tạo về null.
    $connect = null
-->

Để xem chi tiết từng cách kết nối PHP và MySQL bạn vào thư mục b1_connection