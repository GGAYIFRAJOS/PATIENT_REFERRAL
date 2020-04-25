@extends('layouts.app')

@section('content')

<div class="row col-lg-9 col-md-9 col-sm-9 col-xs-3 float-left ">

<div class="container">
   <form method="post" action="{{route('companies.update',[$company->id])}}">
     {{ csrf_field() }}

     <input type="hidden" name="_method" value="put">

     <div class="form-group">
       <label for="company-name">Name<span class="required">*</span></label>

       <input placeholder="Enter Name"
              id="company-name"
              required
              name="name"
              spellcheck="false"
              class="form-control"
              value="{{ $company->name }}"
              >
     </div>

     <div class="form-group">
       <label for="company-content">Description</label>

       <textarea placeholder="Enter Description"
              id="company-content"
              style="resize: vertical;"
              name="description"
              rows="5"
              spellcheck="false"
              class="form-control autosize-target text-left"
              value="{{ $company->description }}" >
       </textarea>
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

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 float-right"  style="border-left:1px solid black; height:100vh;">

          <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
              <li><a href="/companies/{{ $company->id }}">View Company</a></li>
              <li><a href="/companies">All Companies</a></li>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
</div>

@endsection
