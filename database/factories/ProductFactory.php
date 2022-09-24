<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\County;
use App\Models\Product;

use App\Models\Department;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


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

        $name = $this->faker->sentence(2);
      
        $subcategory = Subcategory::all()->random();
        $category = $subcategory->category; 

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(),
            'filling_number' => '012345678',
            'business_id' => $this->faker->randomElement([1,2]),
            'subcategory_id' => $subcategory->id,            
            'user_id' => $this->faker->randomElement([1,2]),
            // ! campos agregados  que generan un id aleatorio de departamento ciudad y condado para cada uno de los productos
            'department_id' => Department::all()->random(),
            'city_id' => City::all()->random(),
            'county_id' => County::all()->random(),
            'status' => 2
        ];
    }
}
