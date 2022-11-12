@extends('welcome')
@section('title', 'Tax Information')
@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-rose card-header-icon">
              <div class="card-icon">
                <i class="material-symbols-outlined">barcode</i>
              </div>
              <h4 class="card-title">Tax <a href="{{route('paytax')}}" class="btn btn-primary float-right">Pay Tax</a></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped text-center">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Car License Number</th>
                      <th>Car Driver Name</th>
                      <th>Owner Name</th>
                      <th>Owner Number</th>
                      <th>Paid To</th>
                      <th class="text-right">Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($tax as $item)
                    <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->tagno}}</td>
                      <td>{{$item->driver_name}}</td>
                      <td>{{$item->owner_name}}</td>
                      <td>{{$item->ownertelephone}}</td>
                      <td>{{$item->Year}}</td>
                      <td class="text-right">${{$item->amount}}</td>
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