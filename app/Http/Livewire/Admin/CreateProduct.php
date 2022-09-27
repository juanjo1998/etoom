<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use App\Models\Brand;
use App\Models\Order;
use App\Models\County;
use App\Models\Product;
use Livewire\Component;
use App\Models\Business;
use App\Models\Category;
use App\Models\Department;
use App\Models\FillingNumber;
use App\Models\Subcategory;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Contracts\Service\Attribute\Required;

class CreateProduct extends Component
{

    // ! $cities = [] , $counties = [] deben iniciar como un arreglo vacío, hasta que no seleccione un departamento no se va a llenar esta informacion, de lo contrario le dara error

    public $categories, $subcategories = [], $brands = [], $departments, $cities = [] , $counties = [];
    public $category_id = "", $subcategory_id = "", $brand_id = "", $department_id = "", $city_id = "", $county_id = "",$filling_number_id = "";
    public $name,$phone_number,$mail, $slug, $description, $price,$business_type;

    public $object;


    protected $rules = [
        'category_id' => 'required',
        'subcategory_id' => 'required',
        'name' => 'required',
        'phone_number' => 'required',
        'mail' => 'required',
        'slug' => 'required|unique:products',
        'description' => 'required',
        'business_type' => 'required',
        'filling_number_id' => 'required',
        'department_id' => 'required',
        'city_id' => 'required',
        'county_id' => 'required',
    ];

    public function updatedCategoryId($value){
        $this->subcategories = Subcategory::where('category_id', $value)->get();
        $this->reset(['subcategory_id']);
    }

    public function updatedDepartmentId($value){
        $this->cities = City::where('department_id', $value)->get();

        /* $this->counties = County::whereHas('cities', function(Builder $query) use ($value){
            $query->where('city_id', $value);
        })->get(); */

        $this->reset([ 'city_id', 'county_id']);
    }

    // ! metodo agregado

    public function updatedCityId($value)
    {
        $this->counties = County::where('city_id',$value)->get();
    }

    public function updatedName($value){
        $this->slug = Str::slug($value);
    }

    public function getSubcategoryProperty(){
        return Subcategory::find($this->subcategory_id);
    }

    public function mount(){

        // ! estas son tablas que no dependen de ninguna,por tanto puede traerse la informacion usando el metodo all()
        $this->categories = Category::all();
        $this->departments = Department::all();
        $this->filling_numbers = FillingNumber::all();

        // ! estas dos lineas no deben ir en este metodo, pues no debemos llenar el select con las ciudades y condados cuando aún no hemos seleccionado un departamento que es lo primero deberiamos hacer
       /*  $this->cities = City::all();
        $this->counties = County::all(); */

    }


    public function save(){

        $rules = $this->rules;

        $this->validate($rules);

        $product = new Product();

        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->description = $this->description;
        $product->phone_number = $this->phone_number;
        $product->mail = $this->mail;

        // ! price no está en el formulario y es obligatorio, en las migraciones tuve que dejarlo en nullable()
        $product->subcategory_id = $this->subcategory_id;
        $product->department_id = $this->department_id;
        $product->city_id = $this->city_id;
        $product->county_id = $this->county_id;
        $product->filling_number_id = $this->filling_number_id;
        $product->business_type = $this->business_type;

        // ! linea agregada

        $product->user_id = auth()->user()->id;
        $product->save();

        //return $product;

        return redirect()->route('admin.products.edit',$product);


        /* $order = new Order();

        $order->name = $this->name;
        $order->slug = $this->slug;
        $order->description = $this->description;

        // ! price no está en el formulario y es obligatorio, en las migraciones tuve que dejarlo en nullable()
        $order->subcategory_id = $this->subcategory_id;
        $order->department_id = $this->department_id;
        $order->city_id = $this->city_id;
        $order->county_id = $this->county_id;
        $order->business_id = $this->business_id;
        $order->filling_number = $this->filling_number;

        // ! linea agregada

        $order->user_id = auth()->user()->id;
        $order->save();
        
        return redirect()->route('admin.test',$order);  */

    }

    public function render()
    {
        return view('livewire.admin.create-product')->layout('layouts.admin');
    }
}