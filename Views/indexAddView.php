<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>文档标题</title>
</head>
 <body>
 
 <h1>This a  Add  View</h1>
<form  action="http://localhost/php/myblog/index/<?php echo isset($data)?'update':'add' ?>/" method="post" >
title: <input type="text" name="title" value="<?php echo isset($data)?$data['title']:'' ?>"  ><br>
creater: <input type="text" name="creater" value="<?php echo isset($data)?$data['creater']:'' ?>" ><br>
<textarea rows="10" cols="30" name="text"   >
</textarea><br>
<input type="hidden" name="id"  value="<?php echo isset($data)?$data['id']:'' ?> ">
<?php echo isset($data['text'])?$data['text']:'' ?>

<input type="submit" value="Submit">

</form>

</body>
 
</html>