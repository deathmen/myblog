<?php

include  __DIR__.'/../Models/indexModel.php';

class index
{
    private  function  db()
    {
        $indexModel =new indexModel;
        return  $indexModel;
        
    }
 
    
    public function getlist()
   {
    
       $arr=$this->db()->select('blogs','order by id');
       include  __DIR__.'/../views/indexView.php';
      
       
   }
   
   
   public function add()
   {
       
       if(isset($_POST["title"] )&& isset($_POST["text"])&&isset($_POST["creater"]))
       {
      echo "<H1>try to add a record </H1>";
       $insert_value="NULL,'".$_POST["title"]."','".$_POST["text"]."','".date("Y-m-d")."','".$_POST["creater"]."'";
       $index =new indexModel;
       $arr=$index->add('blogs',$insert_value);
      // include  __DIR__.'/../views/indexView.php';
       if (count($_POST) > 0) {
           $_POST = array();
       }
       
       if($arr=="ok"){
           echo "ok";
           header('Location:http://localhost/php/myblog/index/getlist');
           exit;
       }
       
       }
      else 
       {
           include __DIR__.'/../views/indexAddView.php';
           
       }
       
   }
   
   
   
   public  function  del()
   {
       
       if ($_SERVER["REQUEST_METHOD"] == "POST")
       {
           $id= $this->test_input($_POST["id"]);
       }
       
       
       $url_id=$GLOBALS['queryString'];
       if(isset($_POST["id"])&&$url_id[0]<>"")
   {
      $this->db()->del($id, 'blogs');
       
 
   }else {
       
       
       echo '<script>alert("nothing to do");
      location.href= "http://localhost/php/myblog/index/getlist";

</script>';
     //  header('Location:http://localhost/php/myblog/index/getlist');
   }
       
       
       
   }
   
   public  function  update()
   {
       
       if ($_SERVER["REQUEST_METHOD"] == "POST") 
       {   
           
           $id= $this->test_input($_POST["id"]);
           $title = $this->test_input($_POST["title"]);
           $text = $this->test_input($_POST["text"]);
            $creater = $this->test_input($_POST["creater"]);
            $btn = $this->test_input($_POST["creater"]);
           //$comment = test_input($_POST["comment"]);
          // $gender = test_input($_POST["gender"]);
       }
       if(!empty($_POST["id"]))
       {
       $index =new indexModel;
       $data=array('title'=>$title,'text'=>$text,'creater'=>$creater);
       $n=  $index->update('blogs', $data, "id=$id");
       echo("<br>正在保存！！".$n);
       if($n==1)
       {
     header('Location:http://localhost/php/myblog/index/getlist');
       }else{
           echo "没有变化";
           
       }
     
       }
       
       if(isset($GLOBALS['urlArray']))
       {
           
           $urlArray=$GLOBALS['urlArray'];
        
       }
       if(  $urlArray[0]<>'')
       {
           echo "<h1>edit !</h1>";
           $indexModel =new indexModel;
           $id=$urlArray[0];
           $condition="where id=$id";
           $arr=$indexModel->select('blogs',$condition);
           $data=$arr[0];
            //var_dump($arr);
            //echo $arr[0]['title'];
          include __DIR__.'/../views/indexAddView.php';
           
       }
   }
   
  protected  function test_input($data)
   {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
   }
    
    
}