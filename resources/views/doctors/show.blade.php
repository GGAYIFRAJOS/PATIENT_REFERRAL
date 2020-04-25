@extends('layouts.app')

@section('content')

<div class="row col-lg-9 col-md-9 col-sm-9 col-xs-3 float-left ">
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="well well-lg bg-primary" style="color: white; margin-left: 25px; padding: 10px; width: 100%;">
  <h1><u>{{$doctor->doctor_name}}</u></h1>
  <h3>DEPARTMENT: </h3><p class="lead">{{$department->name}}</p>
  <h3>DESCRIPTION: </h3><p class="lead">{{$department->description}}</p>
  <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p> -->
</div>



<div class="container">
<!-- Example row of columns -->
<br><br><br>
<h3 style="text-align: center;"><u><b>REFERRALS</b></u></h3>

<div class="col-md-12 col-lg-12 col-sm-12" style="background-color: white; margin: 10px;">
<a class="float-right btn btn-primary" href="/referrals/create/{{ $doctor->id }}"><i class="fas fa-pen"></i>Create New</a>
<table class="table table-hover" id="dev-table">
    <thead class="thead-dark">
      <tr>
        <th>No</th>
        <th>Patient name</th>
        <th>Title</th>
        <th>Diagnosis</th>
        <th>Recommendations</th>
        <th>Date</th>
        <th>Status</th>
      </tr>
    </thead>
@foreach($referrals as $referral)
    <tbody>
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $referral->patient_name }}</td>
        <td>{{ $referral->title }}</td>
        <td>{{ $referral->diagnosis }}</td>
        <td>{{ $referral->recommendations }}</td>
        <td>{{ $referral->created_at }}</td>
        <td>{{ $referral->status }}</td>

      </tr>

    </tbody>

@endforeach
    </table>

</div>
</div>
</div>



<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 float-right" style="border-left:1px solid black; height:100vh; align:center;">

          <div class="sidebar-module">
            <h3>Actions</h3>
            <hr>
            <ol class="list-unstyled">
              @if(Auth::user()->role_id == 2)
              <li><a href="{{ route('hospitals.index') }}"><i class="fas fa-hospital"></i>Hospital List</a></li>
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
