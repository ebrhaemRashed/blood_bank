@extends('layouts.layout')

@section('header')
Edit Post
@endsection

@section('body')
<form action="{{url(route('post.update',$id))}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title"  name="title" value="{{$post->title}}">
    </div>

    <div class="form-group">
        <label for="title">Content</label>
        <input type="text-area" class="form-control" id="content"  name="content" value="{{$post->content}}">
      </div>

      <div class="form-group">
        <label for="category_id" > Category </label>
        <select class="custom-select" name="category_id">
            <option selected value="{{$post->category->id}}"> {{$post->category->name}} </option>
            @foreach ($cats as $cat )
                <option value="{{$cat->id}}"> {{$cat->name}} </option>
            @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="image"  name="image" value="{{$post->image}}">
      </div>

    <button type="submit" class="btn btn-primary">Save</button>

  </form>

  @endsection
