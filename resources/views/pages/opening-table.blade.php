@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
<!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
<link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <!-- END PAGE LEVEL CUSTOM STYLES -->


<div class="layout-px-spacing">
                <div class="page-header">
                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Sales Data</a></li>
                            
                        </ol>
                    </nav>
                </div>
                
                <div class="row layout-top-spacing" id="cancel-row">
                
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                   
                        <div class="widget-content widget-content-area br-6">
                            <table id="opening" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Common Name</th>
							         	<th>SITE ID</th>
								        <th>Opening Balance</th>
                                        <th>FY</th>
                                        <th>Client</th>
                                        <th>Sites</th>
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