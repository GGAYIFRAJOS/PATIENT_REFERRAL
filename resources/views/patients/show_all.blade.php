@extends('layouts.app')

@section('content')

<table class="table">
    <thead class="thead-dark">
      <tr>

        <th scope="col">Name</th>
        <th scope="col">Contact</th>
        <th scope="col">Residence</th>
      </tr>
    </thead>
    <tbody>
        @foreach($patients as $patient)
      <tr>


        <td>{{ $patient->patient_name }}</td>
        <td>{{ $patient->contact }}</td>
        <td>{{ $patient->residence }}</td>
      </tr>
      @endforeach
    </tbody>
</table>

@endsection
