<?php

function printR($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function dataArr($data, $variable) {
    return isset($data[$variable]) ? $data[$variable] : null;
}

function dataObj($data, $variable) {
    return isset($data->$variable) ? $data->$variable : null;
}