<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Size;



class GeneralController extends Controller
{
     public function getSubCategory(Request $request){
       $category = $request->get('id');
       $result=Category::select('id','category_name')->where('parent_id', $category)->get();
       return json_encode($result);
    }
    public function getBrand(Request $request){
       $type = $request->get('type');
       $category = $request->get('category');
       if($type=='category')
       {
        $result=Brand::select('id','brand_name')->where('category_id', $category)->get(); 
       }
       elseif($type=='sub_category'){
         $result=Brand::select('id','brand_name')->where('sub_category_id', $category)->get();
       }else{
        $result=Brand::select('id','brand_name')->get();
    }      
       return json_encode($result);
    } 
    public function getSize(Request $request){
       $brand_id = $request->get('brand_id'); 
       $category_id = $request->get('category_id');
       $sub_category_id = $request->get('sub_category_id');   
       if($sub_category_id=='') 
       {
        $sub_category_id=0;
       }
       if($brand_id!='')
       {
        $result=Size::select('id','size_name')->where('brand_id',$brand_id)->where('category_id',$category_id)->where('sub_category_id',$sub_category_id)->get(); 
       }
       else{
        $result=Brand::select('id','brand_name')->get();
    }      
       return json_encode($result);
    }     
}
