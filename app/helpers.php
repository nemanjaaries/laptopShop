<?php

function displayAmount($amount){
    return '$' . number_format($amount, 2, '.', ',');
}

function setCategoryActive($category){
    return request()->category == $category? 'font-weight-bold': '';
}