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
                <th>Sending Doctor</th>
                <th>Sending Hospital</th>
                <th>Date</th>
                <th>Status</th>
                <th>Update</th>
              </tr>
            </thead>
		@foreach($referrals as $referral)
            <tbody>
              <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $referral->patient_name }}</td>
                <td>{{ $referral->title }}</td>
                <td>{{ $referral->diagnosis }}</td>
                <td>{{ $referral->lab_report }}</td>
                <td>{{ $referral->recommendations }}</td>
                <td>{{ $referral->sending_doctor }}</td>
                <td>{{ $referral->sending_hospital }}</td>
                <td>{{ $referral->created_at }}</td>
                <td>{{ $referral->status }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        UPDATE
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Update Referral</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{route('referrals.update',[$referral->id])}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="put">
                                    <div class="form-group">
                                        <label for="stat">Select Status<span class="required">*</span></label>
                                        <select name="stat" class="form-control">
                                         @foreach($status as $stat)
                                          <option value="{{$stat->name}}">{{$stat->name}}</option>
                                         @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="date_set">Set Date</label>
                                        <input placeholder="Enter format YYYY/MM/DD"
                                            id="date_set"
                                            required
                                            name="set_date"
                                            spellcheck="false"
                                            class="form-control"

                                        >
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </div>
                                </form>
                            </div>

                          </div>
                        </div>
                      </div>
                </td>
              </tr>

            </tbody>

		@endforeach
			</table>

</div>
</div>

@endsection
