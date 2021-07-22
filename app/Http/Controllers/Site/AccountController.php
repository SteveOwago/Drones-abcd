<?php

namespace App\Http\Controllers\Site;

use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Auth;

class AccountController extends BaseController
{
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
    public function getOrders()
    {
        $orders = auth()->user()->orders;

        return view('site.pages.account.orders', compact('orders'));
    }

    public function getProfile(){
        $profiles = User::where('id','=', auth::id())->get();


        return view('site.pages.account.profile', compact('profiles'));
    }
    public function show($orderNumber)
    {
        $order = $this->orderRepository->findOrderByNumber($orderNumber);

        $this->setPageTitle('Order Details', $orderNumber);
        return view('site.pages.account.order', compact('order'));
    }
}
