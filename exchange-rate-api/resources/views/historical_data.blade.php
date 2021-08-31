@extends('layout')

@section('layout_content')

<section class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 bg-blue-50">
    @livewire('tracker-form')
</section>
<section id="req-result">
    <h2>Wypisane dane z historii w przedziale dwóch lat</h2>
    Paginacja z danych model
    {!! $fetchedData !!}
</section>

@livewireScripts

@endsection