@extends('layouts.app')

@section('content')



<div class="row col-lg-9 col-md-9 col-sm-9 col-xs-3 float-left " style="background-color: white;">

  <h1 style="margin-left: 40px; text-align: center;"><u>Edit Doctor Information</u></h1>
<br><br>
<div class="container">
   <form method="post" action="{{route('doctors.store')}}">
     {{ csrf_field() }}

     <div class="form-group">
       <label for="Doctor-name">Name<span class="required">*</span></label>

       <input placeholder="Enter Name"
              id="Doctor-name"
              required
              name="doctor_name"
              spellcheck="false"
              class="form-control"

              >
        @if($hospital_id != null)
        <input
              type="hidden"
              name="hospital_id"
              value="{{ $hospital_id }}"
              >

       @endif
    </div>



      @if($departments != null)
       <div class="form-group">
         <label for="department_id">Select Department</label>
         <select name="department_id" class="form-control">
          @foreach($departments as $department)
           <option value="{{$department->id}}">{{$department->name}}</option>
          @endforeach
         </select>
       </div>
       @endif


     <div class="form-group">
       <label for="contact">Contact<span class="required">*</span></label>

        <input placeholder="Enter Contact"
              id="contact"
              required
              name="contact"
              spellcheck="false"
              class="form-control"

              >
     </div>

      <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label">{{ __('E-Mail Address') }}</label>

        <div class="col-md-12">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
     </div>

     <div class="form-group">
       <label for="Project-content">Working Hours</label>

        <input placeholder="Enter Working Hours (Optional)"
              id="working_hours"
              required
              name="working_hours"
              spellcheck="false"
              class="form-control"

              >
     </div>

     <div class="form-group row">
      <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}<span class="required">*</span></label>

      <div class="col-md-12">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
     </div>

      <div class="form-group row">
          <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}<span class="required">*</span></label>

          <div class="col-md-12">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          </div>
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

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 float-right" >
    <div class="sidebar-module">
        <h3>Actions</h3>
        <hr>
        <ol class="list-unstyled">
          <li><a href="{{ route('hospitals.index') }}">Hospitals List</a></li>
          <br>
          <li><a href="{{ route('patients.index') }}">Patients List</a></li>
          <br>
          <li><a href="{{ route('referrals.index') }}">Referrals List</a></li>
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
