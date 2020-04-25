@extends('layouts.app')

@section('content')


<table class="table">
    <thead class="thead-dark">
      <tr>

        <th scope="col">Name</th>
        <th scope="col">Location</th>
        <th scope="col">Grade</th>
      </tr>
    </thead>
    <tbody>
        @foreach($hospitals as $hospital)
      <tr>


        <td>{{ $hospital->hospital_name }}</td>
        <td>{{ $hospital->location }}</td>
        <td>{{ $hospital->grade_id }}</td>
      </tr>
      @endforeach
    </tbody>
</table>

@endsection
