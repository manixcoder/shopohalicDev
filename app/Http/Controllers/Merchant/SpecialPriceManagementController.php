<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use App\Models\Products;
use App\Models\PhotoImaage;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Shipping;
use App\Models\Size;
use Auth;
use DB;
use Illuminate\Session\SessionManager;

class SpecialPriceManagementController extends Controller
{
    protected $session;
    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }
    public function index()
    {

        $categories=Category::get();
        $products=Products::select('products.*','category.category_name')->join('category','category.id','=','products.category')->get()->toArray();
       
        
        return view('merchant.special-price.index')->with(array('categories'=>$categories,'products' =>$products));
    }
}
