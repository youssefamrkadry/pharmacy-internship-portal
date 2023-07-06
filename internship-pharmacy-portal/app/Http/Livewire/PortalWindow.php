<?php

namespace App\Http\Livewire;

use App\Models\PharmacyOrder;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PortalWindow extends Component
{
    public $active_orders_tab = "selected";
    public $history_tab = "unselected";
    protected $listeners = ['showOrder' => 'show_order'];
    public $orders;
    public $active_order;

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.portal-window');
    }

    public function select_active_orders()
    {
        $this->active_orders_tab = "selected";
        $this->history_tab = "unselected";
        $this->emit('refreshOrders', "active");
    }

    public function select_history()
    {
        $this->active_orders_tab = "unselected";
        $this->history_tab = "selected";
        $this->emit('refreshOrders', "history");
    }

    public function show_order($order_id)
    {
        $this->active_order = PharmacyOrder::find($order_id);
    }

    public function accept_order()
    {
        $this->active_order->update(['status_id' => 2]);
        $this->emit('refreshOrdersInPlace');
    }
    public function reject_order()
    {
        $this->active_order->update(['status_id' => 3]);
        $this->emit('refreshOrdersInPlace');
    }
    public function cancel_order()
    {
        $this->active_order->update(['status_id' => 4]);
        $this->emit('refreshOrdersInPlace');
    }
    public function dispatch_order()
    {
        $this->active_order->update(['status_id' => 5]);
        $this->emit('refreshOrdersInPlace');
    }
    public function deliver_order()
    {
        $this->active_order->update(['status_id' => 6]);
        $this->emit('refreshOrdersInPlace');
    }

}
