<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach($items as $item)
                <li class="breadcrumb-item"><a wire:navigate href="{{ $item['link'] }}">{{ $item['label'] }}</a></li>
            @endforeach
            <li class="breadcrumb-item active" aria-current="page">{{ $lastItem['label'] }}</li>
        </ol>
    </nav>
</div>
