<!--
    GIỚI HẠN SỐ DÒNG DỮ LIỆU LẤY VỀ
- MySQL cung cấp mệnh đề LIMIT để xác định số lượng các bản ghi cần trả về.
- Mệnh đề LIMIT giúp dễ dàng phân trang với SQL, 
và rất hữu ích trên các bảng có dữ liệu lớn. Tránh việc trả về một số lượng lớn các bản ghi có thể ảnh hưởng đến hiệu suất.

- Giả sử chúng tôi muốn chọn tất cả các records từ 1 - 30 từ một bảng có tên là "sanpham". Truy vấn SQL sẽ trông như sau:
    $sql = "SELECT * FROM sanpham LIMIT 30";
Khi truy vấn này được chạy, nó sẽ trả về 30 bản ghi đầu tiên trong table.

- Điều gì xảy ra nếu chúng ta muốn chọn các bản ghi 16 - 25 ?
Mysql cũng cung cấp một cách để xử lý điều này: bằng cách sử dụng OFFSET.
Truy vấn SQL bên dưới cho biết "chỉ trả về 10 bản ghi, bắt đầu từ bản ghi 16 (OFFSET 15)":
    $sql = "SELECT * FROM sanpham LIMIT 10 OFFSET 15";
+ Bạn cũng có thể sử dụng cú pháp ngắn gọn hơn:
    $sql = "SELECT * FROM sanpham LIMIT 15, 10";
    Lưu ý: rằng các số được đảo ngược khi bạn sử dụng dấu phẩy.
-->