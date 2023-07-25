<?php

namespace App\Observers;

use App\Models\DetailHakcipta;
use Illuminate\Support\Facades\Storage;

class AjuanObserver
{
    /**
     * Handle the DetailHakcipta "created" event.
     */
    public function created(DetailHakcipta $detailHakcipta): void
    {
        //
    }

    /**
     * Handle the DetailHakcipta "updated" event.
     */
    public function updated(DetailHakcipta $detailHakcipta): void
    {
        //
    }

    /**
     * Handle the DetailHakcipta "deleted" event.
     */
    public function deleted(DetailHakcipta $detailHakcipta): void
    {
        if (Storage::exists('attachment-hakcipta_'.$detailHakcipta->id)) {
            Storage::deleteDirectory('attachment-hakcipta_'.$detailHakcipta->id);
        }
    }

    /**
     * Handle the DetailHakcipta "restored" event.
     */
    public function restored(DetailHakcipta $detailHakcipta): void
    {
        //
    }

    /**
     * Handle the DetailHakcipta "force deleted" event.
     */
    public function forceDeleted(DetailHakcipta $detailHakcipta): void
    {
        //
    }
}
