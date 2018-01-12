<?php
include  __Dir__.'/sql.calss.php';
class indexModel extends  sql
{
    
   
   
    
    function  __construct()
    {

        parent::__construct('localhost', 'root', 'root','myblog', 'conn', 'UTF8'); 
   
        
    }
    
    function __destruct()
    {
    }
    
    
}

/*
$index=new indexModel;
var_dump($index->select('blogs'));
$arr=$index->select('blogs');

foreach ($arr as  $value1 )
{   
    foreach ($value1 as $key=>$value)
    {
        echo $key.':'.$value."  ";
       
        
    }
    echo "\n";
    
}
*/
 
?>