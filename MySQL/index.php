<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table border="1">
    <caption>图书管理</caption>
    <thead>
        <tr>
            <th>id</th>
            <th>名称</th>
            <th>价格</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
    <form>
        <?php
        $mysql_conf = array(
            'host'    => '127.0.0.1:3306',
            'db'      => 'quan',
            'db_user' => 'root',
            'db_pwd'  => 'quan',
        );
        $mysql_conn = @mysql_connect($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);
        if (!$mysql_conn) {
            die("could not connect to the database:\n" . mysql_error());//诊断连接错误
        }
        mysql_query("set names 'utf8'");//编码转化
        $select_db = mysql_select_db($mysql_conf['db']);
        if ($select_db) {
            $sql = "select * from phpbook;";
            $res = mysql_query($sql);
            if ($res) {
                while ($row = mysql_fetch_assoc($res)) {
                    $id = $row["id"];
                    $idName = $id."name";
                    $idPrice = $id."price";
                    $idButton = $id."button";
                    echo "<tr>
                            <td>$row[id]</td>
                            <td><input type='text' disabled='disabled' id='$idName' value='$row[name]'/></td>
                            <td><input type='number' disabled='disabled' step='0.01' id='$idPrice' value='$row[price]'/></td>
                            <td><button type='submit'formaction='delete.php' name='delid' value='$id' >删除</button>
                            <input type='button' id='$idButton' onclick='redact(\"$id\",\"$idName\",\"$idPrice\",\"$idButton\")' value='修改'/></td>
                           </tr>";
                }
            }
        }
        mysql_close($mysql_conn);
        ?>
    </form>
    </tbody>
    <form action="insert.php" method="post">
        <tr>
            <td><input type="number" name="id" /></td>
            <td><input type="text" name="name" /></td>
            <td><input type="number" step="0.01" name="price" /></td>
            <td><input type="submit" value="添加"/></td>
        </tr>
    </form>
</table>
</body>
<script src="js/js.js"></script>
</html>