<?php
    setcookie("name",$_POST["name"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購物車</title>
</head>
    <frameset rows="60,*" border="0" >
        <frame name="top" noresize scrolling="no" src="show_link.html">
        <frame name="bottom" noresize src="catalog.php">
    </frameset>

</html>