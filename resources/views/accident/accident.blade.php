@extends('welcome')
@section('title', 'Car Accident Information')
@section('content')
    <div class="content">
        <div class="container-fluid">
            @if (Session()->has('success'))
      <div class="alert alert-success col-md-12 mx-auto">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span>
          Information Deleted</span>
      </div>
      @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">car_crash</i>
                            </div>
                            <h4 class="card-title">Accident Information <a href="{{route('acc_crt')}}" class="btn btn-primary float-right">Add Record</a></h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Car License Number</th>
                                            <th>Driver Name</th>
                                            <th>Accident Type</th>
                                            <th>Fines</th>
                                            <th>Jail</th>
                                            <th>Date</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($accr as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->tagno }}</td>
                                                <td>{{ $item->D_NAME }}</td>
                                                <td>{{ $item->ACC_TYPE }}</td>
                                                <td>{{ $item->Fines }}</td>
                                                <td>{{ $item->Jail }}</td>
                                                <td>{{ $item->Date }}</td>
                                                <td class="td-actions text-right">
                                                    <a type="button" href="{{route('edtrcd',Crypt::encryptString($item->id))}}" style="color: white;" rel="tooltip"
                                                        class="btn btn-success" data-original-title="" title="Edit">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <a type="button" href="{{route('destroyRecord',Crypt::encryptString($item->id))}}" style="color: white;" rel="tooltip"
                                                        class="btn btn-danger" data-original-title="" title="Delete">
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
