@extends('layouts.layout')

@section('header')
Posts
<a href="{{url(route('post.create'))}}" >  Create Post</a>
@endsection

@section('body')
<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">title</th>
        <th scope="col">content</th>
        <th scope="col">category</th>
        <th scope="col"> EDIT</th>
        <th scope="col">DELETE</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($posts as $post)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->content}}</td>
        <td> {{$post->Category->name}}  </td>
        <td> <a href="{{url(route('post.edit',$post->id))}}"> Edit </a>  </td>

        <td>
        <form method="post" action="{{url(route('post.destroy',$post->id))}}"}>
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
this is Post footer
@endsection
