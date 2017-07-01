<?php
include_once('../config/cons.php');
if(isset($_GET['p_id'])){
    $link =  URL_HTTP . "/post&art=" . intval($_GET['p_id']);
    header("Location: " . $link);
}else{
    header("Location: " . URL);
}
?>