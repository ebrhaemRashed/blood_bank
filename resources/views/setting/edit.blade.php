@extends('layouts.layout')

@section('header')
this is edit page
@endsection


@section('body')
 <form action="{{url(route('setting.update',$setting->id))}}" method="post">
    @csrf
    @include('partials.validation_errors')
    @method('put')
    <div class="form-group">
      <input type="text" class="form-control"   name= "phone" value="{{$setting->phone}}">
      <input type="text" class="form-control"   name= "email" value="{{$setting->email}}">
      <input type="text" class="form-control"   name= "about_app" value="{{$setting->about_app}}">
      <input type="text" class="form-control"   name= "fb_link" value="{{$setting->fb_link}}">
      <input type="text" class="form-control"   name= "tw_link" value="{{$setting->tw_link}}">
      <input type="text" class="form-control"   name= "inst_link" value="{{$setting->inst_link}}">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
  </form>
@endsection
