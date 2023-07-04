<?php

namespace App\Http\Livewire;

use App\Models\PharmacyOrder;
use Livewire\Component;

class OrdersContainer extends Component
{

    public $orders;
    public $tab = 'active';

    protected $listeners = [
        'refreshOrders' => 'refresh_orders',
        'refreshOrdersInPlace' => 'refresh_orders_in_place',
      ];

    public function mount()
    {
        $this->orders = PharmacyOrder::whereIn('status_id', [1, 2, 5])->get();
    }
    public function render()
    {
        return view('livewire.orders-container');
    }

    public function refresh_orders_in_place()
    {
        if($this->tab == 'active'){
            $this->orders = PharmacyOrder::whereIn('status_id', [1, 2, 5])->get();
        }
        else {
            $this->orders = PharmacyOrder::whereIn('status_id', [3, 4, 6])->get();
        }
    }

    public function refresh_orders($mode)
    {
        $this->tab = $mode;
        if($mode == 'active'){
            $this->orders = PharmacyOrder::whereIn('status_id', [1, 2, 5])->get();
        }
        else {
            $this->orders = PharmacyOrder::whereIn('status_id', [3, 4, 6])->get();
        }
    }
}
