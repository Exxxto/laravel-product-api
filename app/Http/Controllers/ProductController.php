<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Product::query();

        // Фильтрация по свойствам
        if ($request->has('properties')) {
            foreach ($request->input('properties') as $propertyName => $values) {
                $query->whereHas('propertyValues', function ($q) use ($propertyName, $values) {
                    $q->whereIn('value', $values)
                        ->whereHas('property', function ($q) use ($propertyName) {
                            $q->where('name', $propertyName);
                        });
                });
            }
        }

        // Получаем товары с их свойствами
        $products = $query->with(['propertyValues.property'])->paginate(40);

        return response()->json($products);
    }
}
