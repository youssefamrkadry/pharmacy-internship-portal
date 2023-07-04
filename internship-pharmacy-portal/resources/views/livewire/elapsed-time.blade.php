<div class="elapsed-time-cell">
    @if ($history)
    <div class="elapsed-timer-history">
        <span>00:00</span>
    </div>
    @else
        <div class="elapsed-timer" wire:poll.60s>
            <span>{{ date( "h:i", strtotime(now()) - strtotime($assigned_at)) }}</span>
        </div>
    @endif
</div>
