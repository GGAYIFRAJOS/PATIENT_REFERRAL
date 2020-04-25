@extends('layouts.app')

@section('content')


<table class="table">
    <thead class="thead-dark">
      <tr>

        <th scope="col">Title</th>
        <th scope="col">Procedure</th>
        <th scope="col">Recommendations</th>
        <th scope="col">Doctor</th>
        <th scope="col">Hospital</th>
      </tr>
    </thead>
    <tbody>
        @foreach($referrals as $referral)
      <tr>


        <td>{{ $referral->title }}</td>
        <td>{{ $referral->procedure }}</td>
        <td>{{ $referral->recommendations }}</td>
        <td>{{ $referral->sending_doctor }}</td>
        <td>{{ $referral->sending_hospital }}</td>
      </tr>
      @endforeach
    </tbody>
</table>

@endsection
