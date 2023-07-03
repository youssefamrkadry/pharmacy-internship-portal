<div class="elapsed-time-cell">
    <div class="elapsed-timer" wire:poll.60s>
        <span>{{ date( "h:i", strtotime(now()) - strtotime($assigned_at)) }}</span>
    </div>
</div>
