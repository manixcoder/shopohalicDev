<?php
if (!function_exists('getCategory')) {
    function getCategory() {
        return \App\Models\category::get()->toArray();
    }
}
if (!function_exists('getBanner')) {
    function getBanner() {
        return \App\Models\Banner::get()->toArray();
    }
}
if (!function_exists('getSession')) {
    function getSession() {
        return session()->getId();
    }
}
if (!function_exists('countUserItem')) {
    function countUserItem() {
        return \App\Models\CartItem::where('ip_address',$_SERVER['REMOTE_ADDR'])->get()->count();
    }
}
?>