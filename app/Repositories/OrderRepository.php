<?php

/**
 * Created by Saeed Km2.
 * Date: 01/12/2020
 * Time: 09:50 AM
 */


namespace App\Repositories;

use App\Models\Panel\Order;

class OrderRepository extends Repository implements RepositoryInterface
{
    /**
     * @param array $data
     * @return mixed
     * create a new record in the database
     */
    public function create(array $data)
    {
        /** @var Order $order */
        $order =  $this->model->create($data);
        foreach ($data['machine_models'] as $machineModel){
            //todo: use repository for create order details
            $order->details()->create($machineModel);
        }


    }
}
