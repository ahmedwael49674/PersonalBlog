<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait RemoveImage
{
    /**
     * check category logo if exist remove it
     *
    */
    public function RemoveLogoIfExist($object)
    {
        if (Storage::disk('public')->exists($object->image)) {
            Storage::disk('public')->delete($object->image);
        }
    }  

}