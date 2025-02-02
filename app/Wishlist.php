<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use webpatser\Uuid\Uuid;

class Wishlist extends Model
{
    //use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table ='wishlists';
     protected $fillable = [
        'channel_id',
        'product_id',
        'customer_id',
        'item_options',
        'moved_to_cart',
        'shared',
        'time_of_moving',
    ];
}
