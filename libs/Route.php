<?php

class Route {

    public function __construct(){
        // تهيئة مصفوفة لتخزين الطرق المضافة
        $this->routes = [];
    }
    // هذه الدالة تقوم باضافة طريق جديد
    public function addRoute($route,$cont){
        $this->routes[$route] = $cont;
    }

    // استدعاء الطريق
    public function getRoute($route){
        $for_subs = $route;
        $route = explode('/' , $route);
        $arr_route = "/";

        foreach($route as $k => $v){
            if($v == $route[count($route) - 1]){
                if($v != "")
                    $arr_route .= $v;
            }else{
                if($v != "")
                    $arr_route .= $v . "/";
            }
        }

        if(array_key_exists($arr_route ,$this->routes)){

            $controller_file = explode("@",$this->routes[$arr_route]);
            
            require_once("./controllers/" . $controller_file[0] . ".php");
            
            $controller = new $controller_file[0]();
            $controller->loadModel($controller_file[0]);
            if(!isset($controller_file[1]))
                die("You must specify the method for route:" . $this->routes[$arr_route]);

            if(method_exists($controller,$controller_file[1])){
                if (version_compare(PHP_VERSION, '7.0.0') <= 0) {
                    $controller->$controller_file[1]();
                }
                else {
                    $method = $controller_file[1] . "";
                    $controller->$method();
                }
            }
            else
                die("Method : <b>'" . $controller_file[1] . "()'</b> dose not exists in class : <b>'" . ucfirst($controller_file[0]) ."'</b>!");
        }else{
            $v = new View();
            $v->view("404");
        }
    }


}

$r = new Route();

?>
