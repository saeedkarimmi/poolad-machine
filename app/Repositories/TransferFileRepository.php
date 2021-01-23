<?php

/**
 * Created by Saeed Km2.
 * Date: 01/12/2020
 * Time: 09:50 AM
 */


namespace App\Repositories;

use App\Models\Panel\ImportFileDetail;
use App\Models\Panel\TransferFile;
use App\Models\Panel\TransferImportFile;

class TransferFileRepository extends Repository implements RepositoryInterface
{
    public function create(array $data)
    {
        /** @var TransferFile $transferFile */
        $transferFile = parent::create($data);

        foreach ($data['transport_details'] as $transportDetail){
            $transferFile->details()->create([
                'container_id'  => $transportDetail['container_id'],
                'unit_price'    => $transportDetail['unit_price'],
                'count'         => $transportDetail['count'],
            ]);
        }

        foreach ($data['detail_ids'] as $importFileDetail){
            TransferImportFile::query()->create([
                'transfer_file_id' =>  $transferFile->id,
                'import_file_detail_id' => $importFileDetail
            ]);
        }

//        dd(2132);

        ImportFileDetail::query()->whereIn('id', $data['detail_ids'])->update([
            'documented' => true
        ]);
    }
}
