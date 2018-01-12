<?php

if (!empty($_GET["url"])) {

    echo 'url:'.$_GET['url'].'<br>';
    $url = $_GET['url'];
    $urlArray = explode('/', $url);
    // 获取控制器名
    $controllerName =  ucfirst($urlArray[0]);
    
    array_shift($urlArray);
    $action = empty($urlArray[0]) ? 'getlist' : $urlArray[0];
    echo 'action:'.$action.'<br/>';
    
    //获取URL参数
    array_shift($urlArray);
    $queryString = empty($urlArray) ? array() : $urlArray;
    /*
    echo '<br>';
    echo  $controllerName ;
    echo '<br>';
   echo  $action;
   */
   $path='Controllers/'.$controllerName.'Controller.php';
  include $path;
  $controller=new $controllerName;
 // $action=$action.'()';

  $controller->{$action}() ;
 
}

?>