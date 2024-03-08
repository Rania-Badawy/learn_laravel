@extends('layout')
@section('title')
Add Book
@endsection
@section('body')
    <div class="container" style="margin-top: 20px;">
      <h3 style="text-align: center;color:red">Add Book</h3>
      @include('Errors.error')
      <form action="{{url("books/insert")}}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text"  name="name" class="form-control" placeholder="Enter Title" value="{{old('title')}}">
        </div>
          <div class="mb-3">
            <label for="desc" class="form-label">Describtion</label>
            <textarea name="desc" class="form-control" placeholder="Enter Describtion">{{old('desc')}}</textarea>
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Price</label>
            <input type="text"  name="price" class="form-control" placeholder="Enter Price" value="{{old('price')}}">
        </div>
        <div class="mb-3">
          <label for="title" class="form-label">Category</label>
          <select name="category_id" class="form-control">
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
            
          </select>
      </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" >
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    @endsection