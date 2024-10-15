<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Discount;
class DashboardController extends Controller
{
    public function __invoke()
    {
        $user = User::orderBy('id', 'desc')->count();
        $products = Product::orderBy('id', 'desc')->count();
        $discount = Discount::orderBy('id', 'desc')->count();
        
        return view('admin.dashboard', compact('user','products','discount'));
    }
    function getUser()  {
   
        $users = User::orderBy('id', 'desc')->get();
        return response()->json($users);
    }
   
}
