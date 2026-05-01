<?php

namespace App\Actions;
use App\Models\Item;

class DestroyItemAction
{
    /**
     * Create a new class instance.
     */
    public function __invoke(string $id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
    }
}
