<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SblTeams extends Model
{
    use HasFactory;
    //protected $fillable = ['name']; //白名單:可以改的
    //protected $guarded = ['total_win']; //黑名單:不能改的
    //protected $hidden = ['total_lost']; //隱藏起來的
    /*
    protected $appends = ['current_price']; //自訂功能 功能名稱叫做 current_price
    public function getCurrentPriceAttribute()
    {
        return $this->quantity * 10;
    }
    */
    //protected $fillable = [''];//全部都是白名單:全部都是可以改的
}
