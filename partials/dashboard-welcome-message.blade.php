<div id="page-head">

    <div class="pad-all text-center">
        <h3>Status <?php if ($getdetail->cash_loaded >= 198) {echo '(Subscribed)';} else {echo '(Not subscribed)';} ?></h3>
        @if($getdetail->cash_loaded < 198)
        <p>Subscribe for your card and enjoy free diagnostics, cashback, discounted/exclusive services and free pickups for roadworthy renewal.</p>
        @endif
        <div data-toggle="modal" data-target="#AddaVehicle" class="label label-table label-success"><a href="#" style="color: white;padding: 5px;">Add Vehicle</a></div>
        @if(isset($singlevehicledetail))
        <div data-toggle="modal" data-target="#DeleteaVehicle" class="label label-table label-danger" style="max-width: 150px;"><a href="#" style="color: white;padding: 5px;">Delete this Vehicle</a></div>
        @endif
    </div>
</div>