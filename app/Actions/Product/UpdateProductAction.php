<?php

namespace App\Actions\Product;

use App\Models\Product;

class UpdateProductAction
{
    public function execute(Product $product, array $data): bool
    {
        return $product->update($data);
    }
}