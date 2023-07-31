<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['balance', 'picUrl'];

    public function getPicUrlAttribute() {
        $url = $this->pic ? asset("images/product_pics/" . $this->pic) : "https://m.media-amazon.com/images/I/81tVJIZIYzL._AC_SL1500_.jpg";
        return $url;
    }

    public function transactions() {
        return $this->hasMany('App\Models\Transaction');
    }

    public function getBalanceAttribute() {
        $balance = $this->initial_deposit;
        foreach($this->transactions as $tr) {
            if($tr->deposit) {
                $balance += $tr->amount;
            }else {
                $balance -= $tr->amount;
            }
        }

        return number_format($balance,2);
    }

}
