<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    protected $table = 'feedbacks';

    protected $fillable = [
        'user_id',
        'product_id',
        'content',
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function product(){

        return $this->belongsTo(Product::class);
    }
}
