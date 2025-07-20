<?php

namespace Core;
class Router{

    protected $routes=[];

    public function add($uri,$controller,$method){
        $this->routes[]=[

            'uri'=>$uri,
            'controller'=>$controller,
            'method'=>$method
        ];
        return $this;
    }
    public function get($uri,$controller){

      return $this->add($uri,$controller,'GET');



    }


    public function post($uri,$controller){

       return $this->add($uri,$controller,'POST');

    }

    public function delete($uri,$controller){

        return  $this->add($uri,$controller,"DELETE");

    }


    public function patch($uri,$controller){

        return  $this->add($uri,$controller,'PATCH');

    }

    public function put($uri,$controller){

        return  $this->add($uri,$controller,'PUT');


    }

    public function route($uri , $method){
        

        foreach($this->routes as $route){
            if($route['uri'] === $uri && $route['method']== strtoupper($method)){
               
                return require base_path('controller/'.$route['controller']);
            }
        }
        return  $this->abort();
    }

   

    public static function abort($code=404){
            require base_path("controller/{$code}.php");
            die();
        }


}
