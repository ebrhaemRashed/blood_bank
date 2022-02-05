@extends('layouts.layout')

@section('header')
this is setting
<a href={{route('setting.create')}}> Create new setting </a>
@endsection


@section('body')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">phone</th>
        <th scope="col">about app</th>
        <th scope="col">email</th>
        <th scope="col">fb_link</th>
        <th scope="col">tw_link</th>
        <th scope="col">inst_link</th>
        <th scope="col">edit</th>
        <th scope="col">delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($settings as $setting)
        <tr>
            <td> {{$loop->iteration}} </td>
            <td> {{$setting->phone}} </td>
            <td> {{$setting->about_app}} </td>
            <td> {{$setting->email}} </td>
            <td> {{$setting->fb_link}} </td>
            <td> {{$setting->tw_link}} </td>
            <td> {{$setting->inst_link}} </td>
            <td> <a href="{{url(route('setting.edit',$setting->id))}}"> Edit </a> </td>
            <td>
            <form action="{{url(route('setting.destroy',$setting->id))}}" method="post">
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
