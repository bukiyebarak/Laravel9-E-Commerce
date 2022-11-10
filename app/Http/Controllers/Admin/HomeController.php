<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public static function headerMessage()
    {
        return Message::select('name', 'subject', 'created_at')->orderByDesc('id')->get();
    }

    public static function countMessage()
    {
        return Message::count();
    }
    public static function countUser()
    {
        return User::count();
    }
    public static function countOrder()
    {
        return Order::count();
    }
    public static function sumOrderTotal()
    {
        return Order::sum('total');
    }
}
