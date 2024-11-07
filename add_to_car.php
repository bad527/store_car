<?php
//取得表單資料
$book_no=$_GET["book_no"];
$book_name=$_GET["book_name"];
$price=$_GET["price"];
$quantity=$_POST["quantity"];
if(empty($quantity)) $quantity=1;

//若購物車內沒有產品，就將產品資料加入購物車
if(empty($_COOKIE["book_no_list"]))
{
    setcookie("book_no_list",$book_no);
    setcookie("book_name_list",$book_name);
    setcookie("price_list",$price);
    setcookie("quantity_list",$quantity);
}
//否則做如下處理
else
{
    $book_no_array=explode(",",$_COOKIE["book_no_list"]);
    $book_name_array=explode(",",$_COOKIE["book_name_list"]);
    $price_array=explode(",",$_COOKIE["price_list"]);
    $quantity_array=explode(",",$_COOKIE["quantity_list"]);

    //若訂購的產品已經在購物車內，就變更產品的數量
    if(in_array($book_no,$book_no_array))
    {
        $key=array_search($book_no,$book_no_array);
        $quantity_array[$key]+=$quantity;
    }
    //否則將產品資料加入購物車
    else
    {
        $book_no_array[]=$book_no;
        $book_name_array[]=$book_name;
        $price_array[]=$price;
        $quantity_array[]=$quantity;
    }

    //儲存購物車資料
    setcookie("book_no_list",implode(",",$book_no_array));
    setcookie("book_name_list",implode(",",$book_name_array));
    setcookie("price_list",implode(",",$price_array));
    setcookie("quantity_list",implode(",",$quantity_array));
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
</head>
<body bgcolor="lightyellow">
    <p align="center"><img src="fig1.jpg" alt=""></p>
    <p align="center">您所選的產品及數量已成功放入購物車!</p>
    <p align="center"><a href="catalog.php">繼續購物</a></p>
</body>
</html>