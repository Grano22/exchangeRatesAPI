@extends('layout')

@section('layout_content')

<header class="content-center justify-center flex w-100 bg-blue-300">
    <div class="margin-auto p-6">
        <h1 class="text-center font-bold">Witaj w aplikacji Exchange Rates API!</h1>
    </div>
</header>
<section id="section-usage" class="bg-blue-50 p-8">
    <h3>Opcje</h3>
    <hr>
    <a href="{{ url('/tracker') }}">
        <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 my-2 border-b-4 border-blue-700 hover:border-blue-500 rounded">
            Sprawdź Tracker'a
        </button>
    </a>
    <br>
    <a href="{{ url('/historical-data') }}">
        <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 my-2 border-b-4 border-blue-700 hover:border-blue-500 rounded">
            Dane historii dla dwóch lat
        </button>
    </a>
    <br>
    <a href="{{ url('/daily-data') }}">
        <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 my-2 border-b-4 border-blue-700 hover:border-blue-500 rounded">
            Codziennie aktualizowane dane
        </button>
    </a>
    <br>
    <a href="{{ url('/course-status') }}">
        <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 my-2 border-b-4 border-blue-700 hover:border-blue-500 rounded">
            Stan kursu według daty
        </button>
    </a>
    <br>
    <a href="{{ url('/data-tracker') }}">
        <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 my-2 border-b-4 border-blue-700 hover:border-blue-500 rounded">
            Dane według daty
        </button>
    </a>
</section>

@endsection