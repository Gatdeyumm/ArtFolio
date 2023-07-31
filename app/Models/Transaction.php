<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['date'];
    protected $dates = ['transaction_date'];

    public function client() {
        return $this->belongsTo('App\Models\Client');
    }

    public function getDateAttribute() {
        return $this->created_at->format('F d, Y g:i A');
    }

    // protected $fillable = [
    //     'artwork_id',
    //     'buyer',
    //     'amount',
    //     'transaction_date',
    //     'status',
    //     'payment_method',
    // ];

    // protected $dates = ['transaction_date'];

    // public function artwork()
    // {
    //     return $this->belongsTo(Artwork::class);
    // }

}
