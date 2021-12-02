@extends('_layouts.master')

@section('nav-toggle')
    @include('_nav.menu-toggle')
@endsection

@section('body')
<section class="container max-w-8xl mx-auto px-4 md:px-8 py-4">
    <div class="flex flex-col lg:flex-row">
        <nav id="js-nav-menu" class="nav-menu hidden lg:block sticky">
            @include('_nav.menu', ['items' => $page->navigation])
        </nav>

        <div class="DocSearch-content w-full lg:w-3/5 break-words p-5 lg:p-10 rounded-lg shadow-md bg-white" v-pre>
            @yield('content')
        </div>

        <div class="hidden lg:block">
            @include('_layouts.documentation-nav')
        </div>
    </div>
</section>
@endsection
