@extends('welcome')
@section('title', 'Profile')
@section('content')
<style>
    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 12px 8px;
    vertical-align: middle;
    border:0 !important;
}
.table th, .table td {
    padding: 0.75rem;
    vertical-align: top;
    border:0 !important;
}
</style>
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-9 mx-auto">
          <div class="card card-profile">
            <div class="card-avatar">
              <a href="#pablo">
                <img class="img" src="{{Auth::user()->Gender==='M' ? '../assets/img/faces/face-icon-male.png' : '../assets/img/faces/face-icon-female.jpg'}}">
              </a>
            </div>
            <div class="card-body">
              <h6 class="card-category text-gray">{{Auth::User()->user}} Information</h6>
              <h4 class="card-title">{{Auth::user()->name}} {{Auth::user()->surname}}</h4>
              <p class="card-description">
                <div class="card card-plain">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table w-50 mx-auto">
                          <tbody>
                            <tr>
                              <td class=' w-32'>
                                <b>First Name:</b>
                              </td>
                              <td>
                                {{Auth::user()->name}}
                              </td>
                            </tr>
                            <tr>
                              <td class=' w-32'>
                                <b>Last Name:</b>
                              </td>
                              <td>
                                {{Auth::user()->surname}}
                              </td>
                            </tr>
                            <tr>
                              <td class='w-32'>
                                <b>Address:</b>
                              </td>
                              <td>
                                {{Auth::user()->address}}
                              </td>
                            </tr>
                            <tr>
                              <td class='w-32'>
                                <b>Mobile Number:</b>
                              </td>
                              <td>
                                {{Auth::user()->mobile_number}}
                              </td>
                            </tr>
                            <tr>
                              <td class='w-32'>
                                <b>Email:</b>
                              </td>
                              <td>
                                {{Auth::user()->email}}
                              </td>
                            </tr>
                            <tr>
                              <td class='w-32'>
                                <b>Gender:</b>
                              </td>
                              <td>
                                {{Auth::user()->Gender ==="M" ? "Male"  : "Female" }}
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
              </p>
              <a href="{{route('user.profile.edit')}}" class="btn btn-rose btn-round">Edit Profile</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
@endsection