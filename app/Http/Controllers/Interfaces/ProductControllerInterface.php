<?php

namespace App\Http\Controllers\Interfaces;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

interface ProductControllerInterface
{
    public function index(): ProductCollection;
    public function store(StoreProductRequest $request): JsonResponse;
    public function show(Product $product): ProductResource;
    public function update(UpdateProductRequest $request, Product $product): ProductResource;
    public function destroy(Product $product): JsonResponse;
}
