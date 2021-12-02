---
title: PHP
description: Building a navigation menu for your site
extends: _layouts.documentation
section: content
---

#### [Code Style Guidelines](/docs/code-style-guidelines)

# Laravel Blade {#laravel-blade}

---

## Indentation {#indentation}

Indent using four spaces.
```php
@isset($text)
    <div class="text">
        {{ $text }}
    </div>
@endif
```

## Spacing {#spacing}

Add one space after control structure directives:  

`@if`  
`@elseif`  
`@for`  
`@foreach`  
`@forelse`  
`@switch`  
`@case`  
`@while`  
`@unless`  

Do not add space to any other blade directive.

```php
// Bad
@if($user->hasPosts())
    @foreach($posts as $post)
        {{ $post->name }}
    @endforeach
@endif

// Good
@if ($user->hasPosts())
    @foreach ($posts as $post)
        {{ $post->name }}
    @endforeach
@endif
```

```php
// Bad
@section ('content')
    @auth ('admin')
        @isset ($record)
            {{ $record->name }}
        @endisset
    @endauth
@endsection

// Good
@section('content')
    @auth('admin')
        @isset($record)
            {{ $record->name }}
        @endisset
    @endauth
@endsection
```

Add one space between render braces and their content.
```php
{{ $text }}
{!! $content !!}
```

## Line breaks {#line-breaks}

There should be a line break between `@section()` directives.

```php
@extends('layouts.master')

@section('content')
    <div>
        @if ($condition)
            <p>Some text</p>
        @endif
    </div>
@endsection

@section('footer')
    <p>Footer text</p>
@endsection
```

## CSS & JS Sections {#css-js-sections}

Always name CSS sections as "styles" and JS sections as "scripts"

```php
// Bad
@yield('custom-css')
@stack('custom-css')
<body>
    <div>
        @yield('content')
    </div>

    @yield('custom-js')
    @stack('custom-js')
</body>

// Good
@yield('styles')
@stack('styles')
<body>
    <div>
        @yield('content')
    </div>

    @yield('scripts')
    @stack('scripts')
</body>
```

## Avoid queries in Blade templates {#avoid-queries}

Respect the MVC architecture and don't write queries in Blade files.

```php
// Bad
@foreach (User::all() as $user)
   {{ $user->name }}
@endforeach

// Good
@foreach ($users as $user)
   {{ $user->name }}
@endforeach
```
