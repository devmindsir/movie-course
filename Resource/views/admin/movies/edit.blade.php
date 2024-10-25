@extends('layouts.master',[
  'pageTitle'=>"Edit Movie"
])

@section('content')
<body class="admin-body">
  
  @if (isset($_GET['message'])) 
  
  <h1 style="color: green;">{{$_GET['message']}}</h1>
  
  @endif
  

  <div class="form-container">
    <h2 style="color:#000;">Add Movie / Series</h2>


    <form action="{{URL}}admin/{{$movie->id}}" method="post">
      <input type="hidden" name="_method_" value="PATCH">
      <div class="form-group">
        <label for="title">Title</label>
        <input value="{{$movie->title}}" type="text" id="title" name="title" required>
        
        @if (error('title')) 
        
          <p class="red">{{ error('title') }}</p>
        
        @endif
        
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input value="{{$movie->description}}" type="text" id="description" name="description" required>
        
        @if (error('description')) 
          <p class="red"> {{error('description')}} </p> 
        @endif
        
      </div>
      <div class="form-group">
        <label for="image-url">image src</label>
        <input value="{{$movie->image_path}}" type="url" id="image-url" name="image-url" required>
        
        @if (error('image')) 
          <p class="red">{{error('image')}}</p>
        @endif

      </div>
      <div class="form-group">
        <label for="type">Movie/Series</label>
        <select id="type" name="type" required>
          <option class="form-option" {{$movie->series === 0 ? 'selected' : ''}} value="0">Movie</option>
          <option class="form-option" {{$movie->series === 1 ? 'selected' : ''}}  value="1">Series</option>
        </select>
      </div>
      <div class="form-group">
        <button type="submit">Update Movie</button>
      </div>
    </form>
    @endsection()