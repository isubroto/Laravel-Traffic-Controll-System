@extends('welcome')
@section('title', 'Edit Profile')
@section('content')
<style>
  .register-page .card-signup .form-check {
   margin-top: 0px !important;
}

.card-signup .form-check {
  padding-top: 0px !important;
}
.input-group .input-group-text {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px 30px 0 0px;
    background-color: transparent;
    border-color: transparent;
    color: #AAAAAA;
}
.card .form-check {
    margin-top: 25px;
}
</style>
<div class="content">
    <div class="container-fluid">
      @if (Session()->has('success'))
      <div class="alert alert-success col-md-9 mx-auto">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span>
          Information Updated</span>
      </div>
      @endif
      <div class="row">
        <div class="col-md-9 mx-auto">
          <div class="card">
            <div class="card-header card-header-icon card-header-rose">
              <div class="card-icon">
                <i class="material-icons">perm_identity</i>
              </div>
              <h4 class="card-title">Edit Profile
              </h4>
            </div>
            <div class="card-body">
              <form action="{{route('user.profile.update')}}" method="POST">
                @csrf
                @method('POST')
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Email (disabled)</label>
                      <input type="text" class="form-control" disabled="" value="{{Auth::User()->email}}">
                      <input type="hidden" name="email" value="{{Auth::User()->email}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Fist Name</label>
                      <input type="text" class="form-control" value="{{Auth::User()->name}}" name="name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Last Name</label>
                      <input type="text" class="form-control" value="{{Auth::User()->surname}}" name="surname">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Mobile Number</label>
                      <input type="text" class="form-control" value="{{Auth::User()->mobile_number}}" name="mobile_number">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-default">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            Gender
                          </span>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="Gender" value="M" {{Auth::User()->Gender ==='M' ? 'checked' : ''}}> Male
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="Gender" value="F" {{Auth::User()->Gender ==='F' ? 'checked' : ''}}> Female
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Adress</label>
                      <input type="text" class="form-control" name="address" value="{{Auth::User()->address}}">
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-rose pull-right">Update Profile</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection