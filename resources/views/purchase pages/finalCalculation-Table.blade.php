@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">

<div class="container">
                <div class="container">

                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Table</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Final Calculation</a></li>
                            </ol>
                        </nav>
                    </div>
                     
                    <div class="row">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Filter Data</h4>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <form method="post" id="">
                                 @csrf
                                <div class="widget-content widget-content-area">

                                <div class="form-row mb-4">   
                                <div class="form-group col-md-4">
                                        <label for="inputState">Identity</label>
                                        <select id="identity" name="identity" class="form-control">     
                                        @foreach($identitys as $idty)
                                            <option value="{{$idty->identity}}">{{$idty->identity}}</option>
                                        @endforeach
                                          </select>
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="inputState">Client</label>
                                        <select id="client" name="client" class="form-control">
                                        @foreach($clients as $cl)
                                                <option value="{{$cl->client}}">{{$cl->client}}</option>
                                                @endforeach
                                          </select>           
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="inputState">Site</label>
                                        <select id="sites" name="sites" class="form-control">
                                           @foreach($sites as $s)
                                                <option value="{{$s->sites}}">{{$s->sites}}</option>
                                           @endforeach       
                                          </select>      
                                      </div>
                                    </div>
                                        
                                        <div class="form-row mb-4">
                               
                                      <div class="form-group col-md-6">
                                          <label for="inputState">Group</label>
                                          <select id="group" name="group" class="form-control">
                                          @foreach($list as $l)
                                            <option value="{{$l->group}}">{{$l->group}}</option>
                                          @endforeach
                                             
                                          </select>
                                      </div>
                                           <div class="form-group col-md-6">
                                                <label for="inputEmail4">Date</label>
                                                 <input type="date" class="form-control" id="date_calender"  name="date_calender" placeholder="" autocomplete="off" Required>
                                              </div>
                                  </div>
                                     <button type="submit" class="btn btn-primary" id="final-calcualation">Get Data</button> 

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                <div class="layout-px-spacing">
                <div class="page-header">       
                </div>
                <div class="row layout-top-spacing" id="cancel-row">
                
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                   
                        <div class="widget-content widget-content-area br-6">
                            <table id="final_view" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Product Group</th>
							         	<th>Item Code</th>
								        <th>Item Name</th>
                                        <th>DF</th>
                                        <th>Add ADF</th>
							         	<th>Stock In Hand</th>
								        <th>Stock In Transit</th>
                                        <th>MTD Sales</th>
                                        <th>Stock Cover</th>
                                        <th>Stock Cover % of Demand Forecast</th>
                                        <th>Balance DF</th>
                                        <th>Pending Customer Orders</th>
                                        <th>Inventory Covering @30% of balance DF</th>
                                        <th>Flag</th>
                                        <th>Material to be ordered (30%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                  //echo'<pre>'; print_r($list); die;
                                   ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                </div>


@endsection