<!-- resources/views/recipes/search.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Search Recipes</h1>
        <form action="{{ route('recipes.search') }}" method="GET">
            <input type="text" name="query" placeholder="Search recipes">
            <button type="submit">Search</button>
        </form>

        <h2>Results from Database:</h2>
        @if($dbResults->isEmpty())
            <p>No results found in the database.</p>
        @else
            <ul>
                @foreach($dbResults as $recipe)
                    <li><a href="{{ route('recipes.show', $recipe->id) }}">{{ $recipe->title }}</a></li>
                @endforeach
            </ul>
        @endif

        <h2>Results from API:</h2>
        @if(empty($apiResults))
            <p>No results found in the API.</p>
        @else
            <ul>
                @foreach($apiResults as $hit)
                <a href="{{ route('recipes.showApi', $hit['recipe']['uri']) }}">
                    <img src="{{ $hit['recipe']['image'] }}" alt="{{ $hit['recipe']['label'] }}" width="100">
                    {{ $hit['recipe']['label'] }}
                </a>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
