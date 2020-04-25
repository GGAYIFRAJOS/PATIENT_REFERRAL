@extends('layouts.app')

@section('content')

<h1 style="margin-left: 40px; text-align: center;"><u>Edit User Info</u></h1>
<br><br>
<div class="container">
   <form method="post" action="{{route('users.update',['user_id'])}}">
     {{ csrf_field() }}

     <div class="form-group">
       <label for="name">Name<span class="required">*</span></label>

       <input placeholder="Enter Name"
              id="name"
              required
              name="name"
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



@endsection
