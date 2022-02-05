@extends('layouts.layout')

@section('header')
Create Role
@endsection

@section('body')
<form action="{{url(route('role.store'))}}" method="post">
    @include('partials.validation_errors')
    @csrf
    <div class="form-group">
      <label for="role">Name</label>
      <input type="text" class="form-control"   name= "name" >
    </div>

      <div class="form-group">
        <label for="permissions">permissions</label>
        @foreach ($permissions as $per)
        <input type="checkbox" class="form-control"   name= "permissions[]" value="{{$per->id}}" >
        {{$per->name}}
        @endforeach
      </div>

    <button type="submit" class="btn btn-primary">Save</button>
  </form>
@endsection
