@extends('welcome')
@section('title', 'Register Car Information')
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
            Car has been registered</span>
      </div>
      @endif
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card ">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-symbols-outlined">taxi_alert</i>
                            </div>
                            <h4 class="card-title">Register New Car</h4>
                        </div>
                        <div class="card-body ">
                            <form method="POST" action="{{ route('CarRegistered') }}">
                                @csrf
                                <div class="form-group bmd-form-group">
                                    <label for="exampleEmail" class="bmd-label-floating">Car License Number</label>
                                    <input type="text" class="form-control" name="tagno">
                                </div>
                                <div class="form-group bmd-form-group">
                                    <label for="examplePass" class="bmd-label-floating">Car Name</label>
                                    <input type="text" class="form-control" name="carname">
                                </div>
                                <div class="form-group bmd-form-group">
                                    <label for="examplePass" class="bmd-label-floating">Car Model</label>
                                    <input type="text" class="form-control" name="carmodel">
                                </div>
                                <div class="form-group bmd-form-group">
                                    <label for="examplePass" class="bmd-label-floating">Car Colour</label>
                                    <input type="text" class="form-control" name="carcolor">
                                </div>
                                <div class="form-group bmd-form-group">
                                    <label for="examplePass" class="bmd-label-floating">Owner Name</label>
                                    <input type="text" class="form-control" name="ownername">
                                </div>
                                <div class="form-group bmd-form-group">
                                    <label for="examplePass" class="bmd-label-floating">Owner Number</label>
                                    <input type="text" class="form-control" name="ownertelephone">
                                </div>
                                <button type="submit" class="btn btn-fill btn-rose">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
