<?php

namespace App\Actions;
use App\Models\Item;
use Illuminate\Http\Request;
class StoreItemAction
{
    /**
     * Create a new class instance.
     */
    public function __invoke(Request $request)

    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock_flag' => 'boolean',
            'image' => 'nullable|url',
        ]);
        return Item::create($validatedData);
    }
}
