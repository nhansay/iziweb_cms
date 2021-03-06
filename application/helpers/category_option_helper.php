<?php
/**
 * Created by PhpStorm.
 * User: nhansay
 * Date: 05/02/2015
 * Time: 23:26
 */
function category_option($categories = array(), $selected = 0, $level = 0, $parent = 0) {
    $cat_tmp = array();
    foreach ($categories as $key=>$value) {
        if ($value['parent_id'] == $parent) {
            $cat_tmp[] = $value;
            unset($categories[$key]);
        }
    }

    if (!empty($cat_tmp)) {
        foreach ($cat_tmp as $item) {
            if ($selected != 0 && $item['id'] == $selected) {
                echo '<option selected value="'.$item['id'].'">'.level($level).$item['name'].'</option>';
            }
            else echo '<option value="'.$item['id'].'">'.level($level).$item['name'].'</option>';
            category_option($categories, $selected, ($level+1), $item['id']);
        }
    }
}
function level($level = 0) {
    $str = '';
    if ($level != 0) {
        for ($i = 0; $i < $level; $i ++) {
            $str .= '— ';
        }
    }
    return $str;
}