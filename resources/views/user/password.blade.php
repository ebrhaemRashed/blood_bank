@extends('layouts.layout')

@section('header')
Change Password {{$user->name}}
@endsection


@section('body')
<form action="{{url(route('user.changepassword',$user->id))}}" method="post">
    @csrf

      <div class="form-group">
        <label for="old_password">old_password</label>
        <input type="password" class="form-control"   name= "old_password" >
      </div>

      <div class="form-group">
        <label for="confirm_old_password">confirm_old_password</label>
        <input type="password" class="form-control"   name= "confirm_old_password" >
      </div>

      <div class="form-group">
        <label for="new_password">new_password</label>
        <input type="password" class="form-control"   name= "new_password" >
      </div>

      <div class="form-group">
        <label for="confirm_new_password">confirm_new_password</label>
        <input type="password" class="form-control"   name= "confirm_new_password" >
      </div>

    <button type="submit" class="btn btn-primary">Save</button>
  </form>
@endsection
