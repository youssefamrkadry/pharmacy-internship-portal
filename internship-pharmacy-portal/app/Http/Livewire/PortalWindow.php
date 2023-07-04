<?php

namespace App\Http\Livewire;

use App\Models\PharmacyOrder;
use Livewire\Component;

class PortalWindow extends Component
{
    public $active_orders_tab = "selected";
    public $history_tab = "unselected";
    public $orders;
    public $active_order;

    public function mount()
    {
        $this->orders = PharmacyOrder::whereIn('status_id', [1, 2, 5])->get();
    }

    public function render()
    {
        return view('livewire.portal-window');
    }

    public function select_active_orders()
    {
        $this->orders = PharmacyOrder::whereIn('status_id', [1, 2, 5])->get();
        $this->active_orders_tab = "selected";
        $this->history_tab = "unselected";
    }

    public function select_history()
    {
        $this->orders = PharmacyOrder::whereIn('status_id', [3, 4, 6])->get();
        $this->active_orders_tab = "unselected";
        $this->history_tab = "selected";
    }

    public function show_order($order_id)
    {
        $this->active_order = PharmacyOrder::find($order_id);
    }

}
