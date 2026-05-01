<?php

namespace App\Actions;
use App\Models\Item;
use Illuminate\Http\Request;
class UpdateItemAction
{
    /**
     * Create a new class instance.
     */
    public function __invoke(Request $request, Item $item)
{
    // حذفنا سطر findOrFail لأن $item موجودة كبارامتر جاهز
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        
        'stock_flag' => 'required|boolean',
        // 'stock_flag' => 'boolean', 
        'image' => 'nullable|url',
    ]);

    $item->update($validatedData);

    return $item->fresh();
}
}
