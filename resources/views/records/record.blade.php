@extends('layouts.master')
@section('addHead')
  <title>Records</title>
@endsection

@section('content')
<div class="wrapper">
@include('includes.header')
  @include('includes.mainNav')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Records
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ URL::Route('getUAL') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Records</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	 <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Fill </h3>
        </div>
        <form role="form">
          <div class="box-body">
          	<div class="row">
          		<div class="col-lg-5">
          			<div class="panel panel-default">
          				<div class="panel-heading">I. Location</div>
					  	<div class="panel-body">
						    <div class="input-group">
							  	<span class="input-group-addon" id="sizing-addon2">a.1. Region ( Rehiyon )</span>
							  	<input type="text" class="form-control" placeholder="Region(Rehiyon)" aria-describedby="sizing-addon2">
							</div>
							<div class="input-group">
							  	<span class="input-group-addon" id="sizing-addon2">a.2. Province ( Lalawigan )</span>
							  	<input type="text" class="form-control" placeholder="Province ( Lalawigan )" aria-describedby="sizing-addon2">
							</div>
							<div class="input-group">
							  	<span class="input-group-addon" id="sizing-addon2">b. City ( Bayan/Lungsod )</span>
							  	<input type="text" class="form-control" placeholder="City ( Bayan/Lungsod )" aria-describedby="sizing-addon2">
							</div>
							<div class="input-group">
							  	<span class="input-group-addon" id="sizing-addon2">c. Barangay</span>
							  	<input type="text" class="form-control" placeholder="Barangay" aria-describedby="sizing-addon2">
							</div>
					  	</div>
					</div>
				</div>
				<div class="col-lg-7">
          			<div class="panel panel-default">
					  	<div class="panel-body">
						    <div class="input-group">
							  	<span class="input-group-addon" id="sizing-addon2">II.  Household Identification Number ( Numero  )</span>
							  	<input type="text" class="form-control" placeholder="Household Identification Number ( Numero  )" aria-describedby="sizing-addon2">
							</div>
							<div class="input-group">
							  	<span class="input-group-addon" id="sizing-addon2">III. Name of respondent ( Pangelan ng nakapanayam )</span>
							  	<input type="text" class="form-control" placeholder="Name of respondent ( Pangelan ng nakapanayam )" aria-describedby="sizing-addon2">
							</div>
							<div class="input-group">
							  	<span class="input-group-addon" id="sizing-addon2">IV. Date ( Petsa ng panayam )</span>
							  	<input type="text" class="form-control" placeholder="Date ( Petsa ng panayam )" aria-describedby="sizing-addon2">
							</div>
							<div class="input-group date">
			                  	<span class="input-group-addon" id="sizing-addon2">IV. Date ( Petsa ng panayam )</span>
			                  	<input type="text" class="form-control pull-right" id="datepicker">
			                </div>
							<div class="input-group">
							  	<span class="input-group-addon" id="sizing-addon2">V. Date ( Petsa ng panayam )</span>
							  	<input type="text" class="form-control" placeholder="Date ( Petsa ng panayam )" aria-describedby="sizing-addon2">
							</div>
							<div class="input-group">
							  	<span class="input-group-addon" id="sizing-addon2">VI. Interviewer ( Tagapanayam )</span>
							  	<input type="text" class="form-control" placeholder="Interviewer ( Tagapanayam )" aria-describedby="sizing-addon2">
							</div>
					  	</div>
					</div>
				</div>
			</div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
  @include('includes.footer')
  @include('includes.settingSidebar')
</div>
<!-- InputMask -->
<script src="{{env('FILE_PATH_CUSTOM')}}plugins/input-mask/jquery.inputmask.js"></script>
<script src="{{env('FILE_PATH_CUSTOM')}}plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="{{env('FILE_PATH_CUSTOM')}}plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script type="text/javascript">
    $('#datepicker').datepicker({
      autoclose: true
    });
</script>
@endsection

