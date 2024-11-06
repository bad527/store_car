<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
</head>
<body bgcolor="lightyellow">
    <table border="0" align="center" width="800" cellspacing="2">
        <tr bgcolor="#BABA76" height="30" align="center">
            <td>書號</td>
            <td>書名</td>
            <td>定價</td>
            <td>輸入數量</td>
            <td>進行訂購</td>
        </tr>
        <?php
            require_once("dbtools.inc.php");

            $link=create_connection();

            //選取所有產品內容
            $sql="SELECT * FROM product_list";
            $result=executed_sql($link,"store",$sql);

            //計算總紀錄數
            $total_records=mysqli_num_rows($result);

            for($i=0;$i<$total_records;$i++)
            {
                //取得產品資料
                $row=mysqli_fetch_assoc($result);

                //顯示產品各個欄位的資料
                echo "<form method='post' action='add_to_car.php?book_no=".
                  $row["book_no"]."&book_name=".urlencode($row["book_name"]).
                  "&price=".$row["price"].">";
                echo "<tr align='center' bgcolor='#EDEAB1'>";
                echo "<td>".$row["book_no"]."</td>";
                echo "<td>".$row["book_name"]."</td>";
                echo "<td>".$row["price"]."</td>";
                echo "<td><input='text' name='quantity' size='5' value='1'></td>";
                echo "<td><input type='submit' value='放入購物車'></td>";
                echo "</tr>";
                echo "</form>";
            }
            mysqli_free_result($result);
            mysqli_close($link);
        ?>
    </table>
</body>
</html>