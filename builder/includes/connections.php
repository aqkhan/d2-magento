<?php
$con = mysqli_connect("localhost","root","","magento_builder");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die;
}

$con2 = mysqli_connect("localhost","root","","magento");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die;
}

$site_url = 'http://localhost/magento/builder';
$media_url = 'http://localhost/magento/pub/media/catalog/product/';
