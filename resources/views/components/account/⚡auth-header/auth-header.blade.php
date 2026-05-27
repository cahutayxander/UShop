
<div>
    @if ($this->isSeller)
        <livewire:account.seller.header />
    @else   
        <livewire:account.buyer.header :user="$this->user"/>
    @endif
</div>