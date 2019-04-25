<?php

namespace App\Listeners;

use App\Events\ImageDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class DeleteImageFromBigstock implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(ImageDeleted $event)
    {
        Storage::disk('bigstock')->delete($event->image()->filename);
    }
}
