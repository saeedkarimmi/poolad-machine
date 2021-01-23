<?php

/**
 * Created by Saeed Km2.
 * Date: 01/12/2020
 * Time: 09:50 AM
 */


namespace App\Repositories;

use App\Models\Panel\ImportFile;
use App\Models\Panel\OrderDetail;

class ImportFileRepository extends Repository implements RepositoryInterface
{
    public function create(array $data)
    {
        /** @var ImportFile $importFile */
        $importFile = parent::create($data);

        foreach ($data['order_details'] as $orderDetail){
            $importFile->details()->create([
                'order_detail_id'   => $orderDetail['order_detail_id'],
                'FOB_price'         => $orderDetail['FOB_price'],
                'serial_number'     => $orderDetail['serial_number'],
            ]);
        }

        $order_detail_ids = collect($data['order_details'])->pluck('order_detail_id')->toArray();
        OrderDetail::query()->whereIn('id', $order_detail_ids)->update([
            'documented' => true
        ]);
    }
}
