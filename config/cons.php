<?php

define('DEFAULT_LANG','ar');
define("URL","/ZEYD"); // the base url If the Base is '/' set the value empty define("URL","");
define("URL_HTTP","http://zeyd.org"); // the all of url of website


// admin path
define("ADMIN_BASE","/admin");
define("ADMIN_PATH", URL . ADMIN_BASE);
define("PUBLIC_PATH", URL . "/public");
define("IMG_PATH", PUBLIC_PATH . "/img");
define("CSS_PATH", PUBLIC_PATH . "/css");
define("JS_PATH", PUBLIC_PATH . "/js");
define("CK_E_PATH", PUBLIC_PATH . "/ckeditor");
define("CK_F_PATH", PUBLIC_PATH . "/ckfinder");

define("REGEX_CHARS_LANG",'/^[a-z]{2,2}$/');
define("REGEX_INT",'/^[0-9]+$/');
define("REGEX_USERNAME",'/^[a-z][a-z0-9._]{3,19}$/');
define("REGEX_SPECIAL_CHAR",'/[\'"=<>;\\\]/'); // block this characters
define("REGEX_EMAIL",'/^[a-zA-Z0-9_.]+@[a-zA-Z0-9]+\.[a-zA-Z0-9.]+$/');
define("SECRET_CAPTCHA","");
define("ALL_LANG",'ar,en,tr');
?>
