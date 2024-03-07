@extends('layout')
@section('title')
Edit Category
@endsection
@section('body')
    <div class="container" style="margin-top: 20px;">
      <h3 style="text-align: center;color:red">Edit Category</h3>
      @include('Errors.error')
      <form action="{{url("categories/update/$category->id")}}" method="post" enctype="multipart/form-data" >
        @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title" value="{{$category->title}}">
            {{-- @error('title')
               {{$message}} 
            @enderror --}}
        </div>
          <div class="mb-3">
            <label for="desc" class="form-label">Describtion</label>
            <textarea name="desc" class="form-control" placeholder="Enter Describtion">{{$category->desc}}</textarea>
          </div>

          <div class="mb-3">
            <label for="desc" class="form-label">Describtion</label>
            <input type="file" name="image" class="form-control" >
            @if(isset($category->image))
            <img src="{{asset("storage/$category->image")}}" style="height: 50px;width: 50px;">
            @endif
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    @endsection