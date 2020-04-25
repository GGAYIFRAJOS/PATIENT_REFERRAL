@extends('layouts.app')

@section('content')

<div class="row col-lg-9 col-md-9 col-sm-9 col-xs-3 float-left ">

<div class="container">
<!-- Example row of columns -->
<br><br><br>
<h3 style="text-align: center;"><u><b>DEPARTMENTS</b></u></h3>

<table class="table table-hover" id="dev-table">
    <thead class="thead-dark">
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Description</th>
      </tr>
    </thead>
@foreach($departments as $department)
    <tbody>
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $department->name }}</td>
        <td>{{ $department->description }}</td>

      </tr>

    </tbody>

@endforeach
    </table>

</div>
</div>
</div>



<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 float-right" style="border-left:1px solid black; height:100vh;">
          <!-- <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> -->
          <div class="sidebar-module">
            <h3>Actions</h3>
            <hr>
            <ol class="list-unstyled">
            <li><a href="{{ route('hospitals.show',$hospital->id) }}">Home</a></li>
                <br>
              <li><a href="{{ route('patients.index') }}">Patients List</a></li>
              <br>
              <li><a href="{{ route('referrals.index') }}">Referrals List</a></li>
              <br>
              <li><a href="{{ route('departments.create') }}">Add Departments</a></li>
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
