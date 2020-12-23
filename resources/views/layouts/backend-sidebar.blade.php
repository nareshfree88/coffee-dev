<!-- Page Sidebar -->
<div class="page-sidebar">
    <a class="logo-box" href="#">
        <span>coffee</span>
        <i class="icon-radio_button_unchecked" id="fixed-sidebar-toggle-button"></i>
        <i class="icon-close" id="sidebar-toggle-button-close"></i>
    </a>
    <div class="page-sidebar-inner">
        <div class="page-sidebar-menu">
            <ul class="accordion-menu">
                <li class="active-page">
                    <a href="{{url('admin')}}">
                        <i class="menu-icon icon-home4"></i><span>Dashboard</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{url('admin/users')}}">
                        <i class="menu-icon icon-user"></i><span>Customers</span>
                    </a>
                </li>
                
                
                 <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon icon-cart"></i><span>Sales</span><i class="accordion-icon fa fa-angle-left"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('admin/orders')}}">Orders List</a></li>
                        <!--<li><a href="{{url('admin/recurring')}}">Subscription</a></li>-->
                        <li><a href="{{url('admin/trysubscriptions')}}"> Try-Subscription</a></li>
                        <li><a href="{{url('admin/subscriptions')}}">Gift Subscription</a></li>
                        <!--<li><a href="{{url('admin/subscription_plans')}}">Subscription Plans</a></li>-->


                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon icon-shop"></i><span>Products</span><i class="accordion-icon fa fa-angle-left"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('admin/products')}}">Product List</a></li>
                        <!--<li><a href="{{url('admin/equipments')}}">Equipments</a></li>-->
                        <li><a href="{{url('admin/discounts')}}">Discounts</a></li>
                        <li><a href="{{url('admin/categories')}}">Categories</a></li>
                        <!--                                    <li><a href="{{url('admin/attributes')}}">Attributes</a></li>
                                                            <li><a href="javascript:void(0)">Attributes Families</a></li>-->

                    </ul>
                </li>


                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon icon-payment"></i><span>Payments</span><i class="accordion-icon fa fa-angle-left"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('admin/payments')}}">Payments</a></li>



                    </ul>
                </li>
                
                
                
                
                
                
                
                
                <li>
                    <a href="{{url('admin/invites')}}">
                        <i class="menu-icon icon-send"></i><span>Send Invitation</span>
                    </a>
                </li>
                 <li>
                    <a href="{{url('admin/email-content')}}">
                        <i class="menu-icon icon-inbox"></i><span>Email Content</span>
                    </a>
                </li>
                 <li>
                    <a href="{{url('admin/videos')}}">
                        <i class="menu-icon fa fa-youtube-play"></i><span>Upload Video</span>
                    </a>
                </li>
                <!--                            <li>
                                                <a href="javascript:void(0)">
                                                    <i class="menu-icon icon-flash_on"></i><span>Customers</span><i class="accordion-icon fa fa-angle-left"></i>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li><a href="{{url('admin/users')}}">List</a></li>
                                                    
                                                </ul>
                                            </li>-->

               

<!--                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon icon-cart"></i><span>Plans</span><i class="accordion-icon fa fa-angle-left"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('admin/subscription_plans')}}">Subscription Plans</a></li>
                    </ul>
                </li>-->

                <!--                            <li>
                                                <a href="javascript:void(0)">
                                                    <i class="menu-icon icon-layers"></i><span>Attributes</span><i class="accordion-icon fa fa-angle-left"></i>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li><a href="{{url('')}}">Categories</a></li>
                                                    <li><a href="{{url('')}}">Attributes Families</a></li>
                                                    
                                                </ul>
                                            </li>-->






                <li class="menu-divider"></li>


            </ul>
        </div>
    </div>
</div><!-- /Page Sidebar -->