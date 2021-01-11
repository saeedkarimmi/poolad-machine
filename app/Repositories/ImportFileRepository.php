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
                'order_detail_id' => $orderDetail['order_detail_id']
            ]);
        }

        OrderDetail::query()->whereIn('id', $data['order_details'])->update([
            'documented' => true
        ]);
    }
}
