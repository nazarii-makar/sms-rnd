<?php

namespace App\Events;

use App\Models\Image;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ImageCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var Image */
    private $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    public function image(): Image
    {
        return $this->image;
    }
}
