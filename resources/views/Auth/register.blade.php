@extends('layout')

@section('title')
register Form
@endsection

@section('body')
<div class="container w-50">
@include('Errors.error')
<h3>Create Account</h3>
<form action="{{url('addRegister')}}" method="post">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Email">
      </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Confirm Password</label>
        <input type="password" name="password-confirmation" class="form-control" id="exampleInputPassword1" placeholder="confirm password">
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection