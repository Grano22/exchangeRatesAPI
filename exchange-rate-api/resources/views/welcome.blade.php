@extends('layout')

@section('layout_content')

<header class="content-center flex w-100 h-24 bg-blue-300">
    <div>
        Witaj w aplikacji Exchange Rates API!
    </div>
</header>
<section id="section-usage" class="bg-blue-50 p-8">
    <h3>Opcje</h3>
    <a href="{{ url('/tracker') }}">
        <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
            Sprawdź Tracker'a
        </button>
    </a>
</section>

@endsection