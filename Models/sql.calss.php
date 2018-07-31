<?php
header('content-type:text/html;charset=utf-8');
$DB_NAME="aaa";
class sql
{

    private $db_host; //数据库主机
    private $db_user; //数据库用户名
    private $db_pwd; //数据库用户名密码
    private $db_database; //数据库名
    private $conn; //数据库连接标识;
    private $result; //执行query命令的结果资源标识
    private $sql; //sql执行语句
    private $row; //返回的条目数
    private $coding; //数据库编码，GBK,UTF8,gb2312
    
    /*构造函数*/
    public function __construct($db_host, $db_user, $db_pwd, $db_database, $conn, $coding) {
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pwd = $db_pwd;
        $this->db_database = $db_database;
      //  $this->conn = $conn;
        $this->coding = $coding;
        $this->connect();
    }
    
    public  function  connect()
    {
        
        // 创建连接
        $this->conn = mysqli_connect($this->db_host, $this->db_user, $this->db_pwd,$this->db_database);

     //   var_dump($this->conn);
        // Check connection
        if ($this->conn->connect_error) {
            die("连接失败: " . $this->conn->connect_error);
        } 
        //mysqli_query($this->conn,"SET NAMES $this->coding");
        
        
    }
    
    //执行sql语句的方法
    public function query($sql){
        $res=mysqli_query($this->conn,$sql);
        
        if(!$res){
            echo "sql语句执行失败<br>";
            echo $sql;
            // echo "错误编码是".mysqli_errno($this->link)."<br>";
            // echo "错误信息是".mysqli_error($this->link)."<br>";
        }
        return $res;
    }
   
    
    /*
     * [修改操作description]
     * @param [type] $table [表名]
     * @param [type] $data [数据]
     * @param [type] $where [条件]
     * @return [type]
     */
    public function update($table,$data,$where){
        //遍历数组，得到每一个字段和字段的值
        $str='';
        foreach($data as $key=>$v){
            $str.="$key='$v',";
        }
        $str=rtrim($str,',');
        //修改SQL语句
        $sql="update $table set $str where $where";
        echo $sql;
        $this->query($sql);
        //返回受影响的行数
        return mysqli_affected_rows($this->conn);
    }
 
    
    
    public  function  add($tabelname ,$insert_value)
    {
        $conn=$this->conn;
        $sql="insert into $tabelname  values($insert_value)";
        
        if (mysqli_query($conn, $sql)) {
            echo "新记录插入成功";
            return "ok";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        
    }
    
    public  function  select( $tablename  ,$condition = '')
    {
        $sql = "SELECT *  FROM  $tablename";
        $sql=$condition=''?$sql:$sql.' '.$condition;
       $conn=$this->conn;
       $result = mysqli_query($conn, $sql);
       //var_dump($sql);
       echo $sql;
        
        if ($result&&mysqli_num_rows($result) > 0) {
            // 输出数据
        //  echo '444';
            $list=array();
            while($row = mysqli_fetch_assoc($result)) {
             //   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
             $list[]=$row;
            }
        }else 
        {
            echo '查询出错';
            return 0;
            
        }
        
        return $list;
        
    }
    
    
    public  function  del($id,$tablename)
    {
        
      $this->query("DELETE FROM  $tablename WHERE id=$id ");
        
 
        
    }
  
    
    //析构函数，自动关闭数据库,垃圾回收机制
    public function __destruct() {
        if (!empty ($this->result)) {
            $this->free();
        }
        mysqli_close($this->conn);
    } //function __destruct();
     
}

//$sql2=new sql('localhost', 'root', 'root','myblog', 'conn', 'UTF8');

 //$blog=$sql2->select('blogs','limit 0,50');