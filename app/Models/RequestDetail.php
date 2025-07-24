<?php

namespace App\Models;

use App\Models\RequestModel;
use Illuminate\Database\Eloquent\Model;

class RequestDetail extends Model
{
    protected $table = 'request_details';
    protected $guarded = [];

    public function request()
    {
        return $this->belongsTo(RequestModel::class);
    }

}
