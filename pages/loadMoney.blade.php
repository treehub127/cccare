@extends('template/layouts/master')

@section('title')
    Load Money
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

                @include('template/partials/dashboard-breadcrumbs',['message' => 'Load Card'])

                        <!--Page content-->
                <!--===================================================-->
                <div id="page-content">

                    <div class="panel">
                        <div class="panel-heading" style="background-color: rgba(0,0,0,0.02);height: 55px;">
                            <h3 class="panel-title text-center" style="font-size: x-large;line-height: 55px;">Load Card</h3>
                        </div>

                        <!--Block Styled Form -->
                        <!--===================================================-->
                        <form method="post" action="{{ URL('/dashboard/loadMoney') }}">
                            {{ csrf_field() }}
                            <div class="panel-body">
                                <div class="row">
                                    @if(session()->has('success'))
                                        @if(session()->get('success') == 1)
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="alert alert-success">
                                                        <strong>Success!</strong> {{ session()->get('message') }}
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif(session()->get('success') == 0)
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="alert alert-warning">
                                                        <strong>Alert!</strong> {{ session()->get('message') }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="amount">Amount</label>
                                            <input type="text" id="amount" name="amount" class="form-control">
                                        </div>
                                    </div>                                    
<!--                                    <div id="tokenDiv">
                                    </div>-->
                                    <div class="col-sm-12 estimate_amount hide text-center">
                                        <h3 style="margin-bottom: 0;">Amount To Pay in GHS: <span id="estimate_amount" style="color: #92c755;"></span></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer text-center">
                                <button class="btn btn-success" type="submit">Load Money Now</button>
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