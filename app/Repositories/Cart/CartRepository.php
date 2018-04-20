<?php
namespace App\Repositories\Cart;

use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Gate;
use Datatables;
use Carbon;
use Auth;
use DB;

/**
 * Class CartRepository
 * @package App\Repositories\Cart
 */
class CartRepository implements CartRepositoryContract
{
    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Cart::findOrFail($id);
    }

    /**
     * @param $requestData
     * @return static
     */
    public function create($order_id, $requestData)
    {
        $order = Order::findOrFail($order_id);
        $product= Product::findOrFail($requestData->product_id);
        $input = $requestData = array_merge(
            $requestData->all(),
            ['month' => $order->month,
                'year' => date("Y"),
                'client_id' => $order->client_id,
                'period_id' => $order->period_id,
                'order_id' => $order_id,
                'product_id' => $requestData->product_id,
                'user_id' => \auth::id(),
                'region_id' => $order->region_id,
                'total_price' => $product->price * $requestData->weight]
        );

        Cart::create($input);

        Session::flash('flash_message', 'Đặt hàng thêm sản phẩm thành công!');
    }

    /**
     * @param $id
     * @param $requestData
     * @return mixed
     */
    public function update($id, $requestData)
    {

    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        Cart::findorFail($id)->delete();
    }

    /**
     * Get products statistic
     */
    public function productsStatistic()
    {
        $product_1 = Cart::all()->where('product_id', 1)->sum('weight');
        $product_2 = Cart::all()->where('product_id', 2)->sum('weight');
        $product_3 = Cart::all()->where('product_id', 3)->sum('weight');
        $product_4 = Cart::all()->where('product_id', 4)->sum('weight');
        $product_5 = Cart::all()->where('product_id', 5)->sum('weight');
        $product_6 = Cart::all()->where('product_id', 6)->sum('weight');
        $product_7 = Cart::all()->where('product_id', 7)->sum('weight');
        $product_8 = Cart::all()->where('product_id', 8)->sum('weight');
        $product_9 = Cart::all()->where('product_id', 9)->sum('weight');
        $product_10 = Cart::all()->where('product_id', 10)->sum('weight');
        $product_11 = Cart::all()->where('product_id', 11)->sum('weight');
        $product_12 = Cart::all()->where('product_id', 12)->sum('weight');
        $product_13 = Cart::all()->where('product_id', 13)->sum('weight');
        $product_14 = Cart::all()->where('product_id', 14)->sum('weight');
        $product_15 = Cart::all()->where('product_id', 15)->sum('weight');
        $product_16 = Cart::all()->where('product_id', 16)->sum('weight');
        $product_17 = Cart::all()->where('product_id', 17)->sum('weight');
        $product_18 = Cart::all()->where('product_id', 18)->sum('weight');
        $product_19 = Cart::all()->where('product_id', 19)->sum('weight');
        $product_20 = Cart::all()->where('product_id', 20)->sum('weight');
        $product_21 = Cart::all()->where('product_id', 21)->sum('weight');
        $product_22 = Cart::all()->where('product_id', 22)->sum('weight');
        $product_23 = Cart::all()->where('product_id', 23)->sum('weight');
        $product_24 = Cart::all()->where('product_id', 24)->sum('weight');
        $product_25 = Cart::all()->where('product_id', 25)->sum('weight');
        $product_26 = Cart::all()->where('product_id', 26)->sum('weight');
        $product_27 = Cart::all()->where('product_id', 27)->sum('weight');
        $product_28 = Cart::all()->where('product_id', 28)->sum('weight');
        $product_29 = Cart::all()->where('product_id', 29)->sum('weight');
        $product_30 = Cart::all()->where('product_id', 30)->sum('weight');
        $product_31 = Cart::all()->where('product_id', 31)->sum('weight');
        $product_32 = Cart::all()->where('product_id', 32)->sum('weight');
        $product_33 = Cart::all()->where('product_id', 33)->sum('weight');
        $product_34 = Cart::all()->where('product_id', 34)->sum('weight');
        $product_35 = Cart::all()->where('product_id', 35)->sum('weight');
        $product_36 = Cart::all()->where('product_id', 36)->sum('weight');
        $product_37 = Cart::all()->where('product_id', 37)->sum('weight');
        $product_38 = Cart::all()->where('product_id', 38)->sum('weight');
        $product_39 = Cart::all()->where('product_id', 39)->sum('weight');
        $product_40 = Cart::all()->where('product_id', 40)->sum('weight');
        $product_41 = Cart::all()->where('product_id', 41)->sum('weight');
        $product_42 = Cart::all()->where('product_id', 42)->sum('weight');
        $product_43 = Cart::all()->where('product_id', 43)->sum('weight');
        $product_44 = Cart::all()->where('product_id', 44)->sum('weight');
        $product_45 = Cart::all()->where('product_id', 45)->sum('weight');
        $product_46 = Cart::all()->where('product_id', 46)->sum('weight');
        $product_47 = Cart::all()->where('product_id', 47)->sum('weight');
        $product_48 = Cart::all()->where('product_id', 48)->sum('weight');
        $product_49 = Cart::all()->where('product_id', 49)->sum('weight');
        $product_50 = Cart::all()->where('product_id', 50)->sum('weight');
        $product_51 = Cart::all()->where('product_id', 51)->sum('weight');
        $product_52 = Cart::all()->where('product_id', 52)->sum('weight');

        return collect([$product_1,
            $product_2,
            $product_3,
            $product_4,
            $product_5,
            $product_6,
            $product_7,
            $product_8,
            $product_9,
            $product_10,
            $product_11,
            $product_12,
            $product_13,
            $product_14,
            $product_15,
            $product_16,
            $product_17,
            $product_18,
            $product_19,
            $product_20,
            $product_21,
            $product_22,
            $product_23,
            $product_24,
            $product_25,
            $product_26,
            $product_27,
            $product_28,
            $product_29,
            $product_30,
            $product_31,
            $product_32,
            $product_33,
            $product_34,
            $product_35,
            $product_36,
            $product_37,
            $product_38,
            $product_39,
            $product_40,
            $product_41,
            $product_42,
            $product_43,
            $product_44,
            $product_45,
            $product_46,
            $product_47,
            $product_48,
            $product_49,
            $product_50,
            $product_51,
            $product_52
            ]);
    }
}
