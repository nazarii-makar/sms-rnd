<?php

namespace App\Listeners;

use App\Events\ImageDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class DeleteImageFromDepositphotos implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(ImageDeleted $event)
    {
        Storage::disk('depositphotos')->delete($event->image()->filename);
    }
}
