@extends('layouts.app')

@section('content')

<div class="col-md-10 col-lg-10  float-left">
    <div class="panel bg-warning">
        <h3 style="text-align:center; font-weight:700;"><u>HOSPITAL DOCTORS LIST</u></h3>
        <br>
        <table class="table">
            <thead class="thead-dark">
              <tr>

                <th scope="col">Name</th>
                <th scope="col">Department</th>
                <th scope="col">Working Hours</th>
              </tr>
            </thead>
            <tbody>
                @foreach($doctors as $doctor)
              <tr>


                <td>{{ $doctor->doctor_name }}</td>
                <td>{{ $doctor->department }}</td>
                <td>{{ $doctor->working_hours }}</td>
              </tr>
              @endforeach
            </tbody>
        </table>

    </div>
    </div>

</div>

<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 float-right" style="border-left:1px solid black; margin-top:0; height:100vh;">
    <!-- <div class="sidebar-module sidebar-module-inset">
      <h4>About</h4>
      <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div> -->
    <div class="sidebar-module">
      <h3>Actions</h3>
      <hr>
      <ol class="list-unstyled">

        @if(Auth::user()->role_id == 2)
        <li><a href="{{ route('hospitals.show',$hospital_id) }}"><i class="fas fa-home"></i>Home</a></li>
        <br>
        <li><a href="{{ route('hospitals.index') }}"><i class="fas fa-hospital"></i> Hospitals List</a></li>
        <br>
        <li><a href="{{ route('patients.index') }}"><i class="fas fa-hospital-user"></i> Patients List</a></li>
        <br>
        <li><a href="/patients/create">Add Patient</a></li>
        <br>
        @else
        <li><a href="{{ route('hospitals.index') }}"><i class="fas fa-hospital"></i>Hospitals List</a></li>
        <br>
        <li><a href="{{ route('patients.index') }}"><i class="fas fa-hospital-user"></i>Patients List</a></li>
        <br>
        <li><a href="{{ route('referrals.index') }}"><i class="fas file-medical-alt"></i>Referrals List</a></li>
        <br>
        @endif

      </ol>
    </div>


</div>

@endsection
