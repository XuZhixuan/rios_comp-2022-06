<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class Resource extends JsonResource
{
    protected bool $is_collection;

    public function __construct($resource)
    {
        $this->is_collection = Str::of(
            Route::current()->getName()
        )->explode('.')->last() === 'index';
        parent::__construct($resource);
    }
}
