<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $active = 1;
    public $search;
    public $sortField;
    public $sortAsc = true;

    public function updatingSearch(){
        $this->resetPage();
    }
    public function sortBy($field){
        if($this->sortField == $field){
            $this->sortAsc = !$this->sortAsc;
        }else{
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }
    public function render()
    {
        return view('livewire.orders',
            ['orders'=>Order::with('user', 'orderdetails', 'user.photos', 'orderdetails.product', 'orderdetails.product.photos')

            ->when($this->sortField,function($query){
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })
            /*  -> where(function($query){
                   $query->where('transaction_code', 'like', '%' . $this->search .'%')
                       ->orWhereHas('user', function($query) {
                            $query->where('username');
                       });
               })*/
           ->paginate(15)

        ]);
    }
}
