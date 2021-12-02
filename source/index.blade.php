@extends('_layouts.master')

@section('body')
    <section class="container max-w-6xl mx-auto px-6 py-10 md:py-12">
        <div class="flex flex-col-reverse mb-10 lg:flex-row lg:mb-24">
            <div class="mt-8">
                <h1 id="intro-docs-template">PHP & Laravel Code Style Guidelines</h1>

                <h2 id="intro-powered-by-jigsaw" class="font-light mt-4">Powered by Vertex IT</h2>

                <p class="text-lg">Give your documentation a boost with Jigsaw. <br class="hidden sm:block">Generate elegant, static docs quickly and easily.</p>

                <div class="flex my-10">
                    <a href="/docs/code-style-guidelines" title="{{ $page->siteName }} getting started" class="bg-red-500 hover:bg-red-600 font-semibold text-white hover:text-white rounded mr-4 py-2 px-6">Open Guidelines</a>

                    <a href="https://vertex-it.com" title="Vertex IT" class="bg-gray-400 hover:bg-gray-600 text-blue-900 font-normal hover:text-white rounded py-2 px-6">Company website</a>
                </div>
            </div>

            <img src="/assets/img/logo-large.svg" alt="{{ $page->siteName }} large logo" class="mx-auto mb-6 lg:mb-0 ">
        </div>

        <hr class="block my-8 border lg:hidden">

        <div class="md:flex -mx-2 -mx-4">
            <div class="mb-8 mx-3 px-2 md:w-1/3">
                <img src="/assets/img/icon-window.svg" class="h-12 w-12" alt="window icon">

                <h3 id="intro-laravel" class="text-2xl text-blue-900 mb-0">
                    Code Style Guidelines & <br> Best Practices
                </h3>

                <p>
                    For PHP, Laravel, HTML, JavaScript and Vue JS.
                </p>
            </div>

            <div class="mb-8 mx-3 px-2 md:w-1/3">
                <img src="/assets/img/icon-terminal.svg" class="h-12 w-12" alt="terminal icon">

                <h3 id="intro-markdown" class="text-2xl text-blue-900 mb-0">
                    Development Workflow & Environment
                </h3>

                <p>
                    Git workflow, local docker environment.
                </p>
            </div>

            <div class="mx-3 px-2 md:w-1/3">
                <img src="/assets/img/icon-stack.svg" class="h-12 w-12" alt="stack icon">

                <h3 id="intro-mix" class="text-2xl text-blue-900 mb-0">Compile your assets <br>using Laravel Mix </h3>

                <p>Jigsaw comes pre-configured with Laravel Mix, a simple and powerful build tool. Use the latest frontend tech with just a few lines of code.</p>
            </div>
        </div>
    </section>
@endsection
