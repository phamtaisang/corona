<?php

namespace Lib;
use \Curl\Curl;
class MyLib
{
    public static function println($msg)
    {
        echo $msg . PHP_EOL;
    }

    public static function get_data($link , &$content){
        $curl = new Curl();

        echo 'Start craw: ' .$link.PHP_EOL;

        $curl->setTimeout(60);
        $curl->setConnectTimeout(60);

        $curl->get($link);

        $error = $curl->error;

        if(!$error){
            $content = $curl->response;
            echo 'End craw: ' .$link.' Sucess !!!'.PHP_EOL;
        }else{
            echo 'End craw: ' .$link.' Failt !!!'.PHP_EOL;
        }

        $curl->close();

        return !$error;
    }

}