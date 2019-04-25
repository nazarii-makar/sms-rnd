<?php

declare(strict_types=1);

namespace App\Observers;


use App\Events\ImageCreated;
use App\Events\ImageDeleted;
use App\Models\Image;

class ImageObserver
{
    public function created(Image $image): void
    {
        event(new ImageCreated($image));
    }

    public function deleted(Image $image): void
    {
        event(new ImageDeleted($image));
    }
}
