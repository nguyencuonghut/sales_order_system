<?php
namespace App\Repositories\Order;

use App\Models\Order;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;
use Gate;
use Datatables;
use Carbon;
use Auth;
use DB;

/**
 * Class OrderRepository
 * @package App\Repositories\User
 */
class OrderRepository implements OrderRepositoryContract
{

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Order::findOrFail($id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllOrders()
    {
        return Order::all();
    }

    /**
     * @param $requestData
     * @return static
     */
    public function create($requestData)
    {
        $input = $requestData = array_merge(
            $requestData->all(),
            ['user_id' => auth()->id(),
                'month' => date('m'),
            ]
        );

        $order = Order::create($input);
        Session::flash('flash_message', 'Tác vụ hoàn thành!');
        return $order->id;
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
    public function destroy($request, $id)
    {

    }
}
