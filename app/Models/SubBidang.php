<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bidang;

class SubBidang extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function bidang(){
        return $this->belongsTo(Bidang::class, 'bidang_id', 'id');
    }
}
