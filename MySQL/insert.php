<?php
/**
 * Created by PhpStorm.
 * User: daquan
 * Date: 2019-02-27
 * Time: 12:22
 */
$mysql_conf = array(
    'host'    => '47.94.13.255:3306',
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

$sql="INSERT INTO phpbook (id, name, price)VALUES('$_POST[id]','$_POST[name]','$_POST[price]')";

if (!mysql_query($sql,$mysql_conn))
{
    die('Error: ' . mysql_error());
}
echo "1 record added";
mysql_close($mysql_conn);
header("location:index.php");//跳转
?>