<?php
header('Content-Type: application/json');
include_once('functions.php');
// add module data
if ($_REQUEST['function'] === 'insert_module_data') {
    $insert_module_data_vars = $_REQUEST;
    insert_module_data($insert_module_data_vars);
}
// update page
if ($_REQUEST['function'] === 'insert_offer') {
    $insert_offer_vars = $_REQUEST;
    insert_offer($insert_offer_vars);
}
// get template
if ($_REQUEST['function'] === 'get_page') {
    $get_page_vars = $_REQUEST;
    get_page_data($get_page_vars);
}