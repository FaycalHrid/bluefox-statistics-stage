<?php

namespace App\Helpers;


class CryptHelper{

    /**
     * @author Fouad DANI
     * @desc
     * @param $plainpasswd
     * @return string
     */
    public static function crypt_apr1_md5($plainpasswd){
        $salt = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789"), 0, 8);
        $len = strlen($plainpasswd);
        $tmp = "";
        $text = $plainpasswd.'$apr1$'.$salt;
        $bin = pack("H32", md5($plainpasswd.$salt.$plainpasswd));
        for($i = $len; $i > 0; $i -= 16) { $text .= substr($bin, 0, min(16, $i)); }
        for($i = $len; $i > 0; $i >>= 1) { $text .= ($i & 1) ? chr(0) : $plainpasswd{0}; }
        $bin = pack("H32", md5($text));
        for($i = 0; $i < 1000; $i++)
        {
            $new = ($i & 1) ? $plainpasswd : $bin;
            if ($i % 3) $new .= $salt;
            if ($i % 7) $new .= $plainpasswd;
            $new .= ($i & 1) ? $bin : $plainpasswd;
            $bin = pack("H32", md5($new));
        }
        for ($i = 0; $i < 5; $i++)
        {
            $k = $i + 6;
            $j = $i + 12;
            if ($j == 16) $j = 5;
            $tmp = $bin[$i].$bin[$k].$bin[$j].$tmp;
        }
        $tmp = chr(0).chr(0).$bin[11].$tmp;
        $tmp = strtr(strrev(substr(base64_encode($tmp), 2)),
            "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",
            "./0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");

        return "$"."apr1"."$".$salt."$".$tmp;
    }

    /**
     * @author Fouad DANI
     * @desc APR1-MD5 encryption method (windows compatible)
     * @param int $length
     * @return string
     */
    public static function generatePassword($length = 8) {
        $lower_case = 'abcdefghijklmnopqrstuvwxyz';
        $upper_case = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '1234567890';
        $special_symbols = '@#$&!;';
        $chars = $lower_case.$special_symbols.$upper_case.$numbers.$special_symbols;
        $count = mb_strlen($chars);

        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }

        return $result;
    }

}