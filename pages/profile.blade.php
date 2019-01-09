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

                @include('template/partials/dashboard-breadcrumbs',['message' => 'Profile'])

                        <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    <div class="panel">
                        <div class="panel-body">
                         @if(!empty(session('message')))
                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button class="close" aria-label="Close" data-dismiss="alert" type="button">
                                  <span aria-hidden="true">×</span>
                                </button>
                                 {{ session('message') }}
                            </div>
                        @endif

                        <form action="{{url('dashboard/updateprofile')}}" method="post" enctype="multipart/form-data"> 
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="fixed-fluid">
                                <div class="fixed-md-200 pull-sm-left fixed-right-border" style="border-right: none;">

                                    <!-- Simple profile -->
                                    <div class="text-center">
                                        <div class="pad-ver">
                                            <?php
                                            if(!empty($getdetail->profile_image))
                                            { ?>
                                            <img src="{{ asset('public/profile/') }}/{{$getdetail->profile_image}}" class="img-lg img-circle" alt="Profile Picture">
                                          <?php  }
                                            else
                                            { ?>
                                                <img src="{{ asset('public/assets/') }}/img/profile-photos/1.png" class="img-lg img-circle" alt="Profile Picture">
                                           <?php }
                                            ?>
                                            
                                        </div>
                                        <h4 class="text-lg text-overflow mar-no">{{ Auth::user()->name }}</h4>

                                    </div>
                                    <span class="pull-left btn btn-primary btn-file" style="width: 100%;margin-top: 7px;">
					                        Update Picture <input name="file" type="file">
			                        </span>

                                    <hr style="margin-top: 55px;">

                                    <button data-toggle="modal" data-target="#AddaVehicle" class="btn btn-primary" type="button" style="width: 100%;">Add a Vehicle</button>


                                    <p class="pad-ver text-main text-sm text-uppercase text-bold">About Me</p>
                                    <!-- <p><i class="demo-pli-map-marker-2 icon-lg icon-fw"></i> {{$getdetail->location}}</p> -->
                                    <p><a href="#" class="btn-link"><i class="demo-pli-mail icon-lg icon-fw"></i> {{ Auth::user()->email }}</a></p>
                                    <p><i class="demo-pli-old-telephone icon-lg icon-fw"></i>{{ Auth::user()->phone }}</p>
                                    <p><i class="demo-pli-home icon-lg icon-fw"></i>{{ Auth::user()->residential_location }}</p>
                                    <p><i class="demo-pli-office icon-lg icon-fw"></i>{{ Auth::user()->office_location }}</p>

                                    <p class="pad-ver text-main text-sm text-uppercase text-bold">Registered Vehicles</p>
                                    <!-- <p><i class="demo-pli-map-marker-2 icon-lg icon-fw"></i> {{$getdetail->location}}</p> -->
                                    @foreach($vehicledetail as $value)
                                        <p><a data-toggle="modal" data-target="#AddaVehicle<?=$value->id?>" style="text-decoration: none;cursor:pointer" class="btn-link"><i class="pli-car icon-lg icon-fw"></i>{{$value->vehicle_model}}</a>
                                        <a data-toggle="modal" data-target="#DeleteaVehicle<?=$value->id?>" style="text-decoration: none;cursor:pointer;padding: 0 4px 0 4px;margin-left: 20px;" class="btn btn-primary"> Delete</a></p>
                                    @endforeach
                                </div>
                                <div class="fluid" style="border-left: 1px solid rgba(0,0,0,0.07);">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-lg btn-primary" style="width: 100%">Your Profile</button>
                                    </div>
                                    <br />
                                    

                                    <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                                        <label class="control-label" for="carType">Your Name</label>
                                        <div class="form-group">
                                            <input type="text" id="name" name="name" required="" value="{{$getdetail->name}}" class="form-control" placeholder="Your Name">

                                            <input type="hidden" id="name" name="id"  value="{{$getdetail->id}}" >

                                        </div>
                                    </div>

                                    <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                                        <label class="control-label" for="carType">Your Email</label>
                                        <div class="form-group">
                                            <input type="text" id="email" name="email"  value="{{$getdetail->email}}" readonly=""  class="form-control" placeholder="Your Email">
                                        </div>
                                    </div>

                                    <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                                        <label class="control-label" for="carType">Your Phone No</label>
                                        <div class="form-group">
                                            <input type="text" id="phone" name="phone" required="" value="{{$getdetail->phone}}" class="form-control" placeholder="Your Phone No">
                                        </div>
                                    </div>

                                    <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                                        <label class="control-label" for="carType">Residential Location</label>
                                        <div class="form-group">
                                            <input type="text" id="residential_location" name="residential_location" required="" value="{{$getdetail->residential_location}}" class="form-control" placeholder="Residential Location">
                                        </div>
                                    </div>

                                    <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                                        <label class="control-label" for="carType">Office Location</label>
                                        <div class="form-group">
                                            <input type="text" id="office_location" name="office_location" required="" value="{{$getdetail->office_location}}" class="form-control" placeholder="Office Location">
                                        </div>
                                    </div>

                                    <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                                        <label class="control-label" for="carType">Password [Optional]</label>
                                        <div class="form-group">
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Password [Optional]">
                                        </div>
                                    </div>



                                    <hr>

                                    <button class="btn btn-primary btn-block mar-ver" type="submit">Update</button>
                                </div>
                            </div>
                        </form>


                        </div>
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



            <div style="clear:both"></div>


        </div>
        <div class="modal-footer">
        <button  class="btn btn-primary" type="submit">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>



</div><!-- End Login Modal -->


    @foreach($vehicledetail as $value)



            <!-- Start Login Modal -->
    <div id="AddaVehicle{{$value->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Vehicle Detail</h4>
                </div>
                <form action="{{url('dashboard/update_vehicle')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body">

                        <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                            <label class="control-label" for="carType">Car Type</label>
                            <div class="form-group">
                                <select id="carType" required="" name="car_type" class="demo_select2 form-control">
                                    <option value="">Selct Car Type</option>
                                    <option <?php if($value->car_type == "Private" ) { echo "selected"; } ?>  value="Private">Private</option>
                                    <option <?php if($value->car_type == "Corporate" ) { echo "selected"; } ?> value="Corporate">Corporate</option>
                                    <option <?php if($value->car_type == "Commercial (Uber, Taxi, Trotro, Other)" ) { echo "selected"; } ?> value="Commercial (Uber, Taxi, Trotro, Other)">Commercial (Uber, Taxi, Trotro, Other)</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                            <label class="control-label" for="carType">Vehicle Brand</label>
                            <div class="form-group">
                                <input type="text" value="{{$value->vehicle_brand}}"  name="vehicle_brand" required=""  class="form-control">

                                <input type="hidden" value="{{$value->id}}"  name="id" >
                            </div>
                        </div>

                        <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                            <label class="control-label" for="carType">Vehicle Model</label>
                            <div class="form-group">
                                <input type="text"  name="vehicle_model" required="" value="{{$value->vehicle_model}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                            <label class="control-label" for="carType">Manufacture Year</label>
                            <div class="form-group">
                                <input type="text"  name="manufacture_year" required="" value="{{$value->manufacture_year}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                            <label class="control-label" for="carType">Engine Cubic Capacity</label>
                            <div class="form-group">
                                <input type="text"  name="engine_cubic_capacity" required="" value="{{$value->engine_cubic_capacity}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                            <label class="control-label" for="carType">chassis Number (Optional)</label>
                            <div class="form-group">
                                <input type="text"  name="chassic_number"  value="{{$value->chassic_number}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                            <label class="control-label" for="carType">Insurance Expiry Date</label>
                            <div class="form-group">
                                <input type="text"  name="insurance_expire_date" required value="{{$value->insurance_expire_date}}" class="form-control datepicker">
                            </div>
                        </div>


                        <div class="col-sm-12" style="padding-left:0;padding-right: 0;">
                            <label class="control-label" for="carType">Roadworthy Expiry Date</label>
                            <div class="form-group">
                                <input type="text"  name="roadworthy_expire_date" required value="{{$value->roadworthy_expire_date}}" class="form-control datepicker">
                            </div>
                        </div>



                        <div style="clear:both"></div>


                    </div>
                    <div class="modal-footer">
                        <button  class="btn btn-primary" type="submit">Update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>



    </div><!-- End Login Modal -->


    @endforeach


    @foreach($vehicledetail as $value)



            <!-- Start Login Modal -->
    <div id="DeleteaVehicle{{$value->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirm Vehicle Deletion</h4>
                </div>
                <form action="{{url('dashboard/delete_vehicle')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $value->id }}">
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


    @endforeach


    <!--===================================================-->
    <!-- END OF CONTAINER -->
@endsection