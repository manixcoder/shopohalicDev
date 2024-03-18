<?php
    $segments = request()->segments();
    $query_str= (!empty($segments[0]))? $segments[0] : '';
    $query_str1= (!empty($segments[1]))? $segments[1] : '';
    $query_str2= (!empty($segments[2]))? $segments[2] : '';
?>
     
<div class="marcntsidebar-menu">
    <ul class="menu_box">
      <li @if($query_str=='admin' && $query_str1=='') class="active" @endif><a href="{{ url('admin') }}">Dashboard</a></li>
      <li @if($query_str1=='marchant-management') class="active" @endif><a href="{{ url('admin/marchant-management') }}">Merchants</a></li>
      <li @if($query_str1=='users-management') class="active" @endif><a href="{{ url('admin/users-management') }}">Users</a></li>
      <li @if($query_str1=='subscribers') class="active" @endif><a href="{{ url('admin/subscribers') }}">Subscribers</a></li>
      <li @if($query_str1=='category') class="active" @endif><a href="{{ url('admin/category') }}">Category</a></li>
      <li @if($query_str1=='brands') class="active" @endif><a href="{{ url('admin/brands') }}">Brand</a></li>
      <!-- <li><a href="{{ url('admin/colors') }}">Color</a></li>
      <li><a href="{{ url('admin/sizes') }}">Size</a></li> -->
      <li @if($query_str1=='orderstatus') class="active" @endif><a href="{{ url('admin/orderstatus') }}">Order Status</a></li>
      <li @if($query_str1=='commission') class="active" @endif><a href="{{ url('admin/commission') }}">Commission</a></li>
      <li @if($query_str1=='order-settings') class="active" @endif><a href="{{ url('admin/order-settings') }}">Order Settings</a></li>
      <li @if($query_str1=='invoice-template') class="active" @endif><a href="{{ url('admin/invoice-template') }}">Invoice Template</a></li>
      <li @if($query_str1=='banner') class="active" @endif><a href="{{ url('admin/banner') }}">Banner</a></li>
    </ul>
  </div>
  <div style="clear: both;"></div>