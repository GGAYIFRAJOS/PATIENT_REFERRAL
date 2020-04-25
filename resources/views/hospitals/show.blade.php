@extends('layouts.app')

@section('content')

<div class="row col-lg-10 col-md-10 col-sm-10 col-xs-3 float-left ">
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron" style="margin-left: 25px; width:100%;">
  <h1>{{$hospital->hospital_name}}</h1>
  <p class="lead"><b>Location: {{$hospital->location}}</b></p>
  <p class="lead"><b>Grade: {{$hospital->grade_id}}</b></p>


  <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p> -->
</div>

<div class="container">
<!-- Example row of columns -->
<div class="col-md-12 col-lg-12 col-sm-12" style=" margin: 10px;">

<a href="{{route('doctors.create')}}" class="float-right btn btn-primary"><i class="fas fa-pen"></i>Add  Doctor</a>
<br><br><br>
<div class=" row col-md-12 col-lg-12 col-sm-12" style="width:100%">
<table class="table">
    <h3 style="font-weight:700; align:center;"><u>DOCTOR LIST</u></h3>
    <thead class="thead-dark">
      <tr>

        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Contact</th>
        <th scope="col"><i class="fas fa-edit"></i>Edit</th>
        <th scope="col"><i class="fas fa-trash"></i>Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach($doctors as $doctor)
      <tr>


        <td>{{ $doctor->doctor_name }}</td>
        <td>{{ $doctor->email }}</td>
        <td>{{ $doctor->contact }}</td>
        <td><a href="/doctors/{{ $doctor->id }}/edit"><button class="btn btn-primary">EDIT</button></a></td>
        <td>
                <a href="#"
              		onclick="
              			var result = confirm('Are you sure you wish to delete this Doctor?');

              			if(result){
              				event.preventDefault();
              				document.getElementById('delete-form').submit();
              			}

              		"
					>
                <button class="btn btn-primary">Delete</button></a>

				<form id="delete-form" action="{{ route('doctors.destroy', [$doctor->id]) }}"
					  method="POST" style="display: none;">
						<input type="hidden" name="_method" value="delete">

						{{ csrf_field() }}
				</form>

        </td>
      </tr>
      @endforeach
    </tbody>
</table>
</div>
</div>
<hr>

</div> <!-- /container -->
</div>

<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 float-right" style="border-left:1px solid black; height:100vh;">

    <div class="sidebar-module">
      <h3>Actions</h3>
      <hr>
      <ol class="list-unstyled">
        <li><a href="{{ route('hospitals.index') }}"><i class="fas fa-hospital"></i>Hospitals List</a></li>
        <br>
        <li><a href="{{ route('patients.index') }}"><i class="fas fa-hospital-user"></i>Patients List</a></li>
        <br>
        <li><a href="{{ route('referrals.index') }}"><i class="fas fa-file-medical-alt"></i>Referrals List</a></li>
        <br>
        <li><a href="{{ route('departments.create') }}"><i class="fas fa-building"></i>Add Department</a></li>
        <br>
        @if(Auth::user()->role_id == 2)
        <li><a href="/patients">Patient List</a></li>
        <br>
        <li><a href="/patients/create">Add Patient</a></li>
        <br>
        @endif
      </ol>
    </div>


</div>

@endsection
