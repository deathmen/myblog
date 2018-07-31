<h1>This a  Index  View</h1>
<?php
echo "<br/>";
foreach ($arr as  $value1 )
{
    foreach ($value1 as $key=>$value)
    {
        echo $key.':'.$value."  ";
        
        
    }
    $id=$value1['id'];
    echo '<a href="http://localhost/php/myblog/index/update/'.$id.'">编辑</a>';
    echo "<br/>";
    
}