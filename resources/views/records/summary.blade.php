@extends('layouts.master')
@section('addHead')
  <title>Dashboard</title>
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
	Summary
	<small>{{$brgyInfo['name']}}</small>
	</h1>
	<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Summary</li>
	</ol>
	</section>
	
	<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
			<div class="input-group">
				<h3 class="box-title">CBMS CORE INDICATORS</h3>
			</div>
			<div class="input-group">
				<h1 class="box-title">13 + 1 DIMENSIONS OF POVERTY</h1>
			</div>
        </div>
        <div class="box-body">
          <div class="col-lg-10">
      			<div class="panel panel-default">
				  	<div class="panel-body">
					    <div class="input-group">
						  	<span class="input-group-addon" id="sizing-addon2">Province :</span>
						  	<label class="form-control">NCR 4, NCR - NATIONAL CAPITAL REGION</label>
						</div>
						<div class="input-group">
						  	<span class="input-group-addon" id="sizing-addon2">City/Municipality: </span>
						  	<label class="form-control">CITY OF MUNTINLUPA</label>
						</div>
				  	</div>
				  	<div class="panel-body">
				  		<div class="input-group">
						  	<span class="input-group-addon" id="sizing-addon2">Barangay :</span>
						  	<label class="form-control">{{$brgyInfo['name']}}</label>
						</div>
					</div>

					<div class="panel-body">
				  		<table class="table	table-bordered">
							<tr>
							  <th colspan="1" rowspan="3">Indicator</th>
							  <th colspan="2">Households</th>
							  <th colspan="6">Population</th>
							</tr>
							<tr>
							  <th colspan="1" rowspan="2">Magnitude</th>
							  <th colspan="1" rowspan="2">Proportion</th>
							  <th colspan="3">Magnitude</th>
							  <th colspan="3">Proportion</th>
							</tr>
							<tr>
							  <th colspan="1">Total</th>
							  <th colspan="1">Male</th>
							  <th colspan="1">Female</th>
							  <th colspan="1">Total</th>
							  <th colspan="1">Male</th>
							  <th colspan="1">Female</th>

							</tr>
						</table>
					</div>
				</div>
	

			</div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
	<!-- /.content -->


	</div>
	<!-- /.content-wrapper -->
	@include('includes.footer')
</div>
<script type="text/javascript">
    
</script>
@endsection