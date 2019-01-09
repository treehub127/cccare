@extends('template/layouts/master')

@section('title')
    Book Car Pickup
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

                @include('template/partials/dashboard-breadcrumbs',['message' => 'Book Car Pickup'])

                        <!--Page content-->
                <!--===================================================-->
                <div id="page-content">

                    <div class="panel">
                        <div class="panel-heading" style="background-color: rgba(0,0,0,0.02);height: 55px;">
                            <h3 class="panel-title text-center" style="font-size: x-large;line-height: 55px;">Book Car Pickup</h3>
                        </div>

                        <!--Block Styled Form -->
                        <!--===================================================-->
                        <form>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group" style="height: 350px">
                                            <label class="control-label" for="carModel">Your Location (Note: You can update your current location)</label>
                                            <div id="map"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 20px;">
                                        <div class="form-group">
                                            <label class="control-label" for="carModel">Car Model</label>
                                            <input type="text" id="carModel" name="carModel" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="carNumbers">Car Number</label>
                                            <input type="text" id="carNumbers" name="carNumbers" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="latitude" class="latitude" value="-25.363" />
                            <input type="hidden" name="longitude" class="longitude" value="131.044" />
                            <div class="panel-footer text-center">
                                <button class="btn btn-success" type="button" id="calculate_insurance">Book Car Pickup</button>
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