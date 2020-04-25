@extends('layouts.app')

@section('content')

<div class="col-md-12 col-lg-12 ">
<div class="panel bg-warning">

		<table class="table table-hover" id="dev-table">
            <thead class="thead-dark">
              <tr>
                <th>No</th>
                <th>Patient name</th>
                <th>Title</th>
                <th>Diagnosis</th>
                <th>Lab Report</th>
                <th>Recommendations</th>
                <th>Doctor Name</th>
                <th>Hospital Name</th>
                <th>Date</th>
                <th>Status</th>
              </tr>
            </thead>
		@foreach($referrals as $referral)
            @if ($referral->status == 'SENT')
            <tbody bg-success>
            @else
            <tbody bg-primary>
            @endif
              <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $referral->patient_name }}</td>
                <td>{{ $referral->title }}</td>
                <td>{{ $referral->diagnosis }}</td>
                <td>{{ $referral->lab_report }}</td>
                <td>{{ $referral->recommendations }}</td>
                <td>{{ $referral->doctor_name }}</td>
                <td>{{ $referral->hospital_name }}</td>
                <td>{{ $referral->created_at }}</td>
                <td>{{ $referral->status }}</td>
              </tr>

            </tbody>

		@endforeach
			</table>

</div>
</div>

@endsection
