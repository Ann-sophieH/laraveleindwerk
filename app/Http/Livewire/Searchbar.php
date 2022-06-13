<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Searchbar extends Component
{
    public $searchbar;
    protected $queryString = ['searchbar']; //om in link vanboven te zetten

    public function search(){
       // dd($this->searchbar);
        $this->emit('search', $this->searchbar);
      // return $this->redirect('/products');
    }

    public function render()
    {
        return <<<'blade'
            <div>
              <a class="nav-link dropdown-toggle text-muted" href="" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-search text-muted" style="font-size: 1.3rem;"></i>
                    </a>
                     <div class="dropdown-menu mt-0 br-none p-2 border-0" aria-labelledby="navbarDropdownMenuLink">
                        <div class="input-group mb-1">
                            <input  wire:model.defer="searchbar" class="form-control fs-li text-center " type="search" placeholder="What are you looking for? ..." aria-label="Search" aria-describedby="button-addon3">
                            <button class="btn btn-outline-secondary" wire:click="search" type="button" id="button-addon3"><i class="bi bi-search text-muted" style="font-size: 1.3rem;"></i></button>

                        </div>

                    </div>
            </div>
        blade;
    }
}
