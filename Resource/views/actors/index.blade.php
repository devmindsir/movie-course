@extends('layouts.master', [
    'pageTitle' => "ACTOR"
])

@section('content')

<main class="list">
    <div class="list-top">
        <h1 class="list-top-title-people">Popular People</h1>
    </div>
    <div class="list-items-container">
        @foreach ($actors as $row)
        @php
        $slug=generateSlug($row->name.' '.$row->family);   
       @endphp
            <a href="/actors/show/{{ $row->id }}/{{$slug}}" class="list-item-people">
                <img
                    class="list-item-image"
                    src="{{ $row->image }}"
                    alt="{{ $row->family }}" />
                <div class="list-item-details-people">
                    <p class="item-title-people">{{ $row->name . " " . $row->family }}</p>
                </div>
            </a>
        @endforeach
    </div>
</main>

@endsection