@extends('layouts.layout')

@include('partials.flush')

@section('header')
Users
<a href="{{url(route('user.create'))}}" > Create User </a>
@endsection

@section('body')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr>
            <td> {{$loop->iteration}} </td>
            <td> {{$user->name}} </td>
            <td> {{$user->email}} </td>

            <td>
              @foreach ($user->roles as $role)
              {{$role->name}}
              @endforeach
            </td>

            <td> <a href="{{url(route('user.edit',$user->id))}}" class="btn btn-link"> Edit </a> </td>
            <td>
                <form action="{{url(route('user.destroy',$user->id))}}" method="post">
                    @csrf()
                    @method('delete')
                <button type="submit" class="btn btn-link"> Delete </button>
                </form>
            </td>
        </tr>

      @endforeach
    </tbody>

    @endsection
