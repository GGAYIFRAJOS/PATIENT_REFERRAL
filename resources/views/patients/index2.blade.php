@extends('layouts.app')

@section('content')

<div class="col-md-10 col-lg-10 float-left ">
<div class="panel bg-warning">
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

</div>
</div>

</div>


<div class="col-lg-2 col-md-2 float-right" style="border-left:1px solid black; height:100vh;">

    <div class="sidebar-module">
      <h3>Actions</h3>
      <hr>
      <ol class="list-unstyled">
        @if(Auth::user()->role_id == 2)
        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i>Home</a></li>
        <br>
        <li><a href="/patients"><i class="fas fa-hospital-user"></i>Patient List</a></li>
        <br>
        <li><a href="/patients/create"><i class="fas fa-pen"></i>Add Patient</a></li>
        <br>
        @endif
        <li><a href="/doctors"><i class="fas fa-book"></i>Doctors List</a></li>
        <br>

      </ol>
    </div>


</div>


@endsection
