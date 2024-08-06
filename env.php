<?php
//điều chỉnh kết nối db ở đây
const DBNAME = "asm2";
const DBUSER = "root";
const DBPASS = "";

const DBCHARSET = "utf8";
const DBHOST = "localhost";

const BASE_URL = "http://localhost/ams2/base/";


function redirect($key = "",$msg = "",$url ="") {
    $_SESSION[$key] = $msg;
    switch ($key) {
        case "errors":
            unset($_SESSION['success']);
            break;
        case "success":
            unset($_SESSION['errors']);
            break;
    }
    header('location: ' . BASE_URL . $url."?msg=".$key);die;
}

function route($name) {
    return BASE_URL.$name;
}