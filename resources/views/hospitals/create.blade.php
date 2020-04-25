@extends('layouts.app')

@section('content')



<div class="container" style="margin:auto;">

  <h1 style="margin-left: 40px;">Create New hospital</h1>

<div class="container">
   <form method="post" action="{{route('hospitals.store')}}">
     {{ csrf_field() }}

     <div class="form-group">
       <label for="hospital-name">Name<span class="required">*</span></label>

       <input placeholder="Enter Name"
              id="hospital-name"
              required
              name="hospital_name"
              spellcheck="false"
              class="form-control"

              >
     </div>

     <div class="form-group">
       <label for="hospital-location">Location<span class="required">*</span></label>

       <input placeholder="Enter Location"
              id="hospital-location"
              required
              name="location"
              spellcheck="false"
              class="form-control"

              >
     </div>

     <div class="form-group">
       <label for="hospital-grade">Grade<span class="required">*</span></label>

       @if($grades != null)
       <div class="form-group">
         <label for="grade_id">Select Grade</label>
         <select name="grade_id" class="form-control">
          @foreach($grades as $grade)
           <option value="{{$grade->id}}">{{$grade->name}}</option>
          @endforeach
         </select>
       </div>
       @endif


         <input
              type="hidden"
              name="user_id"
              value="{{ $user_id }}"
              >
     </div>



     <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Submit" style="">
     </div>
   </form>

    <hr>

</div> <!-- /container -->
</div>

</div>

@endsection
