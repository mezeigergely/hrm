@extends('layouts.layout')

@section('content')
@if(Auth::check())
@foreach ($holidayRequests as $holidayRequest)
@if ($holidayRequest->h_is_active == 0)
<form action="{{ route('approve-holiday-requests') }}" method="post">
    @csrf
<table class="table table-bordered">
    <tr>
        <th>User ID</th>
        <th>Days</th>
        <th>Type</th>
        <th>Approve</th>
    </tr>
    <tr>
        <td class="d-none">{{ $holidayRequest->id }}
            <input class="d-none" name="id" value="{{ $holidayRequest->id }}">
        </td>
        <td>{{ $holidayRequest->user_id }}
            <input class="d-none" name="user_id" value="{{ $holidayRequest->user_id }}">
        </td>
        <td>{{ $holidayRequest->h_days }}
            <input class="d-none" name="holidays" value="{{ $holidayRequest->h_days }}">
        </td>
        <td>
            <input type="radio" name="h_type" value="normal">
            <label for="normal">normal</label><br>
            <input type="radio" name="h_type" value="sick">
            <label for="sick">sick</label><br>
        </td>
        <td>
            <button type="submit" class="btn btn-success">Approve
                <input class="d-none" name="h_is_active" value=1>
            </button>
        </td>
    </tr>
</table>
</form>
@endif
@endforeach
@endif
@endsection
