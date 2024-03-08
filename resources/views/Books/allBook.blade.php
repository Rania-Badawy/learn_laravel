@extends('layout')
@section('title')
All Books 
@endsection
@section('body')
    <div class="container" style="margin-top: 20px;">
      <h3 style="text-align: center;color:red">All Books</h3>
      @include('Errors.success')
    <a href="{{url("books/add")}}">Add Book</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Describtion</th>
                <th>Price</th>
                <th>Category</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
                
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$book->name}}</td>
                <td>{{$book->desc}}</td>
                <td>{{$book->price}}</td>
                <td>{{$book->category->title}}</td>
                <td>
                    @if(isset($book->image))
                    <img src="{{asset("storage/$book->image")}}" style="height: 50px;width: 50px;">
                    @endif
                 </td>
                <td><a href="{{url("books/edit/$book->id")}}">Edit</a></td>
                <td><a href="{{url("books/delete/$book->id")}}">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
      </table>
      {{$books->links()}}
    </div>
    @endsection
