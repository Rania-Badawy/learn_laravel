@extends('layout')
@section('title')
Edit Book
@endsection
@section('body')
    <div class="container" style="margin-top: 20px;">
      <h3 style="text-align: center;color:red">Edit Book</h3>
      @include('Errors.error')
      <form action="{{url("books/update/$book->id")}}" method="post" enctype="multipart/form-data" >
        @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text"  name="name" class="form-control" placeholder="Enter Title" value="{{$book->name}}">
            {{-- @error('title')
               {{$message}} 
            @enderror --}}
        </div>
          <div class="mb-3">
            <label for="desc" class="form-label">Describtion</label>
            <textarea name="desc" class="form-control" placeholder="Enter Describtion">{{$book->desc}}</textarea>
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Price</label>
            <input type="text"  name="price" class="form-control" placeholder="Enter Price" value="{{$book->price}}">
        </div>
        <div class="mb-3">
          <label for="title" class="form-label">Category</label>
          <select name="category_id" class="form-control">
            <option value="{{$book->category_id}}">{{$book->category->title}}</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
            
          </select>
      </div>
          <div class="mb-3">
            <label for="desc" class="form-label">Describtion</label>
            <input type="file" name="image" class="form-control" >
            @if(isset($book->image))
            <img src="{{asset("storage/$book->image")}}" style="height: 50px;width: 50px;">
            @endif
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    @endsection