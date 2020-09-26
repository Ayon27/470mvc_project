<?php

namespace App\Models;

use Exception;
use App\Mock\MockDB;

class checkUserInfo
{
    public function checkNumber($value)
    {
        echo $value;
        return is_numeric($value);
    }

    public function checkName($value)
    {
        $value = str_replace(" ", "", $value);
        echo $value;
        return ctype_alpha($value);
    }
}
