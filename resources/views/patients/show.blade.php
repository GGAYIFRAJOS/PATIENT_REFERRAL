@extends('layouts.app')

@section('content')

<div class="row col-lg-9 col-md-9 col-sm-9 col-xs-3 float-left ">
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="well well-lg bg-warning" style="margin-left: 25px; padding: 10px; width: 100%;">

  <table class="table table-hover" id="dev-table">
            <tbody>
              <tr>
                <th>Name:</th>
                <td>{{ $patient->name }}</td>
              </tr>
              <tr>
                <th>Date Of Birth:</th>
                <td>{{ $patient->date_of_birth }}</td>
              </tr>
              <tr>
                <th>Age:</th>
                <td>{{ $patient->age }}</td>
              </tr>
              <tr>
                <th>Residence:</th>
                <td>{{ $patient->residence }}</td>
              </tr>
              <tr>
                <th>Contact:</th>
                <td>{{ $patient->contact }}</td>
              </tr>
              <tr>
                <th>Email:</th>
                <td>{{ $patient->email }}</td>
              </tr>

            </tbody>
          </table>


</div>
<hr>
<div class="container">
  <br><br>
  <h3 style="text-align: center;"><u><b>REFERRALS</b></u></h3>

<div class="col-md-12 col-lg-12 col-sm-12" style="background-color: white; margin: 10px;">

  <table class="table table-hover" id="dev-table">
            <thead>
              <tr>
                <th>No</th>
                <th>Title</th>
                <th>Patient</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Kilgore</td>
                <td>Trout</td>
                <td>kilgore</td>
              </tr>

            </tbody>
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
            <h4>Actions</h4>
            <ol class="list-unstyled">
              <li><a href="#">Edit</a></li>
              <br>
              <li><a href="#">Add Project</a></li>
              <br>
              <li><a href="#">List Of projects</a></li>
              <br>


			</li>

            </ol>
          </div>
</div>
</div>



@endsection
