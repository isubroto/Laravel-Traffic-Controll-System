@extends('welcome')
@section('title', 'Car Information')
@section('content')
    <div class="content">
        <div class="container-fluid">
            @if (Session()->has('danger'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span>
          Deleted Successfully</span>
      </div>
      @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">local_taxi</i>
                            </div>
                            <h4 class="card-title">Car Information <a href="{{route('CarAdd')}}" class="btn btn-primary float-right">Add Car</a></h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Car License Number</th>
                                            <th>Car Name</th>
                                            <th>Car Model</th>
                                            <th>Car Colour</th>
                                            <th>Owner Name</th>
                                            <th>Owner Number</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cars as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td class="text-center">{{ $item->tagno }}</td>
                                                <td> {{ $item->carname }} </td>
                                                <td> {{ $item->carmodel }} </td>
                                                <td> {{ $item->carcolor }} </td>
                                                <td> {{ $item->ownername }} </td>
                                                <td> {{ $item->ownertelephone }} </td>
                                                <td class="td-actions text-right">
                                                    <a style="color: white" href="{{route('EditRegisteredCar',Crypt::encryptString($item->id))}}" rel="tooltip" class="btn btn-success btn-round"
                                                        data-original-title="" title=" edit">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <a style="color: white" href="{{route('DeleteCardetails',Crypt::encryptString($item->id))}}" rel="tooltip" class="btn btn-danger btn-round"
                                                        data-original-title="" title=" Delete">
                                                        <i class="material-icons">close</i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
