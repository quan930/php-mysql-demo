<?php
/**
 * Created by PhpStorm.
 * User: daquan
 * Date: 2019-02-27
 * Time: 18:44
 */
$mysql_conf = array(
    'host'    => '47.94.13.255:3306',
    'db'      => 'quan',
    'db_user' => 'root',
    'db_pwd'  => 'quan',
);
$mysql_conn = @mysql_connect($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);
if ($mysql_conn)
{
    mysql_select_db($mysql_conf['db']);
    $sql = "UPDATE phpbook SET name ='$_POST[name]',price = '$_POST[price]' WHERE id = '$_POST[id]'";
    mysql_query($sql);
    mysql_close($mysql_conn);
    header("location:index.php");//跳转
}
?>