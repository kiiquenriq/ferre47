<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class OrderStatuspaid extends Component
{
    public $order, $status;

    public function mount(){
        $this->status = $this->order->status;

    }
    public function saved(){
        $this->order->status_paid = $this->status;
        $this->order->save();
        return redirect()->route('admin.orders.index');
    }
    public function render()
    {
        return view('livewire.admin.order-statuspaid');
    }
}
