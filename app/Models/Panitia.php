<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bidang;
use App\Models\SubBidang;

class Panitia extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidang_id', 'id');
    }
    public function sub_bidang()
    {
        return $this->belongsTo(SubBidang::class, 'sub_bidang_id', 'id');
    }
}
