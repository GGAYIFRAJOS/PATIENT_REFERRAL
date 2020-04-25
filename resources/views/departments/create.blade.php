@extends('layouts.app')

@section('content')



<div class="row col-lg-9 col-md-9 col-sm-9 col-xs-3 float-left " style="background-color: white;">

  <h1 style="margin-left: 40px; text-align: center;"><u>Add New Departments</u></h1>
<br><br>
<div class="container">
   <form method="post" action="{{route('departments.store')}}">
     {{ csrf_field() }}

     <div class="form-group">
       <label for="department_name">Department Name<span class="required">*</span></label>

       <input placeholder="Enter Name"
              id="department_name"
              required
              name="dept_name"
              spellcheck="false"
              class="form-control"

        >
     </div>
     <div class="form-group">
        <label for="department_description">Department Description<span class="required">*</span></label>
        <input placeholder="Enter Description"
              id="department_description"
              required
              name="dept_des"
              spellcheck="false"
              class="form-control"

        >
     </div>

     <div class="form-group">
              <input type="submit" class="btn btn-primary float-right" value="Submit">
     </div>
   </form>
<div class="row col-lg-12 col-md-12 col-sm-12" style="background-color: white; margin: 10px;">

</div>
<hr>

</div> <!-- /container -->
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 float-right" style="border-left:1px solid black; height:100vh;">
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
