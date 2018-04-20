<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Client;
use App\Models\Order;
use App\Models\Period;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\Order\OrderRepositoryContract;
use App\Repositories\Cart\CartRepositoryContract;
use Datatables;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    protected $orders;
    protected $carts;

    public function __construct(
        OrderRepositoryContract $orders,
        CartRepositoryContract $carts
    )
    {
        $this->orders = $orders;
        $this->carts = $carts;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.index')
            ->withOrders(Order::all())
            ->withProductsStatistic($this->carts->productsStatistic());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create')
            ->withPeriods(Period::all()->pluck('name', 'id'))
            ->withClients(Client::all()->pluck('codeAndName', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getInsertedId = $this->orders->create($request);

        return redirect()->route("orders.show", $getInsertedId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.show')
            ->withOrder($order)
            ->withCarts($order->carts)
            ->withProducts(Product::all()->pluck('codeAndPrice', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * List all orders
     * @return mixed
     */
    public function orderData()
    {
        $orders = Order::with(['client', 'period', 'user'])->select(
            ['id', 'month', 'client_id', 'period_id', 'user_id']
        )->orderBy('id', 'desc');

        return Datatables::of($orders)
            ->addColumn('month', function ($orders) {
                return $orders->month;
            })
            ->editColumn('period', function ($orders) {
                return $orders->period->name;
            })
            ->editColumn('client', function ($orders) {
                return $orders->client->code . ' - ' . $orders->client->name;
            })
            ->editColumn('user', function ($orders) {
                return $orders->user->name;
            })
            ->editColumn('total_weight', function ($orders) {
                return number_format($orders->carts->sum('weight'), 0);
            })
            ->editColumn('total_price', function ($orders) {
                return number_format($orders->carts->sum('total_price'), 0);
            })->make(true);
    }

    /**
     * List all products
     * @return mixed
     */
    public function productData()
    {
        $carts = Cart::with(['product','client', 'period', 'user'])->select(
            ['carts.id', 'carts.month', 'carts.year', 'carts.period_id', 'carts.client_id','carts.order_id', 'carts.user_id', 'carts.product_id', 'carts.weight', 'carts.total_price']
        )->orderBy('carts.created_at', 'desc');

        return Datatables::of($carts)
            ->addColumn('month', function ($carts) {
                return $carts->year . '/' . $carts->month;
            })
            ->editColumn('period', function ($carts) {
                return $carts->period->name;
            })
            ->editColumn('client', function ($carts) {
                return $carts->client->code . ' - ' . $carts->client->name;
            })
            ->addColumn('user', function ($carts) {
                return $carts->user->code . ' - ' . $carts->user->name;
            })
            ->editColumn('product', function ($carts) {
                return $carts->product->code;
            })
            ->editColumn('weight', function ($carts) {
                return number_format($carts->weight, 0);
            })
            ->editColumn('total_price', function ($carts) {
                return number_format($carts->total_price, 0);
            })
            ->make(true);
    }
}
