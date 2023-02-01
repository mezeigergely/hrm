<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/dubrox/Multiple-Dates-Picker-for-jQuery-UI@master/jquery-ui.multidatespicker.js"></script>
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script>
    $(document).ready(function () {
      $('#datePick').multiDatesPicker();
    });
</script>
<style>
    #datePick {
      width: 800px;
      padding: 7px;
    }

    .ui-state-highlight {
      border: 0 !important;
    }

    .ui-state-highlight a {
      background: #363636 !important;
      color: #fff !important;
    }
  </style>
@extends('layouts.layout')

@section('content')
@if(Auth::check() and (Auth::user()->isEmployee() == true))
<div class="col-8">
    <h1 class="pt-3 h3 fw-normal">Holiday request</h1>
    @include('layouts.messages')
    <form action="{{ route('create-holiday-request') }}" method="POST">
        @csrf
        <div class="pt-2">
            <h4 class="fw-normal">Days:</h4>
            <input type="text" id="datePick" name="holidays"/>
        </div>
    <div class="pt-3 col-xs-12 col-sm-12 col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>
@endif
    @if(Auth::check() and (Auth::user()->isManager() == true))
    <div class="col-8">
    <h1 class="pt-3 h3 fw-normal">Holiday request</h1>
    @include('layouts.messages')
    <form action="{{ route('create-holiday-request') }}" method="POST">
        @csrf
        <div class="pt-2">
            <h4 class="pt-3 fw-normal">Type:</h4>
            <input type="radio" name="h_type" value="normal">
            <label for="normal">normal</label><br>
            <input type="radio" name="h_type" value="sick">
            <label for="sick">sick</label><br>
            <h4 class="fw-normal">Days:</h4>
            <input type="text" id="datePick" name="holidays"/>
        </div>
    <div class="pt-3 col-xs-12 col-sm-12 col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>
    @endif
    @endsection
