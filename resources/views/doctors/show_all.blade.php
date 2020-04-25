@extends('layouts.app')

@section('content')


<table class="table">
    <thead class="thead-dark">
      <tr>

        <th scope="col">Name</th>
        <th scope="col">Contact</th>
        <th scope="col">Working Hours</th>
      </tr>
    </thead>
    <tbody>
        @foreach($doctors as $doctor)
      <tr>


        <td>{{ $doctor->doctor_name }}</td>
        <td>{{ $doctor->contact }}</td>
        <td>{{ $doctor->working_hours }}</td>
      </tr>
      @endforeach
    </tbody>
</table>

@endsection
