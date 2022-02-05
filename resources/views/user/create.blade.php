@extends('layouts.layout')

@section('header')
Create User
@endsection

@section('body')
<form action="{{url(route('user.store'))}}" method="post">
    @csrf
    @include('partials.validation_errors')
    <div class="form-group">
      <label for="name">name</label>
      <input type="text" class="form-control"   name= "name" >
    </div>

    <div class="form-group">
        <label for="email">email</label>
        <input type="text" class="form-control"   name= "email" >
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control"   name= "password" >
      </div>

      <div class="form-group">
        <label for="roles">Role</label>
        @foreach($roles as $role )
        <input type="checkbox" name="roles[]" value="{{$role->id}}"> {{$role->name}}
        @endforeach
      </div>

    <button type="submit" class="btn btn-primary">Save</button>
  </form>
@endsection
