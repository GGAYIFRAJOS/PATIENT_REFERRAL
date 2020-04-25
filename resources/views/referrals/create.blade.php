@extends('layouts.app')

@section('content')



<div class="row col-lg-9 col-md-9 col-sm-9 col-xs-3 float-left " style="background-color: white;">

  <h1 style="margin-left: 40px;">Create New Referral</h1>

<div class="container">
   <form method="post" action="{{route('referrals.store')}}">
     {{ csrf_field() }}

    @if($patients != null)
       <div class="form-group">
         <label for="patient_id">Select Patient<span class="required">*</span></label>
         <select name="patient_id" class="form-control">
          @foreach($patients as $patient)
           <option value="{{$patient->id}}">{{$patient->patient_name}}</option>
          @endforeach
         </select>
       </div>
    @endif

    @if($hospitals != null)
       <div class="form-group">
         <label for="hos_id">Select Hospital<span class="required">*</span></label>
         <select name="hos_id" class="form-control">
          @foreach($hospitals as $hospital)
           <option value="{{$hospital->id}}">{{$hospital->hospital_name}}</option>
          @endforeach
         </select>
       </div>
    @endif

    @if($doctors != null)
       <div class="form-group">
         <label for="doc_id">Select Doctor<span class="required">*</span></label>
         <select name="doc_id" class="form-control">
          @foreach($doctors as $doctor)
           <option value="{{$doctor->id}}">{{$doctor->doctor_name}}</option>
          @endforeach
         </select>
       </div>
    @endif

     <div class="form-group">
       <label for="Project-name">Title<span class="required">*</span></label>

       <input placeholder="Enter Title"
              id="title"
              required
              name="title"
              spellcheck="false"
              class="form-control"

              >

       @if($user_id != null)
        <input
              type="hidden"
              name="user_id"
              value="{{ $user_id }}"
              >

       @endif

       @if($doctor_id != null)
        <input
              type="hidden"
              name="doctor"
              value="{{ $doctor }}"
              >

       @endif

       @if($hospital_id != null)
        <input
              type="hidden"
              name="hospital"
              value="{{ $hospital }}"
              >

       @endif
    </div>
     <div class="form-group">
       <label for="procedure">Procedure</label>

        <input placeholder="Enter Procedure"
              id="procedure"
              required
              name="procedure"
              spellcheck="false"
              class="form-control"

              >
     </div>

     <div class="form-group">
       <label for="diagnosis">Diagnosis</label>

         <textarea placeholder="Enter Diagnosis"
              id="diagnosis"
              style="resize: vertical;"
              name="diagnosis"
              rows="5"
              spellcheck="false"
              class="form-control autosize-target text-left"
               >
       </textarea>
     </div>

      <div class="form-group">
       <label for="lab_report">Lab Report</label>

        <textarea placeholder="Lab Report"
              id="lab_report"
              style="resize: vertical;"
              name="lab_report"
              rows="5"
              spellcheck="false"
              class="form-control autosize-target text-left"
               >
       </textarea>
     </div>

     <div class="form-group">
       <label for="contact">Drug Allergies</label>

        <input placeholder="Drud Allergies"
              id="drug_allergies"
              required
              name="drug_allergies"
              spellcheck="false"
              class="form-control"

              >
     </div>



      <div class="form-group">
       <label for="drugs_offered">Drugs Offered</label>

        <input placeholder="Drugs Offered"
              id="drugs_offered"
              required
              name="drugs_offered"
              spellcheck="false"
              class="form-control"

              >
     </div>

     <div class="form-group">
       <label for="recommendations">Recommendations</label>

         <textarea placeholder="Enter Description"
              id="recommendations"
              style="resize: vertical;"
              name="recommendations"
              rows="5"
              spellcheck="false"
              class="form-control autosize-target text-left"
               >
       </textarea>
     </div>

     <div class="form-group">
       <label for="next_of_kin">Next Of Kin</label>

        <input placeholder="Next Of Kin"
              id="next_of_kin"
              required
              name="next_of_kin"
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

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 float-right" >
          <!-- <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> -->
          <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
              <li><a href="/Projects">View Projects</a></li>
              <li><a href="/Projects">All Projects</a></li>
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
