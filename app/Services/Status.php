<?php

namespace App\Services;

use App\Models\Status as StatusModel;

class Status
{
    public function get()
    {
        $status = StatusModel::orderBy('code')->get();

        $array = [];
        foreach ($status as $item)
            $array[$item->id] = $item->name;
        
        return $array;
    }
}