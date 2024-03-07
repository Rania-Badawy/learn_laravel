@extends('layout')
@section('title')
All Categories 
@endsection
@section('body')
    <div class="container" style="margin-top: 20px;">
      <h3 style="text-align: center;color:red">All Categories</h3>
      @include('Errors.success')
    <a href="{{url("categories/add")}}">Add Category</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Describtion</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
                
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$category->title}}</td>
                <td>{{$category->desc}}</td>
                <td>
                    @if(isset($category->image))
                    <img src="{{asset("storage/$category->image")}}" style="height: 50px;width: 50px;">
                    @endif
                 </td>
                <td><a href="{{url("categories/edit/$category->id")}}">Edit</a></td>
                <td><a href="{{url("categories/delete/$category->id")}}">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
      </table>
      {{$categories->links()}}
    </div>
    @endsection
