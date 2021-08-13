<?php
	session_start();
	include("../condb.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>


</head>

<body>
<select id="ddlViewBy">
  <option value="1">test1</option>
  <option value="2" selected="selected">test2</option>
  <option value="3">test3</option>
</select>

<script>
    var e = document.getElementById("ddlViewBy");
	var strUser = e.value; // 2
    var strUser = e.options[e.selectedIndex].text; //test2
    alert(strUser);
</script>

</body>
</html>