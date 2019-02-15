<?php
//Trong file có nhiều namespace
namespace App1\ConNguoi;
class ConNguoi
{
    private $name = 'Con Người';

    public function getName()
    {
        return $this->name;
    }
}

namespace App2\NguoiLon;
class NguoiLon
{
    private $name = 'Người lớn';

    public function getName()
    {
        return $this->name;
    }
}