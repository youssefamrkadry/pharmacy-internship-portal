<div class="order-selectors-container" wire:poll.1s>
    @foreach ($orders as $i=>$order)
        <div wire:click="$emitUp('showOrder', '{{$order->id}}')" class='order-select-{{$i % 2 == 0 ? 'even' : 'odd'}}'>
            <span>{{ $order->order_number }}</span>
            <div class="elapsed-time-cell">
                @if ($tab == 'history')
                <div class="elapsed-timer-history">
                    <span>00:00</span>
                </div>
                @else
                    <div class="elapsed-timer">
                        <span>{{ date( "i:s", strtotime(now()) - strtotime($order->assigned_at)) }}</span>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
