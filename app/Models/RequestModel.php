<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestModel extends Model
{
    protected $table = 'requests';
    protected $guarded = [];
    protected $casts = [
        'request_date' => 'datetime:d M Y, h:i A',
    ];

    public function detail()
    {
        return $this->hasOne(RequestDetail::class, 'request_id', 'id');
    }
}
