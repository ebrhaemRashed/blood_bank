@inject('model','App\Models\Governorate')
@extends('layouts.layout')

@section('header')
Create Gov
@endsection

@section('body')
<form action="{{url(route('governorate.store'))}}" method="post">
    @csrf
    <div class="form-group">
      <label for="name">Gov Name</label>
      <input type="text" class="form-control" id="name"  name= "name" >
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
  </form>
@endsection
