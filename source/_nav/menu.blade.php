@php $level = $level ?? 0 @endphp

<ul class="my-0 px-4">
    @foreach ($items as $label => $item)
        @include('_nav.menu-item')
    @endforeach
</ul>
