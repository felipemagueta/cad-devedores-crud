<?php
require_once("./lib/helpers.php");

class Application {

    public $controller;
    public $controllerFile;
    public $viewsFolder;
    public $action;
    public $actionFile;
    public $params;
    
    public function __construct()
    {  
         
        //Rotas
        $this->_rotas(); 

        //Helpers
        $this->helper = new Helpers();

    }

    private function _rotas(){

        $request_route = $_SERVER['QUERY_STRING'];
        $request_parts = explode('/', str_replace('url=','', $request_route));

        $this->_setController($request_parts[0] ?? null);
        $this->_setAction($request_parts[1] ?? null);
        $this->_setParams($request_parts ?? null, $_POST); 
  
    }

    public function load(){   

        require_once($this->controllerFile); 
        $controller = $this->controller;
        $controller_class = new $controller; 
        $action = $this->action;
        $controller_class->$action(); 

    }

    private function _setController($controller = null){ 

        if(!$controller) $controller = 'index';
        $class = implode('', array_map('ucwords', explode('-',$controller)));
        $this->controller = $class.'Controller';
        $this->controllerFile = 'controllers/' .$class. 'Controller.php';
        $this->viewsFolder = $controller;

    }
    private function _setAction($action = null){ 

        if(!$action) $action = 'index';
        $class = implode('', array_map('ucwords', explode('-',$action)));
        $this->action = $class;
        $this->actionFile = 'views/'.$this->viewsFolder.'/'.$action.'.php';

    }
    private function _setParams($request_parts, $post = null){ 

        $params = [];
        if(!$request_parts) $params = null;
        
        
        if(is_array($request_parts)){ 
            for($i=2; $i < count($request_parts); $i+=2){ 
                $request_parts[$i+1] ? $params[$request_parts[$i]] = ($request_parts[$i+1]) : $params[$request_parts[$i]] = null; 
            }  
        } 
        if($post){
            foreach ($post as $key => $value) {
                $params[$key] = ($value);
            }
        } 
        $this->params = $params; 
    }

    public function view($file, $data = null){
 
        include $file;

    }

    public function redirect($url){  
        header('Location: '.URLBASE.$url);   

    }

}
?>