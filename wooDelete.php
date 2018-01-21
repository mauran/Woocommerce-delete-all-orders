<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" (Revision 42):
 * <mauran@mauran.me> wrote this file.
 * As long as you retain this notice you can do whatever you want with this
 * stuff. If we meet some day, and you think this stuff is worth it, you can
 * buy me a beer in return --Mauran Muthiah
 * ----------------------------------------------------------------------------
 */

// By default wp_ for standard WP-installations
$prefix = 'wp_';

// Database infos here
$host = 'localhost';
$username = 'user';
$password = 'password';
$db = 'dbname';

$conn = new mysqli($host, $username, $password, $db);


if ($conn->connect_error) {
    die('Whoops: '.$conn->connect_error);
}


$sql = 'DELETE FROM '.$prefix.'woocommerce_order_itemmeta';

if ($conn->query($sql) === true) {
    echo 'Deleted woocommerce_order_itemmeta '.PHP_EOL;
} else {
    echo 'Whoops: '.$conn->error;
}



$sql = 'DELETE FROM '.$prefix.'woocommerce_order_items';

if ($conn->query($sql) === true) {
    echo 'Deleted woocommerce_order_items'.PHP_EOL;
} else {
    echo 'Whoops: '.$conn->error;
}



$sql = 'DELETE FROM '.$prefix."comments WHERE comment_type = 'order_note'";

if ($conn->query($sql) === true) {
    echo "Deleted comments where comment_type = 'order_note'".PHP_EOL;
} else {
    echo 'Whoops: '.$conn->error;
}



$sql = 'DELETE FROM '.$prefix."posts WHERE post_type = 'shop_order'";

if ($conn->query($sql) === true) {
    echo "Deleted posts where post_type = 'shop_order'".PHP_EOL;
} else {
    echo 'Whoops: '.$conn->error;
}

echo 'Fixed! Your woocommerce orders should be empty! :-)';
