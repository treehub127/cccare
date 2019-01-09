<nav id="mainnav-container">
    <div id="mainnav">


        <!--OPTIONAL : ADD YOUR LOGO TO THE NAVIGATION-->
        <!--It will only appear on small screen devices.-->
        <!--================================
        <div class="mainnav-brand">
            <a href="index.html" class="brand">
                <img src="img/logo.png" alt="Nifty Logo" class="brand-icon">
                <span class="brand-text">Nifty</span>
            </a>
            <a href="#" class="mainnav-toggle"><i class="pci-cross pci-circle icon-lg"></i></a>
        </div>
        -->



        <!--Menu-->
        <!--================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">

                    <!--Profile Widget-->
                    <!--================================-->
                    <div id="mainnav-profile" class="mainnav-profile">
                        <div class="profile-wrap text-center">
                            <div class="pad-btm">
                            
                                          <?php
                                            if(!empty(Auth::user()->profile_image))
                                            { ?>
                                            <img src="{{ asset('public/profile/') }}/{{Auth::user()->profile_image}}" class="img-circle img-md" alt="Profile Picture">
                                          <?php  }
                                            else
                                            { ?>
                                                <img class="img-circle img-md" src="{{ asset('public/assets/') }}/img/profile-photos/1.png" alt="Profile Picture">
                                           <?php }
                                            ?>
                                            

                                
                    


                            </div>
                            <a  href="{{ url('/dashboard/profile') }}" class="box-block" >
                                            
                                <p class="mnp-name">{{ Auth::user()->name }}</p>
                                <span class="mnp-desc">{{ Auth::user()->email }}</span>
                            </a>
                        </div>
                        <div id="profile-nav" class="collapse list-group bg-trans">
                            <!-- <a href="{{ url('/dashboard/profile') }}" class="list-group-item">
                                <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
                            </a> -->
                            <!-- <a href="#" class="list-group-item">
                                <i class="demo-pli-gear icon-lg icon-fw"></i> Settings
                            </a> -->
                            <!-- <a href="#" class="list-group-item">
                                <i class="demo-pli-information icon-lg icon-fw"></i> Help
                            </a> -->
                         <!--    <a href="{{ url('/logout') }}" class="list-group-item">
                                <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
                            </a> -->
                        </div>
                    </div>


                    <!--Shortcut buttons-->
                    <!--================================-->
                    <div id="mainnav-shortcut" class="hidden">
                        <ul class="list-unstyled shortcut-wrap">
                            <li class="col-xs-3" data-content="My Profile">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                        <i class="demo-pli-male"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Messages">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                        <i class="demo-pli-speech-bubble-3"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Activity">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                        <i class="demo-pli-thunder"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Lock Screen">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                        <i class="demo-pli-lock-2"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--================================-->
                    <!--End shortcut buttons-->


                    <ul id="mainnav-menu" class="list-group">

                        <!--Category name-->
                        <li class="list-header">Navigation</li>

                        <!--Menu list item-->
                        <li class="{{ Request::path() == 'dashboard' ? 'active-sub' : '' }} {{ substr(Request::path(), 0, -3) == 'dashboard/registeredcar' ? 'active-sub' : '' }}" >
                            <a href="{{ url('/dashboard') }}">
                                <i class="pli-home"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>

                        <li class="{{ Request::path() == 'dashboard/subscribe' ? 'active-sub' : '' }}">
                            <a href="{{ url('/dashboard/subscribe') }}">
                                <i class="pli-token"></i>
                                <span class="menu-title">Subscribe</span>
                            </a>
                        </li>

                        <li class="{{ Request::path() == 'dashboard/calculator' ? 'active-sub' : '' }}">
                            <a href="{{ url('/dashboard/calculator') }}">
                                <i class="pli-calculator-2"></i>
                                <span class="menu-title">Insurance Calculator</span>
                            </a>
                        </li>

                        <li class="{{ Request::path() == 'dashboard/bookCarPickup' ? 'active-sub' : '' }}">
                            <a href="{{ url('/dashboard/bookCarPickup') }}">
                                <i class="pli-car-3"></i>
                                <span class="menu-title">Book Car Pickup</span>
                            </a>
                        </li>
                        <li class="{{ Request::path() == 'dashboard/loadMoney' ? 'active-sub' : '' }}">
                            <a href="{{ url('/dashboard/loadMoney') }}">
                                <i class="pli-token"></i>
                                <span class="menu-title">Load Card</span>
                            </a>
                        </li>

                        <li class="{{ Request::path() == 'dashboard/profile' ? 'active-sub' : '' }}">
                            <a href="{{ url('/dashboard/profile') }}">
                                <i class="pli-profile"></i>
                                <span class="menu-title">View Profile</span>
                            </a>
                        </li>

                        <li class="{{ Request::path() == 'logout' ? 'active-sub' : '' }}">
                            <a href="{{ url('/logout') }}">
                                <i class="pli-arrow-back-2"></i>
                                <span class="menu-title">Logout</span>
                            </a>
                        </li>

                        

                    </ul>
                </div>
            </div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>