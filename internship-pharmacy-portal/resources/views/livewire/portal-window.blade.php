<div>

    <div class="sidebar">
        <div class="logo">
            <a href="https://www.yodawy.com/">
                <img src="{{ asset('images/yodawy-logo.svg') }}" alt="Company Logo">
            </a>
        </div>
        <nav class="menu">
            <a href="#">
                <div class="active">
                    <img src="{{ asset('images/orders-img.svg') }}">
                    <span>Orders</span>
                </div>
            </a>
            <a href="#">
                <div>
                    <img src="{{asset('images/prescriptions-img.svg')}}">
                    <span>Prescriptions</span>
                </div>
            </a>
            <a href="#">
                <div>
                    <img src="{{asset('images/find-member-img.svg')}}">
                    <span>Find Member</span>
                </div>
            </a>
            <a href="#">
                <div>
                    <img src="{{asset('images/contact-us-img.svg')}}">
                    <span>Contact Us</span>
                </div>
            </a>
            <a href="#">
                <div>
                    <img src="{{asset('images/log-out-img.svg')}}">
                    <span>Log Out</span>
                </div>
            </a>
        </nav>
    </div>

    <div class="header">
        <div class="left-section">
            <img src="{{asset('images/play-button.svg')}}">
            <img src="{{asset('images/stop-button.svg')}}">
        </div>
        <div class="middle-section">
            <span>ACTIVE</span>
        </div>
        <div class="right-section">
            <span>Login Time: 11:00 am</span>
            <a href="profile">
                <img src="{{asset('images/default-user-photo.svg')}}">
            </a>
            <span>{{Auth::user()->name}}</span>
        </div>

    </div>

    <div class="orders-page">

        <div class="order-selection-block">
            <div class="filter-tabs-container">
                <button class="filter-tab-{{$active_orders_tab}}" wire:click="select_active_orders">
                    ACTIVE ORDERS
                </button>
                <button class="filter-tab-{{$history_tab}}" wire:click="select_history">
                    HISTORY
                </button>
            </div>
            <div class="table-container">
                <div class="orders-header">
                    <span>Order Number</span>
                    <span>Elapsed Time</span>
                </div>
                @livewire('orders-container')
            </div>
        </div>

        <div class="order-details-block">
            <div class="filter-tabs-container">
                    <button class="order-number-tab">
                        @if ($active_order)
                            {{$active_order->order_number}}
                        @else
                            Select an order
                        @endif
                    </button>
            </div>
            <div class="table-container-border">
                <div class="table-container">
                    <div class="details-header">
                        <span></span>
                        <span>Items</span>
                        <span>Form</span>
                        <span>Quantity</span>
                        <span>Type</span>
                        <span>Price</span>
                        <span>Discount</span>
                        <span>Total Price</span>
                    </div>
                    @if ($active_order)
                        <div class="order-details-container">
                            
                                @foreach ($active_order->pharmacy_order_items as $i=>$item)
                                    <div class='detail-select-{{$i % 2 == 0 ? 'even' : 'odd'}}'>
                                        <img class='med_img' src="{{$item->image_url}}">
                                        <span>{{ $item->name }}</span>
                                        <span>{{ $item->form }}</span>
                                        <span>{{ $item->quantity }}</span>
                                        <span>{{ $item->unit }}</span>
                                        <span>{{ $item->list_price }}</span>
                                        <span>0</span>
                                        <span>{{ $item->list_price * $item->quantity }}</span>
                                    </div>
                                @endforeach
                        </div>
                        @if($active_order->status_id == 1)
                            @include('sub-blades.order-detail-footers.assigned')
                        @elseif($active_order->status_id == 2)
                            @include('sub-blades.order-detail-footers.approved')
                        @elseif($active_order->status_id == 3)
                            @include('sub-blades.order-detail-footers.rejected')
                        @elseif($active_order->status_id == 4)
                            @include('sub-blades.order-detail-footers.cancelled')
                        @elseif($active_order->status_id == 5)
                            @include('sub-blades.order-detail-footers.delivering')
                        @elseif($active_order->status_id == 6)
                            @include('sub-blades.order-detail-footers.delivered')
                        @endif
                    @endif
                </div>
            </div>
        </div>

    </div>
    
</div>