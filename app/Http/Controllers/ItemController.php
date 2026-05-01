<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Actions\IndexItemAction;
use App\Actions\StoreItemAction;
use App\Actions\UpdateItemAction;
use App\Actions\DestroyItemAction;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexItemAction $indexItemAction)
    {
        $items = $indexItemAction();
        return response()->json($items);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemAction $storeItemAction, Request $request)
    {
        $item = $storeItemAction($request);
        return response()->json($item, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::findOrFail($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item, UpdateItemAction $updateItemAction)
{
    
    $updatedItem = $updateItemAction($request, $item);
    
    return response()->json($updatedItem);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id,DestroyItemAction $destroyItemAction)
    {
        $item = $destroyItemAction($id);
        return response()->json(null, 204);
    }
}
