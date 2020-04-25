@extends('layouts.app')

@section('content')



<div class="row col-lg-10 col-md-10 float-left " style="border-left:1px solid black; height:100vh;">

  <h1 style="margin-left: 40px;"><u>Add New Patient</u></h1>

<div class="container">
   <form method="post" action="{{route('patients.store')}}">
     {{ csrf_field() }}

     <div class="form-group">
       <label for="Project-name">Name<span class="required">*</span></label>

       <input placeholder="Enter Name"
              id="Project-name"
              required
              name="patient_name"
              spellcheck="false"
              class="form-control"

              >
        @if($hospital->id != null)
        <input
              type="hidden"
              name="hospital_id"
              value="{{ $hospital->id }}"
              >

       @endif
       @if($user_id != null)
        <input
              type="hidden"
              name="user_id"
              value="{{ $user_id }}"
              >

       @endif
    </div>
     <div class="form-group">
       <label for="email">Email</label>

        <input placeholder="Enter Name"
              id="email"
              required
              name="email"
              spellcheck="false"
              class="form-control"

              >
     </div>

     <div class="form-group">
       <label for="contact">Contact</label>

        <input placeholder="Enter Contact"
              id="contact"
              required
              name="contact"
              spellcheck="false"
              class="form-control"

              >
     </div>


    <div class="form-group">
       <label for="age">Age</label>

        <input placeholder="Enter Age"
              id="age"
              required
              name="age"
              spellcheck="false"
              class="form-control"

              >
     </div>

     <div class="form-group">
       <label for="residence">Residence</label>

        <input placeholder="Enter Age"
              id="residence"
              required
              name="residence"
              spellcheck="false"
              class="form-control"

              >
     </div>

     <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Submit">
     </div>
   </form>
<div class="row col-lg-12 col-md-12 col-sm-12" style="background-color: white; margin: 10px;">

</div>
<hr>

</div> <!-- /container -->
</div>

<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 float-right">
    <!-- <div class="sidebar-module sidebar-module-inset">
      <h4>About</h4>
      <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div> -->
    <div class="sidebar-module">
      <h3>Actions</h3>
      <hr>
      <ol class="list-unstyled">
        <li><a href="{{ route('hospitals.show',$hospt_id) }}"><i class="fas fa-home"></i>Home</a></li>
        <br>
        <li><a href="{{ route('hospitals.index') }}"><i class="fas fa-hospital"></i> Hospitals List</a></li>
        <br>
        <li><a href="{{ route('patients.index') }}"><i class="fas fa-hospital-user"></i> Patients List</a></li>
        <br>
        <li><a href="{{ route('referrals.index') }}"><i class="fas fa-file-medical-alt"></i> Referrals List</a></li>
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
