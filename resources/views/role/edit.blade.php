@extends('layouts.layout')

@section('header')
edit role
@endsection


@section('body')
<form action="{{url(route('role.update',$role->id))}}" method="post">
    @csrf
    @method('put')
    @include('partials.validation_errors')
    <div class="form-group">
      <label for="name">name</label>
      <input type="text" class="form-control"   name= "name" value="{{$role->name}}">
    </div>

    <div class="form-group">
        <label for="permissions">permissions</label>
        @foreach ($permissions as $per)
        <input type="checkbox" class="form-control"   name= "permissions[]" value="{{$per->id}}"
        @if ($role->hasPermissionTo($per->name))
        Checked
        @endif
        >
        {{$per->name}}
        @endforeach
      </div>

    <button type="submit" class="btn btn-primary">Save</button>
  </form>
  @endsection



  @section('footer')
  footer of edit
  @endsection
