<?php

namespace App\Actions;
use App\Models\Item;
class IndexItemAction
{
    /**
     * Create a new class instance.
     */
    public function __invoke() { return Item::all(); }
}
