@extends('layouts.layout')

@section('header')
Update User
@endsection

@section('body')
<form action="{{url(route('user.update',$user->id))}}" method="post">
    @include('partials.validation_errors')
    @csrf
    @method('put')
    <div class="form-group">
      <label for="username">user name</label>
      <input type="text" class="form-control"   name= "name" value="{{$user->name}}">
    </div>

    <div class="form-group">
        <label for="email">email</label>
        <input type="text" class="form-control"   name= "email" value="{{$user->email}}">
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control"   name= "password"  value="{{$user->password}}">
      </div>

      <div class="form-group">
        <label for="role">Role</label>
        @foreach($roles as $role)
        <input type="checkbox" name="roles[]" value="{{$role->id}}"
        @if($user->hasRole($role->name)) Checked @endif
        >

        {{$role->name}}

        @endforeach
      </div>

    <button type="submit" class="btn btn-primary">Save</button>
  </form>
@endsection
