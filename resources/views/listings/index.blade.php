@extends('layout')

@section('content')
    @include('partials/_hero')
    @include('partials/_search')

    <div class="container-fluid">
        @if (count($listings) == 0)
            <p>No listings to display</p>
        @else
            <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
                @foreach ($listings as $listing)
                    <x-card>
                        <x-listing-card :listing="$listing" />
                    </x-card>
                @endforeach
            </div>
        @endif
    </div>
@endsection
