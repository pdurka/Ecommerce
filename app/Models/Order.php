<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\OrderCreatedEvent;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['value', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $dispatchesEvents = [
        "created" => OrderCreatedEvent::class,
    ];
}
