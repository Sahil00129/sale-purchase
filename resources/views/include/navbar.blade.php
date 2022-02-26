<a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

<div class="nav-logo align-self-center">
    <a class="navbar-brand" href="{{url('home')}}"><img alt="logo" src="{{asset('assets/img/f15.png')}}" style="margin-bottom:20px;"> </a>
</div>

<ul class="navbar-item topbar-navigation">
    
    <!--  BEGIN TOPBAR  -->
    <div class="topbar-nav header navbar" role="banner">
        <nav id="topbar">
            <ul class="navbar-nav theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="{{url('home')}}">
                        <img src="{{asset('assets/img/Flogo.png')}}" class="navbar-logo" alt="logo">
                    </a>
                </li>
                <li class="nav-item theme-text">
                   
                </li>
            </ul>

            <ul class="list-unstyled menu-categories" id="topAccordion">

                <li class="menu single-menu">
                    <a href="{{url('home')}}" >
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            
                            <span>Dashboard</span>
                        </div>
                        
                    </a>
                    
                </li>

                <li class="menu single-menu">
                    <a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                            
                            <span>Import Masters</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled animated fadeInUp" id="app" data-parent="#topAccordion">
                         <li>
                            <a href="{{url('import-data')}}">Sales Import</a>
                        </li>  
                        <li>
                            <a href="{{url('purchase-Import')}}">Purchase Import</a>
                        </li>
                        <!--      <li class="sub-sub-submenu-list">
                                        <a href="#appInvoice" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Purchase Import <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                        <ul class="collapse list-unstyled sub-submenu animated fadeInUp" id="appInvoice" data-parent="#appInvoice">
                                            <li>
                                                <a href="{{url('purchase-Import')}}"> One Time Import </a>
                                            </li>
                                            <li>
                                                <a href="apps_invoice-preview.html"> Monthly/Daily Import</a>
                                            </li>     
                                        </ul>
                                    </li>   -->
                    </ul>
                </li>
                
                <li class="menu single-menu">
                                <a href="#components" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                        
                                        <span>ESR</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                </a>
                                <ul class="collapse submenu list-unstyled animated fadeInUp" id="components" data-parent="#topAccordion">
                                    <li class="sub-sub-submenu-list">
                                        <a href="#uiKit" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Get PDF<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                        <ul class="collapse list-unstyled sub-submenu animated fadeInUp" id="uiKit" data-parent="#components">
                                            <li>
                                                <a href="{{url('get-pdf')}}"> Single PDF </a>
                                            </li>
                                            <li>
                                                <a href="{{url('bulkpdf')}}"> Grouped PDF </a>
                                            </li>
                                           
                                        </ul>
                                    </li>       
                                    <li class="sub-sub-submenu-list">
                                        <a href="#uiKit" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Tables <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                        <ul class="collapse list-unstyled sub-submenu animated fadeInUp" id="uiKit" data-parent="#components">
                                            <li>
                                                <a href="{{url('itemMaster-table')}}"> Item Master </a>
                                            </li>
                                            
                                            <li>
                                            <li class="sub-sub-submenu-list">
                                        <a href="#uiKit" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Sales Table <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                        <ul class="collapse list-unstyled sub-submenu animated fadeInUp" id="uiKit" data-parent="#components">
                                            <li>
                                                <a href="{{url('openingData-table')}}"> Opening Data </a>
                                            </li>
                                            <li>
                                                <a href="{{url('saleData-table')}}"> Sales Data </a>
                                            </li>
                                            <li>
                                                <a href="{{url('purchaseData-table')}}"> Purchase Data </a>
                                            </li>
                                            <li>
                                                <a href="{{url('stockTransfer-table')}}"> Stock Transfer </a>
                                            </li>
                                        </ul>
                                      </li>  
                                            </li>
                                            <li>
                                     <li class="sub-sub-submenu-list">
                                        <a href="#uiKit" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Purchase Tables <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                        <ul class="collapse list-unstyled sub-submenu animated fadeInUp" id="uiKit" data-parent="#components">
                                            <li>
                                                <a href="#">Monthly Purchase </a>
                                            </li>
                                            <li>
                                                <a href="#">Daily Bases </a>
                                            </li>
                                        </ul>
                                      </li>  
                                            </li>
                                        </ul>
                                    </li>  
                                </ul>   
                            </li>


                <?php 
                $role = Auth::user()->role; 
                         if($role == 'super admin'){?> 

                  <li class="menu single-menu">
                    <a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                            
                            <span>Company Setup</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                       </a>
                        <ul class="collapse submenu list-unstyled animated fadeInUp" id="forms"      data-parent="#topAccordion">
                        <li>
                            <a href="{{url('group/identity/client/sites')}}">Group</a>
                        </li>
                        <li>
                            <a href="{{url('comapny-group')}}">Group Table</a>
                        </li>  
                    </ul>
                    </li>
                         <?php }else{ ?>
                        <?php } ?>
              @can('user-list')
                <li class="menu single-menu menu-extras">
                    <a href="#more" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                     </a>
                       <ul class="collapse submenu list-unstyled animated fadeInUp" id="more"  data-parent="#topAccordion">         
                        <li>
                            <a href="{{url('users')}}">Users List</a>
                        </li>                  
                        @can('role-list')
                        <li>
                            <a href="{{url('roles')}}"> Roles</a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
            </ul>
        </nav>
    </div>
    <!--  END TOPBAR  -->

</ul>

<ul class="navbar-item flex-row ml-auto">
    
</ul>

<ul class="navbar-item flex-row nav-dropdowns">
   

    <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="user-profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media">
                <img src="{{asset('assets/img/90x90.jpg')}}" class="img-fluid" alt="admin-profile">
            </div>
        </a>
        <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
            <div class="user-profile-section">
                <div class="media mx-auto">
                    <div class="media-body">
                        <h5>{{ Auth::user()->role }}</h5>
                    </div>
                </div>
            </div>
            
            <div class="dropdown-item">
                <a href="{{url('logout')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Log Out</span>
                </a>
            </div>
        </div>
    </li>
</ul>