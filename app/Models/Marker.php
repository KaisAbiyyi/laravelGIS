<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Marker extends Model
{
    public function allData()
    {
        $result = DB::table('markers')
            ->select('name', 'latitude', 'longitude')
            ->get();
        return $result;
    }
}
