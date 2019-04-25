<?php

namespace App\Listeners;

use App\Events\ImageCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class PutImageToDepositphotos implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(ImageCreated $event): void
    {
        Storage::disk('depositphotos')->put(
            $event->image()->filename,
            fopen($event->image()->filepath, 'r+')
        );
    }
}
