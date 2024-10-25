@extends('layouts.master',[
  'pageTitle'=>"MOVIE"
])

@section('content')
<main class="list">
  <div class="list-top">
    <h1>Movies</h1>
  </div>
  <div class="list-items-container">
    @foreach ($movies as $row)
    @php
     $slug=generateSlug($row->title);   
    @endphp
      <a href="/movies/show/{{$row->id}}/{{$slug}}" class="list-item">
        <img
          class="list-item-image"
          src=" {{$row->image_path}} "
          alt=" {{$row->title}} " />
        <div class="list-item-details">
          <p class="item-title"> {{$row->title}}</p>
          <div class="list-item-details-year-rating">
            <h5> {{$row->date_publish}} </h5>
            <img src="/images/tmdb.svg" alt="TMDB" />
            <h5>{{$row->rate}}</h5>
          </div>
        </div>
      </a>
    @endforeach
  </div>
</main>
@endsection()