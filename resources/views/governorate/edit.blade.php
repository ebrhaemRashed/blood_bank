
@extends('layouts.layout')

@section('header')
Edit
@endsection


@section('body')
<form action="{{url(route('governorate.update',$gov->id))}}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="name">Gov Name</label>
      <input type="text" class="form-control" id="name"  name= "name" value="{{$gov->name}}">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
  </form>
  @endsection



  @section('footer')
  footer of edit
  @endsection
