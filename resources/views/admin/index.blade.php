@extends('layouts.admin')

@section('content')





    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard <small>Manage Your Site</small></h1>
          </div>
          <div class="col-md-2">
                   <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Site Analytics
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#">Add Pages</a></li>
    <li><a href="#">Add Posts</a></li>
    <li><a href="#">Add Users</a></li>
  </ul>
</div>
          </div>
        </div>
      </div>
    </header>
<br>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="active"> Admin Dashboard</li>
      </ol>
    </div>
  </section>


<section id="main">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="list-group">
      <a href="index.html" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        Dashboard Links
      </a>
    <a href="{{ route('show_all_hospitals')}}" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Hospitals</a>
      <a href="{{ route('show_all_doctors')}}" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Doctors</a>
      <a href="{{ route('show_all_patients')}}" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Patients</a>
      <a href="{{ route('show_all_referrals')}}" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Referrals</a>
    </div>

        <div class="well">
          <h4>Disk Space Used</h4>
          <div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
    10%
  </div>
</div>
<h4>Bandwidth Used</h4>
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 12%;">
    12%
  </div>
</div>
        </div>
      </div>
      <div class="col-md-9">
          <div class="panel panel-default">
  <div class="panel-heading" style="background-color:  #095f59;">
    <h3 class="panel-title">Website Overview</h3>
  </div>
  <div class="panel-body">
   <div class="col-md-3">
     <div class="well dash-box">
       <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span>{{ $hospitals_count }} </h2>
       <h4>Hospitals</h4>
     </div>
   </div>
   <div class="col-md-3">
     <div class="well dash-box">
       <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>{{$doctors_count}}</h2>
       <h4>Doctors</h4>
     </div>
   </div>
   <div class="col-md-3">
     <div class="well dash-box">
       <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>{{$patients_count}}</h2>
       <h4>Patients</h4>
     </div>
   </div>
   <div class="col-md-3">
     <div class="well dash-box">
       <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>{{$referrals_count}}</h2>
       <h4>Referrals</h4>
     </div>
   </div>
  </div>
</div>
<!--Latest User-->
<div class="panel panel-default">
  <div class="panel-heading"style="background-color:  #095f59;">
    <h3 class="panel-title">System Users</h3>
  </div>
  <div class="panel-body">
    <table class="table table-striped table-hover">
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    @foreach($users as $user)
    <tr>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->created_at }}</td>
      <td><a href="/users/{{ $user->id }}/edit"><button class="btn btn-primary"><i class="fas fa-pen"></i>EDIT</button></a></td>
      <td>
              <a href="#"
                    onclick="
                        var result = confirm('Are you sure you wish to delete this User?');

                        if(result){
                            event.preventDefault();
                            document.getElementById('delete-form').submit();
                        }

                    "
                  >
              <button class="btn btn-primary"><i class="fas fa-trash"></i>Delete</button></a>

              <form id="delete-form" action="{{ route('users.destroy', [$user->id]) }}"
                    method="POST" style="display: none;">
                      <input type="hidden" name="_method" value="delete">

                      {{ csrf_field() }}
              </form>

      </td>
    </tr>
    @endforeach
    </table>

  </div>
</div>

      </div>
    </div>
  </div>
</section>


  <footer id="footer">
    <p>Copyright : EREFERRAL<br>2020</p>
  </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="dist/js/bootstrap.min.js"></script>


@endsection
