@extends('layout')
@section('title')
Add Category
@endsection
@section('body')
    <div class="container" style="margin-top: 20px;">
      <h3 style="text-align: center;color:red">Add Category</h3>
      @include('Errors.error')
      <form action="{{url("categories/insert")}}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title" value="{{old('title')}}">
            {{-- @error('title')
               {{$message}} 
            @enderror --}}
        </div>
          <div class="mb-3">
            <label for="desc" class="form-label">Describtion</label>
            <textarea name="desc" class="form-control" placeholder="Enter Describtion">{{old('desc')}}</textarea>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" >
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    @endsection