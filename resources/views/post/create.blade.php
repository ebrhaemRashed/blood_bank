@extends('layouts.layout')

@section('header')
create new Post
@endsection

@section('body')
<form action="{{url(route('post.store'))}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title"  name="title" >
    </div>

    <div class="form-group">
        <label for="title">Content</label>
        <input type="text-area" class="form-control" id="content"  name="content" >
      </div>

      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="image"  name="image" >
      </div>

      <div class="form-group">
        <label for="category">Category</label>
        <select class="custom-select" name="category">
            @foreach ($cats as $cat)
            <option value='{{$cat->id}}'> {{$cat->name}}</option>
            @endforeach
          </select>
      </div>

    <button type="submit" class="btn btn-primary">Save</button>
  </form>
@endsection
