<?php
namespace App\Repositories\Order;

interface OrderRepositoryContract
{
    
    public function find($id);
    
    public function getAllOrders();

    public function create($requestData);

    public function update($id, $requestData);

    public function destroy($request, $id);
}
