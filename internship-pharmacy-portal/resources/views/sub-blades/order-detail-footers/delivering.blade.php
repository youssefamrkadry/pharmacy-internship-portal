<div class="footer-container">
    <p>
        <span>Location:</span>
        {{$active_order->pharmacy_order_user_address->buliding_number}},
        {{$active_order->pharmacy_order_user_address->street_name}},
        {{$active_order->pharmacy_order_user_address->city}},
        {{$active_order->pharmacy_order_user_address->area}}
    </p>
    <p>
        <span>Delivery Fees:</span>
        EGP {{$active_order->delivery_charge}}
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span>Payment:</span>
        {{$active_order->payment_method_id == 0 ? "CASH" : "CREDIT CARD"}}
    </p>
    <div class="action-buttons-div">
        <button class="accept" wire:click='deliver_order'>ORDER DELIVERED</button>
        <button class="refuse" wire:click='cancel_order'>CANCEL ORDER</button>
    </div>
</div>