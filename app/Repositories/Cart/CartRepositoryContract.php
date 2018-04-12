<?php
namespace App\Repositories\Cart;

interface CartRepositoryContract
{
    
    public function find($id);

    public function create($order_id, $requestData);

    public function update($id, $requestData);

    public function destroy($request, $id);
}
