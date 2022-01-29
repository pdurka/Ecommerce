<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\OrderCreatedEvent;

class OrderCreatedEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderCreatedEvent  $event
     * @return void
     */
    public function handle(OrderCreatedEvent $event)
    {
        // to do add ++ order on user
//        $details = [
//            'title' => 'Successfully created category ' . $event->categorie->name . ' country '. $event->categorie->country,
//            'body' => 'Categorie ' . $event->categorie->name . ' country ' . $event->categorie->country . ' created successfully. Id categorie ' . $event->categorie->categories_id,
//        ];

    }
}
