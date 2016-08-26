<?php
error_reporting(0);
global $site_url;
// Include Database Connection
include("connections.php");

// add module data
function insert_module_data($add_module_vars) {
    global $con;
    $module = $con->real_escape_string($add_module_vars['module']);
    $title = $con->real_escape_string($add_module_vars['title']);
    $content = $con->real_escape_string($add_module_vars['content']);
    if(module_data_exists($module) != true) {
        $query = "INSERT INTO builder_data (title, content, module, date) VALUES ('{$title}', '{$content}', '{$module}', NOW())";
    } else {
        $query = "UPDATE builder_data SET title='{$title}', content='{$content}' WHERE module = '{$module}'";
    }
    $results = $con->query($query);
    echo 'Module Content Added';
}

function module_data_exists($module) {
    global $con;
    $query = "SELECT * FROM builder_data WHERE module = '{$module}'";
    $results = $con->query($query);
    if ($results->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

// get products
function all_products() {
    global $con2;
    $query = "SELECT
    e.entity_id AS 'id',
    e.sku,
    v1.value AS 'name',
    v2.value AS 'image',
    si.qty AS 'stock qty',
    d1.value AS 'price',
    v3.value AS 'description'
FROM
    catalog_product_entity e
        LEFT JOIN
    cataloginventory_stock_item si ON e.entity_id = si.product_id
        LEFT JOIN
    catalog_product_entity_varchar v1 ON e.entity_id = v1.entity_id
        AND v1.attribute_id = 73
        LEFT JOIN
    catalog_product_entity_varchar v2 ON e.entity_id = v2.entity_id
        AND v2.attribute_id = 88
        LEFT JOIN
    catalog_product_entity_decimal d1 ON e.entity_id = d1.entity_id
        AND d1.attribute_id = 77
        LEFT JOIN
    catalog_product_entity_text v3 ON e.entity_id = v3.entity_id
        AND v3.attribute_id = 75
                  ";
    $results = $con2->query($query);
    if ($results->num_rows > 0) {
        while ($data = $results->fetch_assoc())
        {
            $page_data[] = $data;
        }
        return $page_data;
    }
}

// get wordpress pages
function all_modules() {
    global $con2;
    $query = "SELECT * FROM setup_module";
    $results = $con2->query($query);
    if ($results->num_rows > 0) {
        while ($data = $results->fetch_assoc())
        {
            $modules[] = $data;
        }
        return $modules;
    }
}

// add module data
function insert_offer($insert_offer_vars) {
    global $con;
    $type = $con->real_escape_string($insert_offer_vars['type']);
    $skus = $con->real_escape_string($insert_offer_vars['skus']);
    if(offer_exists($type) != true) {
        $query = "INSERT INTO offers (sku, type, date) VALUES ('{$skus}', '{$type}', NOW())";
    } else {
        $query = "UPDATE offers SET sku='{$skus}', date=NOW() WHERE type = '{$type}'";
    }
    $results = $con->query($query);
    echo 'Offer Added';
}

function offer_exists($type) {
    global $con;
    $query = "SELECT * FROM offers WHERE type = '{$type}'";
    $results = $con->query($query);
    if ($results->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function limit_text($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}