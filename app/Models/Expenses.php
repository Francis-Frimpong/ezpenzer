<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Expenses extends Model
{
    //
    protected $fillable = ['amount', 'category','description'];

    public  function user()
    {
        return $this->belongsTo(Expenses::class);

    }
    
}
