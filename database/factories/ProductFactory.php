<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_name= $this->faker->unique()->sentence();
        return [
            'name' => $product_name,
            'slug' => Str::slug($product_name),
            'short_description'=> $this->faker->text(200),
            'description'=> $this->faker->text(500),
            'regular_price'=>$this->faker->numberBetween(10,500),
            'stock_status' => 'instock',
            'quantity' => $this->faker->numberBetween(100,200),
            'image' =>  null,
            'category_id' => rand(1,10),
        ];
    }
}
