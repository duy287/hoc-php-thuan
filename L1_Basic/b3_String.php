<!--
CHUỖI TRONG PHP
[1] Các toán tử trong chuỗi
    .(dấu chấm) - nối chuỗi

[2] Một số hàm thường được sử dụng để thao tác các chuỗi:
    strlen()                             - trả về độ dài của một chuỗi.
    str_word_count()                     - đếm số từ trong một chuỗi
    strrev()                             - đảo ngược một chuỗi
    strpos(chuoi nguon, chuoi can tim)   - tìm kiếm chuỗi con => trả về vị trí ký tự đầu tiên tìm thấy
    str_replace(từ cần tìm , từ thay thế, chuỗi nguồn) - thay thế chuỗi

    explode(ký tự cắt, chuỗi nguồn)      - Cắt chuỗi thành mảng dựa vào ký tự cắt
    implode(ký_tự/chuỗi_nối, tên_mảng)   - Ghép các phần tử trong mảng thành chuỗi

[*] Ghi chú
    print_r(x) - hiển thị thông tin về biến x
    Nếu x là một chuỗi ,số nguyên hoặc số thực thì sẽ được in ra giá trị.
    Nếu x là một mảng thì các giá trị sẽ được trình bày theo định dạng khóa và giá trị các phần tử.
-->

<?php
    //strlen
    echo strlen("Hello world!");  //12

    //str_word_count
    echo str_word_count("Hello world!"); //2

    //strrev
    echo strrev("Hello world!"); // !dlrow olleH

    //strpos
    echo strpos("Hello world!", "world"); //6

    //str_replace
    echo str_replace("world", "Dolly", "Hello world!"); // Hello Dolly!

    //explode
    $str = "Hello world. It's a beautiful day.";
    print_r (explode(" ",$str));
    echo "<br>";

    //implode
    $arr = array('Hello','World!','Beautiful','Day');
    echo implode(" ",$arr);
?>