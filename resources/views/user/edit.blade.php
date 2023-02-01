@extends('layouts.layout')

@section('content')
@if(Auth::check())
<div class="col-8">
    <h1 class="pt-3 h3 fw-normal">Update '{{ $user->name }}'</h1>
    @include('layouts.messages')
    <form action="{{ route('users.update',$user->id) }}" method="POST">
        @csrf
        @method('PUT')
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="pt-3 d-none">
                        <strong>Id:</strong>
                        <input type="text" name="id" class="form-control" value="{{ $user->id }}" placeholder="{{ $user->id }}">
                    </div>
                    <div class="pt-3">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="{{ $user->name }}">
                    </div>
                    <div class="pt-3">
                        <strong>Email:</strong>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="{{ $user->email }}">
                    </div>
                    <div class="pt-3">
                        <strong>Password:</strong>
                        <input type="password" name="password" class="form-control" value="{{ $user->email }}" placeholder="password">
                    </div>
                </div>
            </div>
            <div class="pt-3 col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endif
@endsection
