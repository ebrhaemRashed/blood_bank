@extends('layouts.layout')

@section('header')
Role
<a href="{{url(route('role.create'))}}" > Create New Role </a>
@endsection


@section('body')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">Permissions</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($roles as $role)
        <tr>
            <td> {{$loop->iteration}} </td>
            <td> {{$role->name}} </td>
            <td>
            @foreach ($role->permissions as $permission)
            {{$permission->name}}
            @endforeach
            </td>
            <td> <a href="{{url(route('role.edit',$role->id))}}"> Edit </a> </td>


            <td>
                 <form action="{{url(route('role.destroy',$role->id))}}" method ="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">
                 </form>
            </td>

        </tr>

      @endforeach
    </tbody>
  </table>
  @endsection
