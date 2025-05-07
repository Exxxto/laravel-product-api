<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Property;
use App\Models\ProductPropertyValue;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Примеры свойств
        $properties = [
            'Цвет' => ['Красный', 'Зелёный', 'Синий'],
            'Бренд' => ['Samsung', 'Xiaomi', 'LG'],
            'Материал' => ['Металл', 'Пластик', 'Стекло'],
        ];

        // Создаем свойства в базе
        $propertyModels = [];
        foreach ($properties as $name => $values) {
            $propertyModels[$name] = Property::create(['name' => $name]);
        }

        // Создаем товары
        for ($i = 1; $i <= 20; $i++) {
            $product = Product::create([
                'name' => 'Товар ' . $i,
                'price' => rand(1000, 10000),
                'quantity' => rand(1, 50),
            ]);

            // Присваиваем случайные значения свойств
            foreach ($propertyModels as $name => $property) {
                ProductPropertyValue::create([
                    'product_id' => $product->id,
                    'property_id' => $property->id,
                    'value' => $properties[$name][array_rand($properties[$name])],
                ]);
            }
        }
    }
}

