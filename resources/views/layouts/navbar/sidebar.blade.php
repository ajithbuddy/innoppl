
<?php $user = auth()->user();

?>

 <div class="deznav">
            <div class="deznav-scroll">
             
                <ul class="metismenu" id="menu">
                    <li><a class="" href="{{route('dashboard')}}" aria-expanded="false">
                            <i class="flaticon-layout">
                                
                            </i>
                            <span class="nav-text">Dashboard</span>
                        </a>
              
        
                    </li>
                    <li><a class="" href="{{route('resort.index')}}" aria-expanded="false">
                            <i class="flaticon-layout">
                            </i>
                            <span class="nav-text">Resorts</span>
                        </a>
                    </li>
                    
             <?php if($user->role == 1){?>
             <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-plugin"></i>
                    <span class="nav-text">Masters</span>
                </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('categories.index')}}">Categories</a></li>
                            <li><a href="{{route('amenities.index')}}">Amenities</a></li>
                            <li><a href="{{route('home.banner')}}">Banners</a></li>
                        </ul>
            </li>
            <?php } ?>
                <?php 
                //if( app('App\helper\CustomHelper')->checkPermission('payment-index') ){?>
                <!-- <li><a class="" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-newsletter"></i>
                    <span class="nav-text">Payments</span>
                </a>
                </li -->
              <?php //} ?>
                <?php //if(  app('App\helper\CustomHelper')->checkPermission('employee-report') || app('App\helper\CustomHelper')->checkPermission('customer-report') || app('App\helper\CustomHelper')->checkPermission('joborder-report') || app('App\helper\CustomHelper')->checkPermission('function-report') || app('App\helper\CustomHelper')->checkPermission('payment-report')){?>
                    <!-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-table"></i>
                            <span class="nav-text">Reports</span>
                        </a>
                        <ul aria-expanded="false">
                            <?php //if( app('App\helper\CustomHelper')->checkPermission('employee-report') ){?>
                            <li><a href="#">Employee Reports</a></li>
                            <?php //} ?>
                            <?php //if( app('App\helper\CustomHelper')->checkPermission('customer-report') ){?>
                            <li><a href="#">Customer reports</a></li>
                            <?php //} ?>
                            <?php //if( app('App\helper\CustomHelper')->checkPermission('joborder-report') ){?>
                            <li><a href="#">Joborder reports</a></li>
                            <?php //} ?>
                           <?php //if( app('App\helper\CustomHelper')->checkPermission('function-report') ){?>
                            <li><a href="#">Function Report</a></li>
                            <?php //} ?>
                             <?php //if( app('App\helper\CustomHelper')->checkPermission('payment-report') ){?>
                            <li><a href="#">payment Report</a></li>
                            <?php //} ?>
                          
                        </ul>
                    </li> -->
                    <?php //} ?>

                   
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-admin"></i>
                        <span class="nav-text">Settings</span>
                    </a>
                    <ul aria-expanded="false">
                        <?php //if( app('App\helper\CustomHelper')->checkPermission('terms-index')){?>
                        <li><a href="{{route('profile.index')}}">Profile</a></li>
                        <?php //} ?>
                       
                      
                    </ul>
                </li>
                <li>
                    <a class="" href="{{route('logout')}}" aria-expanded="false">
                        <i class="flaticon-newsletter">    
                        </i>
                        <span class="nav-text">Logout</span>
                    </a>
                </li>
                 
                </ul>
                <div class="copyright">
                    <p><strong>Aicodingbees</strong> © 2023 All Rights Reserved</p>
                </div>
            </div>
        </div>