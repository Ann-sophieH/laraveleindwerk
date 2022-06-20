<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Specification;
use App\Models\Type;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    public $search;

    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['specifications','maxPrice', 'colorsfilter', 'category', 'type']; //om in link vanboven te zetten

    public $specifications;
    public $category;
    public $colorsfilter;
    public $type;
    public $maxPrice;

    protected $listeners = [
    'search' => 'searchProduct',

    ];
    public function searchProduct($searchbar){
     //   dd($searchbar);
        $this->search = $searchbar;
    }
    public function addToCart( $id){
        $product = Product::with(['specifications', 'colors', 'category', 'photos'])->where('id', $id)->first();
        $oldCart = Session::has('cart') ? Session::get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->addItem($product, $id);
        $this->emit('productAdded');
        Session::flash('cart_message',  $product->name .'  has been added to the cart successfully!');//

        Session::put('cart',$cart);
        //return redirect()->back();
    }



    public function mount(): void
    {
        $this->search = request()->query('search', $this->search);
    }
    public function updatedSpecifications()// to filter out all unchecked boxes (cause they dont go out of the array but are set to false!)
    {
        if (!is_array($this->specifications)) return;

        $this->specifications = array_filter($this->specifications, function ($specifications) {
            return $specifications != false;
        });
    }
    public function updatedColorsfilter()// to filter out all unchecked boxes (cause they dont go out of the array but are set to false!)
    {
        if (!is_array($this->colorsfilter)) return;

        $this->colorsfilter = array_filter($this->colorsfilter, function ($colorsfilter) {
            return $colorsfilter != false;
        });
    }
    public function updatedType()// to filter out all unchecked boxes (cause they dont go out of the array but are set to false!)
    {
        if (!is_array($this->type)) return;

        $this->type = array_filter($this->type, function ($type) {
            return $type != false;
        });
    }
    public function render()
    {
            return view('livewire.products', [
                'products'=>Product::with(['photos', 'colors'])
                    ->where(function($query){ //dd($this->search);
                        $query->where('name', 'like', '%' . $this->search .'%')
                            ->orWhere('price','like', '%' . $this->search .'%')
                            ->orWhere('details','like', '%' . $this->search .'%')
                            ->orWhereHas('category', function ($query){ //query tussentabel
                                $query->where('name', 'like', '%' . $this->search .'%'); // add specs etc
                            })
                            ->orWhereHas('specifications', function ($query){ //query tussentabel
                                $query->where('name', 'like', '%' . $this->search .'%'); // add specs etc
                            })
                            ->orWhereHas('colors', function ($query){ //query tussentabel
                                $query->where('name', 'like', '%' . $this->search .'%'); // add specs etc
                            })
                        ;
                    })
                    ->when($this->maxPrice, function ($query) {
                         $query->where( 'price' , '<=',  $this->maxPrice);
                    })
                    ->when($this->specifications, function ($query){
                        foreach ($this->specifications as $k => $v){
                         $query->whereHas('specifications', function($query) use ($k){
                                $query->where('name', $k);
                            });
                        }
                    })
                    ->when($this->colorsfilter, function ($query){
                        foreach ($this->colorsfilter as $k => $v){
                            $query->whereHas('colors', function($query) use ($k){
                                $query->where('name', $k);
                            });
                        }
                    })
                    ->when($this->category, function ($query){
                        $query->where('category_id', $this->category);
                    })
                    ->when($this->type, function ($query){
                        foreach ($this->type as $k => $v){
                            $query->whereHas('types', function($query) use ($v){
                                $query->where('type_id', $v);
                            });
                        }
                    })
                    ->paginate(25),

                'specs'=> Specification::whereNull('parent_id')->with( 'childspecs')->get(),
                'product'=>null,
                'types'=> Type::with('photo')->where('category_id' , $this->category)->get(),
                'colors'=>Color::all()
            ])->extends('layouts.index');
        }




}
