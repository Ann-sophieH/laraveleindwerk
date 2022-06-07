<?php

namespace App\Http\Livewire;

use App\Models\Color;
use Livewire\Component;
use Livewire\WithPagination;

class Colors extends Component
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
        return view('livewire.colors',  ['colors'=>Color::
            where(function($query){
                $query->where('name', 'like', '%' . $this->search .'%')
                    ->orWhere('hex_value','like', '%' . $this->search .'%');
            })
            //->with(['photo','categories','user'])
            ->when($this->sortField,function($query){
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })
            ->withTrashed()->paginate(10)

        ]);
    }
}
