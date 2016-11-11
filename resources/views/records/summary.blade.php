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
          <div class="col-lg-12">
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

					<div class="panel-body table-responsive">
				  		<table class="table	table-bordered table-hover table-striped">
							<tr>
							  <th colspan="1" rowspan="3" style="text-align: center;">Indicator</th>
							  <th colspan="2" style="text-align: center;">Households</th>
							  <th colspan="6" style="text-align: center;">Population</th>
							</tr>
							<tr>
							  <th colspan="1" rowspan="2" style="text-align: center;">Magnitude</th>
							  <th colspan="1" rowspan="2" style="text-align: center;">Proportion</th>
							  <th colspan="3" style="text-align: center;">Magnitude</th>
							  <th colspan="3">Proportion</th>
							</tr>
							<tr>
							  <th colspan="1" style="text-align: center;">Total</th>
							  <th colspan="1" style="text-align: center;">Male</th>
							  <th colspan="1" style="text-align: center;">Female</th>
							  <th colspan="1" style="text-align: center;">Total</th>
							  <th colspan="1" style="text-align: center;">Male</th>
							  <th colspan="1" style="text-align: center;">Female</th>
							</tr>
							<tr>
								<th bgcolor="black" style="" colspan="9"><font color="#fff">DEMOGRAPHY</font></th>
							</tr>
							<tr>
								<th><font color="#696369">Population</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">Average household size</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">Children under 1 year old</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">Children under 5 years old</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">Children 0-5 years old</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">Children 6-11 years old</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">Children 6-12 years old</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">Members 12-15 years old</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">Members 13-16 years old</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">Members 6-15 years old</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">Members 6-16 years old</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">Members 10 years old and above</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">Members of the labor force</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th bgcolor="black" style="" colspan="9"><font color="#fff">HEALTH AND NUTRITION</font></th>
							</tr>
							<tr>
								<th><font color="#696369">children under 5 years old who died</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">women who died due to pregnancy related-causes</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">malnourished children 0-5 year old</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th bgcolor="black" style="" colspan="9"><font color="#fff">HOUSING</font></th>
							</tr>
							<tr>
								<th><font color="#696369">households living in makeshift housing</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">househols who are informal settlers</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th bgcolor="black" style="" colspan="9"><font color="#fff">WATER AND SANITATION</font></th>
							</tr>
							<tr>
								<th><font color="#696369">households without access to safe water</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">households without access to sanitary toilet facility</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th bgcolor="black" style="" colspan="9"><font color="#fff">BASIC EDUCATION</font></th>
							</tr>
							<tr>
								<th><font color="#696369">children 6-11 years old not attending elementary</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">children 6-12 years old not attending elementary</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">children 12-15 years old not attending high school</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">children 13-16 years old not attending high school</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">children 6-15 years old not attending school</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">children 6-16 years old not attending school</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th bgcolor="black" style="" colspan="9"><font color="#fff">INCOME AND LIVELIHOOD</font></th>
							</tr>
							<tr>
								<th><font color="#696369">households with income below poverty threshold</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">households with income below food threshold</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">households who experienced food shortage</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th><font color="#696369">Unemployed members of the labor force</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
							<tr>
								<th bgcolor="black" style="" colspan="9"><font color="#fff">PEACE AND ORDER</font></th>
							</tr>
							<tr>
								<th><font color="#696369">Victims of crime</font></th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
								<th style="text-align: right;">123</th>
							</tr>
						</table>
					</div>
				</div>
	

			</div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Summary for {{$brgyInfo['name']}}
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