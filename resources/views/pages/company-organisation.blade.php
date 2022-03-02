@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<div class="container">
  <div class="container">

    <div class="row">
      <div id="flFormsGrid" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="insertRowAfter">
              <div class="form-row-md-12 mb-0" style="text-align: center;">
                <div class="form-group col-md-4">

                </div>
                <div class="form-group col-md-4">
                  <input type="text" class="form-control" id="" name="" placeholder="Super Admin"
                    style="margin-left: 333px;" autocomplete="off">

                </div>
              </div>

              <div class="form-row-md-12 mb-0" style="text-align: center;">
                <div class="form-group col-md-4">

                </div>
                <div class="form-group col-md-4">

                </div>
                <div class="form-group col-md-4">
                  <svg xmlns="http://www.w3.org/2000/svg" style="width: 11%; height:0%;margin-left: 450px;"
                    fill="currentColor" class="bi bi-plus addrow" viewBox="0 0 16 16">
                    <path
                      d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                  </svg>

                </div>
              </div>

              <div class="form-row mb-4">
                                            <div class="form-group col-md-3">
                                            
                                                <input type="text" class="form-control" id="fromDate" name="fromDate" placeholder="Identity" autocomplete="off" Required>
                                            </div>

                                            <div class="form-group col-md-3">
                                            
                                                
                                                <input type="text" class="form-control" id="toDate" name="toDate" placeholder="Identity" autocomplete="off" Required>
                                            </div>   
                                            <div class="form-group col-md-3">
                                               
                                                <input type="text" class="form-control" id="fromDate" name="fromDate" placeholder="Identity" autocomplete="off" Required>
                                            </div>

                                            <div class="form-group col-md-3">
                                            
                                          
                                                <input type="text" class="form-control" id="toDate" name="toDate" placeholder="Identity" autocomplete="off" Required>
                                            </div>     
                                        </div>
            </div>
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
    $('.addrow').on('click', function () {
      if (i <= 3) {
      var appendData = '<div class="form-row-md-6 mb-0"><div class="form-group col-md-4"><input type="text" class="form-control" id="" name="" placeholder="Super Admin"  autocomplete="off"></div><div class="form-group col-md-4"><input type="text" class="form-control" id="" name="" placeholder="Super Admin"autocomplete="off"></div></div>';
      i++;
    }
      $(appendData).insertAfter('.insertRowAfter');
    });
  });

  $(document).on('click', '#remove', function () {
    $(this).closest('.insertRowAfter1').remove();
  });
</script>


@endsection