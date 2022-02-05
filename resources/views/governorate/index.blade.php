@extends('layouts.layout')


@section('header')
Goverorates <br>
<a href="{{route('governorate.create')}}"> ADD Gov </a>
@endsection



@section('body')

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">edit</th>
        <th scope="col">delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($gov as $one)
        <tr>
            <td> {{$loop->iteration}} </td>
            <td> {{$one->name}} </td>
            <td> <a href="{{url(route('governorate.edit',$one->id))}}"> Edit </a> </td>
            <td>
            <form action="{{url(route('governorate.destroy',$one->id))}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="delete">
            </form>
            </td>
        </tr>

      @endforeach
    </tbody>
  </table>

@endsection




@section('footer')
Gov Footer
@endsection
