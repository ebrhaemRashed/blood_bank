@extends('layouts.layout')

@section('header')
this is edit page
@endsection


@section('body')
 <form action="{{url(route('setting.store'))}}" method="post">
    @csrf
    @include('partials.validation_errors')
    <div class="form-group">
      <input type="text" class="form-control" placeholder="phone"   name= "phone" >
      <input type="text" class="form-control" placeholder= "email"  name= "email" >
      <input type="text" class="form-control"  placeholder= "about_app" name= "about_app" >
      <input type="text" class="form-control"  placeholder= "fb_link" name= "fb_link" >
      <input type="text" class="form-control" placeholder= "tw_link"  name= "tw_link" >
      <input type="text" class="form-control" placeholder= "inst_link"  name= "inst_link" >
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
  </form>
@endsection
