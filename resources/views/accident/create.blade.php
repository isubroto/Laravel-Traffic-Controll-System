@extends('welcome')
@section('title', 'Add Accident Record')
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
          Information Added</span>
      </div>
      @endif
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
              <div class="card-icon">
                <i class="material-icons">car_crash</i>
              </div>
              <h4 class="card-title">Accident Record</h4>
            </div>
            <div class="card-body ">
              <form method="POST" action="{{route('createRecord')}}">
                @csrf
                <div class="form-group bmd-form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="tagno">Car License Number</label>
                        </div>
                        <div class="col-md-8">
                            <div class="dropdown bootstrap-select show-tick"><select class="selectpicker"
                                    data-style="select-with-transition" title="Choose License Number" data-size="7"
                                    tabindex="-98" name="tagno">
                                    <option disabled="">Options</option>
                                    @foreach ($tag as $item)
                                        <option value="{{ $item->tagno }}">{{ $item->tagno }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group bmd-form-group">
                  <label for="examplePass" class="bmd-label-floating">Driver Name</label>
                  <input type="text" class="form-control" id="examplePass" name="D_NAME">
                </div>
                <div class="form-group bmd-form-group">
                  <label for="examplePass" class="bmd-label-floating">Accident Type</label>
                  <input type="text" class="form-control" id="examplePass" name="ACC_TYPE">
                </div>
                <div class="form-group bmd-form-group">
                  <label for="examplePass" class="bmd-label-floating">Fines</label>
                  <input type="text" class="form-control" id="examplePass" name="Fines" value="0">
                </div>
                <div class="form-group bmd-form-group">
                  <label for="examplePass" class="bmd-label-floating">Jail</label>
                  <input type="text" class="form-control" id="examplePass" name="Jail" value="No">
                </div>
                <div class="form-group bmd-form-group is-filled">
                    <input type="text" name="Date" class="form-control datepicker" value="{{date("d/m/Y")}}">
                  </div>
                <div class="card-footer ">
                    <button type="submit" class="btn btn-fill btn-rose">Submit</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section("script")
<script>
    $(document).ready(function() {
      // initialise Datetimepicker and Sliders
      $(".datepicker").datetimepicker(
        {
            format:'DD/mm/YYYY',
        }
      );
    })

</script>
@endsection