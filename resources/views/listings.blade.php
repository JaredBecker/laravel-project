@extends('layout')

@section('content')
    <h1>{{ $heading }}</h1>
    <p>{{ $sub_heading }}</p>

    @if (count($listings) == 0)
        <p>No listings to display</p>
    @else
        <ul>
            @foreach ($listings as $listing)
                <li>
                    <h3>
                        <a href="/listing/{{ $listing['id'] }}">
                            {{ $listing['title'] . ' - ' . $listing['id'] }}
                        </a>
                    </h3>
                    <p>{{ $listing['description'] }}</p>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
