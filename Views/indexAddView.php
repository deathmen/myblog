<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>文档标题</title>
</head>
 <body>
 
 <h1>This a  Add  View</h1>
<form  id="form1" action="http://localhost/php/myblog/index/<?php echo isset($data)?'update':'add' ?>/" method="post" >
title: <input type="text" name="title" value="<?php echo isset($data)?$data['title']:'' ?>"  ><br>
creater: <input type="text" name="creater" value="<?php echo isset($data)?$data['creater']:'' ?>" ><br>
<textarea rows="10" cols="30" name="text"   >
<?php echo isset($data['text'])?$data['text']:'' ?>
</textarea><br>
<input type="text" name="id"  value="<?php echo isset($data)?$data['id']:'' ?> ">


<input type="submit" value="提交">


<input  type="submit"  value="删除" onclick='javascript:document.getElementById("form1").action="<?php $_SERVER['SERVER_NAME']?>/php/myblog/index/del/<?php echo isset($data)?$data['id']:'' ?>"  '>
</form>

</body>
 
</html>