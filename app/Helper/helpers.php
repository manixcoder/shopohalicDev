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
if (!function_exists('leftItem')) {
    function leftItem($product_id=null) {
        return \App\Models\ProductTotalSalesRecord::where('product_id',$product_id)->value('left_quantity');
    }
}
if (!function_exists('generateRandomStringToken')) {
    function generateRandomStringToken($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
if (!function_exists('deliveryDays')) {
    function deliveryDays($shipping_id)
    {
        return \App\Models\Shipping::where('id',$shipping_id)->value('expected');
    }
}

?>