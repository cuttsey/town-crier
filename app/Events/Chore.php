<?php namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Chore extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $data;

    public function __construct($action)
    {
        if (! is_null($action)) {
            $this->data = [
                'action' => $action
            ];
        }
    }

    public function broadcastOn()
    {
        return ['town-crier'];
    }
}
