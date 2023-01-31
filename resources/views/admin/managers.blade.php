@extends('layouts.layout')

@section('content')
<h1 class="pt-3 fw-normal">Managers</h1>
@php
    $type = gettype($managers);
@endphp
@if ($type != "string")
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($managers as $manager)
        <tr>
            <td>{{ $manager->id }}</td>
            <td>{{ $manager->name }}</td>
            <td>{{ $manager->email }}</td>
            <td>
                <form action="" method="POST">

                    <a class="btn btn-info" href="">Show</a>

                    <a class="btn btn-primary" href="">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endif
<p>{{ $managers }}</p>
<div class="col-8">
    <h1 class="pt-3 h3 fw-normal">Create new manager</h1>
    @include('admin.partials.messages')
    <form action="{{ route('admin.create-manager') }}" method="POST">
        @csrf
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="pt-3">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="name">
                    </div>
                    <div class="pt-3">
                        <strong>Email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="email">
                    </div>
                    <div class="pt-3">
                        <strong>Password:</strong>
                        <input type="password" name="password" class="form-control" placeholder="password">
                    </div>
                </div>
            </div>
            <div class="pt-3 col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

@endsection
