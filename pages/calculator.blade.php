@extends('template/layouts/master')

@section('title')
    Insurance Calculator
@endsection

@section('content')
    <div id="container" class="effect aside-float aside-bright mainnav-lg">

        <!--NAVBAR-->
        <!--===================================================-->
        @include('template/includes/nav-bar')
                <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">

                @include('template/partials/dashboard-breadcrumbs',['message' => 'Insurance Calculator'])

                        <!--Page content-->
                <!--===================================================-->
                <div id="page-content">

                    <div class="panel">
                        <div class="panel-heading" style="background-color: rgba(0,0,0,0.02);height: 55px;">
                            <h3 class="panel-title text-center" style="font-size: x-large;line-height: 55px;">Insurance Calculator</h3>
                        </div>

                        <!--Block Styled Form -->
                        <!--===================================================-->
                        <form>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="user_select">Please Select Following Option</label>
                                            <select id="user_select" name="user_select" class="demo_select2 form-control">
                                                <option value="comprehensive">Comprehensive</option>
                                                <option value="thirdParty">3rd Party</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="control-label" for="user_select2">Please Select Following Option</label>
                                        <select id="user_select2" name="user_select2" class="demo_select2 form-control">
                                            <option value="private">Private / Individual</option>
                                            <option value="commercial">Commercial - uber, Commerical - Taxi, Commerical - Trotro</option>
                                            <option value="company">Company Car</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 user_amount" style="margin-top: 15px;">
                                        <div class="form-group">
                                            <label class="control-label" for="user_amount">Value of Car</label>
                                            <input type="text" id="user_amount" name="user_amount" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 required_amount hide text-center">
                                        <h3 style="margin-bottom: 0;">Amount in GHS: <span id="required_amount" style="color: #92c755;"></span></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer text-center">
                                <button class="btn btn-success" type="button" id="calculate_insurance">Calculate</button>
                            </div>
                        </form>
                        <!--===================================================-->
                        <!--End Block Styled Form -->

                    </div>



                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->


            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            @include('template/includes/side-bar')
                    <!--===================================================-->
            <!--END MAIN NAVIGATION-->

        </div>



        <!-- FOOTER -->
        <!--===================================================-->
        @include('template/partials/footer')
                <!--===================================================-->
        <!-- END FOOTER -->


        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->



    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->
@endsection