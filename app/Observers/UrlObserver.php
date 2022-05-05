<?php

namespace App\Observers;

use App\Models\Url;
use Illuminate\Support\Str;

class UrlObserver
{
    /**
     * Handle the Url "creating" event.
     *
     * @param  \App\Models\Url  $url
     * @return void
     */
    public function creating(Url $url)
    {
        $url->uuid = Str::uuid();
        $url->user_id = auth()->check() ? auth()->user()->id : '';
    }
}
