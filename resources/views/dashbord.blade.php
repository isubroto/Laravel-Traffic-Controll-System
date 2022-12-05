@extends('welcome')
@section('title', 'Dashboard')
    @section('content')
    <style>
      #arrowback,#arrowup,#arrowfor,#arrowdown{
        box-shadow: 0px 0px 12px 7px rgba(0,0,0,0.1);
        -webkit-box-shadow: 0px 0px 12px 7px rgba(0,0,0,0.1);
        -moz-box-shadow: 0px 0px 12px 7px rgba(0,0,0,0.1);
      }
      .styleok{
        min-height: 250px; min-width:250px; border:1px solid rgb(1, 252, 1); overflow:hidden; text-align:center;align-self: center;
      }
      .styledanger{
        min-height: 250px; min-width:250px; border:1px solid rgb(246, 47, 47); overflow:hidden; text-align:center;align-self: center;
      }
    </style>
      <div class="content">
        <div class="content">
          <div class="container-fluid">
            <h3>Manage Roads Traffic <div class="togglebutton d-none">
              <label>
                <input type="checkbox" id="automated" checked>
                <span class="toggle"></span>
                <span id="value">Manual</span>
              </label>
            </div></h3>
            <br>
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon mb-2">
                      <i class="material-symbols-outlined">arrow_back</i>
                    </div>
                    <p class="card-category">Vehicle Count: <span id='backvehicle'></span></p>
                    <div class="card-title styleok" id="arrowback" style="">Cam 01</div>
                  </div>
                  <div class="card-footers">
                    <div class="row mt-2">
                      <div class="col-9">
                        <div class="d-flex justify-content-between">
                          <span class="ml-3 mt-3"></span>
                        <button class="btn btn-danger" id="arrowback_btn" disabled>
                          Allow
                        </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon mb-2">
                      <i class="material-symbols-outlined">arrow_upward</i>
                    </div>
                    <p class="card-category">Vehicle Count: <span id='upvehicle'></span></p>
                    <div class="card-title styledanger" id="arrowup" style="">Cam 02</div>
                  </div>
                  <div class="card-footers">
                    <div class="row mt-2">
                      <div class="col-9">
                        <div class="d-flex justify-content-between">
                          <span class="ml-3 mt-3"></span>
                        <button class="btn btn-danger" id="arrowup_btn" disabled>
                          Allow
                        </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon mb-2">
                      <i class="material-symbols-outlined">arrow_forward</i>
                    </div>
                    <p class="card-category">Vehicle Count: <span id="forvehicel"></span></p>
                    <div class="card-title styledanger" id="arrowfor" style="">Cam 03</div>
                  </div>
                  <div class="card-footers">
                    <div class="row mt-2">
                      <div class="col-9">
                        <div class="d-flex justify-content-between">
                          <span class="ml-3 mt-3"></span>
                        <button class="btn btn-danger" id="arrowfor_btn" disabled>
                          Allow
                        </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon mb-2">
                      <i class="material-symbols-outlined">arrow_downward</i>
                    </div>
                    <p class="card-category">Vehicle Count: <span id="downvehicle">20</span></p>
                    <div class="card-title styledanger" id="arrowdown" style="">Cam 04</div>
                  </div>
                  <div class="card-footers">
                    <div class="row mt-2">
                      <div class="col-9">
                        <div class="d-flex justify-content-between">
                          <span class="ml-3 mt-3"></span>
                        <button type="submit" class="btn btn-danger" id="arrowdown_btn" disabled>
                          Allow
                        </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endsection
      @section('script')
      <script>
        $(document).on('change', 'input[type="checkbox"]', function(){
          if ($(this).is(':checked')) {
            $('#value').html("Manual");
            $("#arrowdown_btn").attr('disabled', false);
            $("#arrowup_btn").attr('disabled', false);
            $("#arrowfor_btn").attr('disabled', false);
            $("#arrowback_btn").attr('disabled', false);
          }
          else if(!$(this).is(':checked')){
            $('#value').html("Automated");
            $("#arrowdown_btn").attr('disabled', true);
            $("#arrowup_btn").attr('disabled', true);
            $("#arrowfor_btn").attr('disabled', true);
            $("#arrowback_btn").attr('disabled', true);
          }
        })
       $(document).on("click","button#arrowback_btn",function(){
        $('#arrowback').removeClass('styledanger');
        $('#arrowback').removeClass('text-danger');
        $('#arrowback').addClass('styleok');
        $('#arrowup').addClass('styledanger');
        $('#arrowfor').addClass('styledanger');
        $('#arrowdown').addClass('styledanger');
        $('#arrowfor').removeClass('styleok');
        $('#arrowup').removeClass('styleok');
        $('#arrowdown').removeClass('styleok');
        $.post("/Dashboard/Change",{'_token': '{{csrf_token()}}','value':traffic_info,'stutas':'backward'},function(data){
          traffic_info =JSON.parse(data);
          $('#styleok').removeClass('styleok');
          stutas();
        })
       })
       $(document).on("click","button#arrowup_btn",function(){
        $('#arrowup').removeClass('styledanger');
        $('#arrowup').removeClass('text-danger');
        $('#arrowup').addClass('styleok');
        $('#arrowback').addClass('styledanger');
        $('#arrowfor').addClass('styledanger');
        $('#arrowdown').addClass('styledanger');
        $('#arrowfor').removeClass('styleok');
        $('#arrowback').removeClass('styleok');
        $('#arrowdown').removeClass('styleok');
        $.post("/Dashboard/Change",{'_token': '{{csrf_token()}}','value':traffic_info,'stutas':'upward'},function(data){
          traffic_info =JSON.parse(data);
          stutas();
        })
       })
       $(document).on("click","button#arrowfor_btn",function(){
        $('#arrowfor').removeClass('styledanger');
        $('#arrowfor').removeClass('text-danger');
        $('#arrowfor').addClass('styleok');
        $('#arrowup').addClass('styledanger');
        $('#arrowback').addClass('styledanger');
        $('#arrowdown').addClass('styledanger');
        $('#arrowup').removeClass('styleok');
        $('#arrowback').removeClass('styleok');
        $('#arrowdown').removeClass('styleok');
        $.post("/Dashboard/Change",{'_token': '{{csrf_token()}}','value':traffic_info,'stutas':'forward'},function(data){
          traffic_info =JSON.parse(data);
          stutas();
        })
       })
       $(document).on("click","button#arrowdown_btn",function(){
        $('#arrowdown').removeClass('styledanger');
        $('#arrowdown').removeClass('text-danger');
        $('#arrowdown').addClass('styleok');
        $('#arrowup').addClass('styledanger');
        $('#arrowback').addClass('styledanger');
        $('#arrowfor').addClass('styledanger');
        $('#arrowup').removeClass('styleok');
        $('#arrowback').removeClass('styleok');
        $('#arrowfor').removeClass('styleok');
        $.post("/Dashboard/Change",{'_token': '{{csrf_token()}}','value':traffic_info,'stutas':'downward'},function(data){
          traffic_info =JSON.parse(data);
          stutas();
        })
       })
       $(function(){setInterval(function(){ 
        stutas()
}, 1000);
})
  function stutas(){
    $.post("/Dashboard/status",{'_token': '{{csrf_token()}}','value':traffic_info},function(data){
        data=JSON.parse(data);
        $("#backvehicle").html(data.backward);
        if(data.backwordalrt=='denger'){
          $("#backvehicle").addClass('text-danger');
        }
        $("#upvehicle").html(data.upward);
        if(data.upwardalrt=='denger'){
          $("#upvehicle").addClass('text-danger');
        }
        $("#forvehicel").html(data.forward);
        if(data.forwarddalrt=='denger'){
          $("#forvehicel").addClass('text-danger');
        }
        $("#downvehicle").html(data.downward);
        if(data.downwarddalrt=='denger'){
          $("#downvehicle").addClass('text-danger');
        }
        if($('#arrowback').hasClass('styleok')){
          $('#arrowback_btn').attr("disabled",true);
        }
        else{
          $('#arrowback_btn').attr("disabled",false);
        }
        if($('#arrowfor').hasClass('styleok')){
          $('#arrowfor_btn').attr("disabled",true);
        }
        else{
          $('#arrowfor_btn').attr("disabled",false);
        }
        if($('#arrowup').hasClass('styleok')){
          $('#arrowup_btn').attr("disabled",true);
        }
        else{
          $('#arrowup_btn').attr("disabled",false);
        }
        if($('#arrowdown').hasClass('styleok')){
          $('#arrowdown_btn').attr("disabled",true);
        }
        else{
          $('#arrowdown_btn').attr("disabled",false);
        }
      })
  }
  </script>
      @endsection
