<?php

namespace App\Listeners;

use App\Events\ImageDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class DeleteImageFromShutterstock implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(ImageDeleted $event)
    {
        Storage::disk('shutterstock')->delete($event->image()->filename);
    }
}
