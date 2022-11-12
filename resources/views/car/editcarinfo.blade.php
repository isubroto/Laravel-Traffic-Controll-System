@extends('welcome')
@section('title', 'Update Car Information')
@section('content')
<div class="content">
    <div class="container-fluid">
        @if ($errors->any())
        <div class="alert alert-danger col-md-8 mx-auto">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div>
@endif
@if (Session()->has('success'))
      <div class="alert alert-success col-md-8 mx-auto">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span>
          Information Updated</span>
      </div>
      @endif
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="card">
            <div class="card-header card-header-icon card-header-rose">
              <div class="card-icon">
                <i class="material-symbols-outlined">
                    no_crash</i>
              </div>
              <h4 class="card-title">Update Form -
                <small class="category">Update Car Information</small>
              </h4>
            </div>
            <div class="card-body">
              <form action="{{route('EditCardetails')}}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Car License Number</label>
                      <input type="hidden" name="id" value="{{Crypt::encryptString($cars->id)}}">
                      <input type="text" class="form-control" name="tagno" value="{{$cars->tagno}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Car Name</label>
                          <input type="text" class="form-control" name="carname" value="{{$cars->carname}}">
                        </div>
                      </div>
                  <div class="col-md-4">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Car Model</label>
                      <input type="text" class="form-control" name="carmodel" value="{{$cars->carmodel}}">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Car Colour</label>
                      <input type="text" class="form-control" name="carcolor" value="{{$cars->carcolor}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Owner Name</label>
                      <input type="text" class="form-control" name="ownername" value="{{$cars->ownername}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Owner Number</label>
                      <input type="text" class="form-control" name="ownertelephone" value="{{$cars->ownertelephone}}">
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-rose pull-right">Update Information</button>
                <div class="clearfix"></div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection