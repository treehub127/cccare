@extends('template/layouts/master')

@section('title')
    Dashboard
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

                @include('template/partials/dashboard-welcome-message')

                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    <div class="panel">
                           @if(!empty(session('message')))
                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button class="close" aria-label="Close" data-dismiss="alert" type="button">
                                    <span aria-hidden="true">×</span>
                                </button>
                                 {{ session('message') }}
                            </div>
                        @endif


                        <div class="panel-heading" style="background-color: rgba(0,0,0,0.02);height: 55px;">
                            <p class="panel-title text-center" style="line-height: 55px;text-align: left;color: #0391d1;font-weight: 900;">Registered Cars:
                            @foreach($vehicledetail as $value)
                                <span style="padding-left: 3%;"><a href="{{ url('/dashboard/registeredcar/'.$value->id)  }}" style="text-decoration: none;cursor:pointer;color: white;background-color: #0391d1;border-color: transparent;padding: 5px; {{ $value->id == $id ? 'border: 3px solid #25476a;font-size: 16px;' : '' }}" class="btn-link">{{$value->vehicle_model}}</a></span>
                            @endforeach
                                
                            </p>
                        </div>
                        <div class="panel-body">
                            @if(isset($singlevehicledetail))
                                <table id="demo-foo-filtering"  class="table table-striped table-vcenter">
                                    <thead>
                                    <tr>
                                        <th style="visibility: hidden;"></th>
                                        <th>Renewal Item</th>
                                        <th>Expiry Date</th>
                                        <th>Cost</th>
                                        <th>Details</th>
                                        <th>Order Payment</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td><img class="img-responsive img-sm" src="{{ asset('public/assets/') }}/img/thumbs/INSURANCE.jpeg" alt="thumbs"></td>
                                        <td><a style="text-decoration: none;cursor:pointer" class="">Insurance</a></td>
                                        <td><span class="text-muted">{{$singlevehicledetail->insurance_expire_date}}</span></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="label label-table label-success">Pay</div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><img class="img-responsive img-sm" src="{{ asset('public/assets/') }}/img/thumbs/SERVICING.jpeg" alt="thumbs"></td>

                                        <td><a style="text-decoration: none;cursor:pointer" class="btn-link" data-toggle="modal" data-target="#NextServicing">Next servicing</a></td>
                                        <td><span class="text-muted">Oct 22, 2014</span></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="label label-table label-success">Pay</div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><img class="img-responsive img-sm" src="{{ asset('public/assets/') }}/img/thumbs/NEXT_DVLA_VISIT.jpeg" alt="thumbs"></td>

                                        <td><a style="text-decoration: none;cursor:pointer" class="btn-link" data-toggle="modal" data-target="#NextDVLAVisit">Next DVLA Visit</a></td>

                                        <td><span class="text-muted">{{$singlevehicledetail->roadworthy_expire_date}}</span></td>
                                        <td>
                                        @if($singlevehicledetail->engine_cubic_capacity > 2)
                                        	GHS 102
                                        @else
                                        	GHS 78
                                       	@endif
                                        </td>
                                        <td></td>
                                        <td>
                                            <div class="label label-table label-success">Pay</div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><img class="img-responsive img-sm" src="{{ asset('public/assets/') }}/img/thumbs/TRACKING.jpeg" alt="thumbs"></td>
                                        <td><a style="text-decoration: none;cursor:pointer" class="btn-link" data-toggle="modal" data-target="#Tracking">Tracking</a></td>
                                        <td><span class="text-muted">Oct 22, 2014</span></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="label label-table label-success">Pay</div>
                                        </td>
                                    </tr>
                                    </tbody>

                                </table>
                            @else
                                @if(count($vehicledetail)> 0)
                                <h2 class="text-center">Please Select any registered Car</h2>
                                @else
                                    <h2 class="text-center">You have not registered any car yet, please first register.</h2>
                                @endif
                            @endif










                        <!--     <h4>My Profile</h4>
                            <table id=""  class="table table-striped table-vcenter">
                                <tr>
                                   <th width="20%">Name :</th>
                                   <td>{{$getdetail->name}}</td>
                                </tr>
                                <tr>
                                   <th>Email :</th>
                                   <td>{{$getdetail->email}}</td>
                                </tr>
                                
                                <tr>
                                   <th>Phone :</th>
                                   <td>{{$getdetail->phone}}</td>
                                </tr>

                               <tr>
                                   <th>Car Type :</th>
                                   <td>{{$getdetail->carType}}</td>
                               </tr>
                               <tr>
                                   <th>Model :</th>
                                   <td>{{$getdetail->carModel}}</td>
                               </tr>
                                   <tr>
                                   <th>Manufacture Year :</th>
                                   <td>{{$getdetail->manufactureYear}}</td>
                               </tr>
                                <tr>
                                   <th>Company Name :</th>
                                   <td>{{$getdetail->companyName}}</td>
                                </tr>

                               <tr>
                                   <th>Location :</th>
                                   <td>{{$getdetail->location}}</td>
                                </tr>

                            </table> -->











                        </div>
                        <!--===================================================-->
                        <!-- End Foo Table - Filtering -->

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










<!-- Start Login Modal -->
<div id="Insurance" class="modal fade" role="dialog">
 <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Insurance</h4>
        </div>
         <form action="" method="post" enctype="multipart/form-data"> 
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-body">
            

            <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                <label class="control-label" for="carType">Type of Cover</label>
                <div class="form-group">
                    <select class="form-control">
                        <option value="">Type of Cover</option>
                        <option value="Third Party">Third Party</option>
                        <option value="Comprehensive">Comprehensive</option>
                    </select>
                </div>
            </div>


            <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                <label class="control-label" for="carType">Company</label>
                <div class="form-group">
                    <select class="form-control">
                        <option value="">Select Company</option>
                        <option value="Sic">Sic</option>
                        <option value="Star">Star</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                <label class="control-label" for="">Last Premium Paid</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="last_premium_paid">
                </div>
            </div>


            <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                <label class="control-label" for="">Balance Due</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="balance_due">
                </div>
            </div>

            <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                <label class="control-label" for="">Renew Now</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="renew_now">
                </div>
            </div>


            <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                <label class="control-label" for="">Renewal Amount</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="renewal_amount">
                </div>
            </div>

            <div style="clear:both"></div>


        </div>
        <div class="modal-footer">
        <button  class="btn btn-primary" type="submit">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
</div><!-- End Login Modal -->


<!-- Start Login Modal -->
<div id="NextServicing" class="modal fade" role="dialog">
 <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Next Servicing</h4>
        </div>
         <form action="" method="post" enctype="multipart/form-data"> 
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-body">
            

            <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                <label class="control-label" for="carType">Instructions</label>
                <div class="form-group">
                    <select class="form-control">
                        <option value="">Type of Instructions</option>
                    </select>
                </div>
            </div>

           <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                <label class="control-label" for="">Last Servicing Date</label>
                <div class="form-group">
                    <input type="text" class="form-control datepicker" name="last_servicing_date">
                </div>
            </div>


            <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                <label class="control-label" for="">Last Service Details</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="last_service_details">
                </div>
            </div>

            <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                <label class="control-label" for="">Last Service</label>
                <div class="form-group">
                   <select class="form-control">
                        <option value="">Type of Last Service</option>
                        <option value="Items">items</option>
                        <option value="Activities">Activities</option>
                        <option value="Cost">Cost</option>
                    </select>
                </div>
            </div>



            <div style="clear:both"></div>


        </div>
        <div class="modal-footer">
        <button  class="btn btn-primary" type="submit">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
</div><!-- End Login Modal -->



<!-- Start Login Modal -->
<div id="NextDVLAVisit" class="modal fade" role="dialog">
 <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Next DVLA Visit</h4>
        </div>
         <form action="" method="post" enctype="multipart/form-data"> 
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-body">
            

            <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                <label class="control-label" for="carType">Instructions</label>
                <div class="form-group">
                    <select class="form-control">
                        <option value="">Type of Instructions</option>
                    </select>
                </div>
            </div>

           <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                <label class="control-label" for="">Road Worthy Renewal Date</label>
                <div class="form-group">
                    <input type="text" class="form-control datepicker" name="last_servicing_date">
                </div>
            </div>

         

            <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                <label class="control-label" for="">Road Worthy Renewal Cost</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="last_service_details">
                </div>
            </div>



           <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                <label class="control-label" for="">Drivers Lincense Renewal Date</label>
                <div class="form-group">
                    <input type="text" class="form-control datepicker" name="last_servicing_date">
                </div>
            </div>




            <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                <label class="control-label" for="">Drivers Lincense Renewal Cost</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="last_service_details">
                </div>
            </div>


            <div style="clear:both"></div>


        </div>
        <div class="modal-footer">
        <button  class="btn btn-primary" type="submit">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
</div><!-- End Login Modal -->

<!-- Start Login Modal -->
<div id="Tracking" class="modal fade" role="dialog">
 <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tracking</h4>
        </div>
         <form action="" method="post" enctype="multipart/form-data"> 
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-body">
            

            <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                <label class="control-label" for="carType">Instructions</label>
                <div class="form-group">
                    <select class="form-control">
                        <option value="">Type of Instructions</option>
                    </select>
                </div>
            </div>


            <div style="clear:both"></div>


        </div>
        <div class="modal-footer">
        <button  class="btn btn-primary" type="submit">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
</div><!-- End Login Modal -->









    <div id="AddaVehicle" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add a Vehicle</h4>
                </div>
                <form action="{{url('dashboard/add_vehicle')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body">





                        <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                            <label class="control-label" for="carType">Car Type</label>
                            <div class="form-group">
                                <select id="carType" required="" name="car_type" class="demo_select2 form-control">
                                    <option value="">Selct Car Type</option>
                                    <option  value="Private">Private</option>
                                    <option value="Corporate">Corporate</option>
                                    <option  value="Commercial (Uber, Taxi, Trotro, Other)">Commercial (Uber, Taxi, Trotro, Other)</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                            <label class="control-label" for="carType">Vehicle Brand</label>
                            <div class="form-group">
                                <input type="text"  name="vehicle_brand" required="" value="" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                            <label class="control-label" for="carType">Vehicle Model</label>
                            <div class="form-group">
                                <input type="text"  name="vehicle_model" required="" value="" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                            <label class="control-label" for="carType">Manufacture Year</label>
                            <div class="form-group">
                                <input type="text"  name="manufacture_year" required="" value="" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                            <label class="control-label" for="carType">Engine Cubic Capacity</label>
                            <div class="form-group">
                                <input type="text"  name="engine_cubic_capacity" required="" value="" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                            <label class="control-label" for="carType">chassis Number (Optional)</label>
                            <div class="form-group">
                                <input type="text"  name="chassic_number"  value="" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                            <label class="control-label" for="carType">Insurance Expiry Date</label>
                            <div class="form-group">
                                <input type="text"  name="insurance_expire_date" required value="" class="form-control datepicker">
                            </div>
                        </div>


                        <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                            <label class="control-label" for="carType">Roadworthy Expiry Date</label>
                            <div class="form-group">
                                <input type="text"  name="roadworthy_expire_date" required value="" class="form-control datepicker">
                            </div>
                        </div>
			<div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                            <label class="control-label" for="carType">Value of Car</label>
                            <div class="form-group">
                                <input type="text"  name="value_of_car" required value="" class="form-control">
                            </div>
                        </div>


                        <div style="clear:both"></div>


                    </div>
                    <div class="modal-footer">
                        <button  class="btn btn-primary" type="submit">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>



    </div>

    @if(isset($singlevehicledetail))
    <div id="DeleteaVehicle" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirm Vehicle Deletion</h4>
                </div>
                <form action="{{url('dashboard/delete_vehicle')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $singlevehicledetail->id }}">
                    <input type="hidden" name="dashboard" value="dashboard">
                    <div class="modal-body" style="border-top: 1px solid #e5e5e5;height: auto;min-height: 0;">
                        Are you sure you want to delete {{ $singlevehicledetail->vehicle_model }} car?
                    </div>
                    <div class="modal-footer">
                        <button  class="btn btn-danger" type="submit">Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                </form>
            </div>
        </div>



    </div><!-- End Login Modal -->
    @endif



    <!--===================================================-->
    <!-- END OF CONTAINER -->
@endsection