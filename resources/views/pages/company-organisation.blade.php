@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<div class="container">
  <div class="container">

    <div class="row">
      <div id="flFormsGrid" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
                    <div class="form-row mb-0">
                      <div class="form-group col-md-4">
                        
                       <input type="text" class="form-control"  name="" placeholder="Super Admin"
                     autocomplete="off" style="margin-left: 300px;" >
                     </div>
                       </div>
             
                  <svg xmlns="http://www.w3.org/2000/svg" style="width: 4%; height:0%;margin-left: 450px;"
                    fill="currentColor" class="bi bi-plus add" viewBox="0 0 16 16">
                    <path
                      d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                   </svg>
                      <div id="new_chq"  class="form-row mb-0"></div>
                         <input type="hidden" class="form-control" value="1" placeholder="Super Admin" id="total_chq">
              </div>
           </div>
        </div>
    </div>
  </div>
</div>

<script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script>
  $(document).ready(function () {
    //alert('h');
    var i = 1;
    $('.add').on('click', add);

  function add() {

  var new_chq_no = parseInt($('#total_chq').val()) + 1;
      if (i <= 3) {
          var new_input = " <div class='form-group col-md-4'><input type='text' placeholder='Identity' class='form-control'id='new_" + new_chq_no + "'><button type='button' class='addidentity'>add</button></div>";
         i++;
       }

      $('#new_chq').append(new_input);
      $('#total_chq').val(new_chq_no);
    }
  });

</script>


  


@endsection