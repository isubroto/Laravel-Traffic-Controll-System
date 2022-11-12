@extends('welcome')
@section('title', 'Tax Payment')
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
            @if (Session()->has('Esist'))
      <div class="alert alert-danger col-md-9 mx-auto">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span>
          Already Paid</span>
      </div>
      @endif
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card ">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-symbols-outlined">barcode</i>
                            </div>
                            <h4 class="card-title">Pay Tax</h4>
                        </div>
                        <div class="card-body ">
                            <form method="POST" action="{{route('Pay')}}">
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
                                    <label class="bmd-label-floating">Driver Name</label>
                                    <input type="text" class="form-control"  name="driver_name">
                                  </div>
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Owner Name</label>
                                    <input type="text" class="form-control" id="owner" name="owner_name" value=" " readonly>
                                  </div>
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Amount</label>
                                    <input type="text" class="form-control"  name="amount">
                                  </div>
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Year</label>
                                    <input type="text" class="form-control"  name="Year" readonly value="{{ date('Y') }}">
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
    $(document).on("change","select.selectpicker",function () {
        $.post("/tax/owner/"+$(".selectpicker option:selected").val(),{'_token': '{{csrf_token()}}'},function(data){
            $('#owner').val(data[0].ownername);
        })
    });
</script>
@endsection
