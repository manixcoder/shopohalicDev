<?php
    $segments = request()->segments();
    $query_str= (!empty($segments[0]))? $segments[0] : '';
    $query_str1= (!empty($segments[1]))? $segments[1] : '';
    $query_str2= (!empty($segments[2]))? $segments[2] : '';
?>
        <div class="marcntsidebar-menu">
          <ul class="menu_box">
            <li @if(in_array($query_str,array('merchant')) && $query_str1=='') class="active" @endif><a href="{{ url('merchant') }}">Dashboard</a></li>
            <li @if(in_array($query_str1,array('order-management'))) class="active" @endif><a href="{{ url('merchant/order-management') }}">Orders</a></li>
            <li @if(in_array($query_str1,array('products-management'))) class="active" @endif><a href="{{ url('merchant/products-management') }}">Products</a></li>
          <!--   <li><a href="{{ url('merchant/special-price-management') }}">Special Price</a></li> -->
            <li @if(in_array($query_str1,array('account-management')) && $query_str2=='') class="active" @endif><a href="{{ url('merchant/account-management') }}">My Account</a></li>
            <li @if(in_array($query_str2,array('change-password'))) class="active" @endif><a href="{{ url('merchant/account-management/change-password') }}">Change Account</a></li>
          </ul>
        </div>