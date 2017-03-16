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

					<div class="panel-body">
				  		<div class="input-group">
						  	<span class="input-group-addon" id="sizing-addon2">Year :</span>
						  	<select class="form-control" id="optYear">
				                @for($a = 2015 ; $a <= date("Y") ;$a++)
				                <option value="{{$a}}" {{($year == $a) ? 'selected' : ''}}>{{$a}}</option>
				                @endfor
            				</select>
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
								<th>
									<font color="#696369">Population</font>
									<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#grpstats1"><i class="fa fa-line-chart"></i></button>
								</th>
								<th style="text-align: right;" id="d_1_a">0</th>
								<th style="text-align: right;" id="d_1_b">0</th>
								<th style="text-align: right;" id="d_1_c">0</th>
								<th style="text-align: right;" id="d_1_d">0</th>
								<th style="text-align: right;" id="d_1_e">0</th>
								<th style="text-align: right;" id="d_1_f">0</th>
								<th style="text-align: right;" id="d_1_g">0</th>
								<th style="text-align: right;" id="d_1_h">0</th>
							</tr>
							<tr>
								<th colspan="9">
								<!-- Bar chart -->
							          <div class="box box-primary" id="grpstats1"></div>
							    <!-- /.box -->
								</th>
							</tr>

							<tr>
								<th><font color="#696369">Average household size</font></th>
								<th style="text-align: right;" id="d_2_a">0</th>
								<th style="text-align: right;" id="d_2_b">0</th>
								<th style="text-align: right;" id="d_2_c">0</th>
								<th style="text-align: right;" id="d_2_d">0</th>
								<th style="text-align: right;" id="d_2_e">0</th>
								<th style="text-align: right;" id="d_2_f">0</th>
								<th style="text-align: right;" id="d_2_g">0</th>
								<th style="text-align: right;" id="d_2_h">0</th>
							</tr>
							<tr>
								<th><font color="#696369">Children under 1 year old</font>
								<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#grpstats2"><i class="fa fa-line-chart"></i></button>
								</th>
								<th style="text-align: right;" id="d_3_a">0</th>
								<th style="text-align: right;" id="d_3_b">0</th>
								<th style="text-align: right;" id="d_3_c">0</th>
								<th style="text-align: right;" id="d_3_d">0</th>
								<th style="text-align: right;" id="d_3_e">0</th>
								<th style="text-align: right;" id="d_3_f">0</th>
								<th style="text-align: right;" id="d_3_g">0</th>
								<th style="text-align: right;" id="d_3_h">0</th>
							</tr>
							<tr>
								<th colspan="9">
								<!-- Bar chart -->
							          <div class="box box-primary" id="grpstats2"></div>
							    <!-- /.box -->
								</th>
							</tr>
							<tr>
								<th><font color="#696369">Children under 5 years old</font>
								<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#grpstats3"><i class="fa fa-line-chart"></i></button>
								</th>
								<th style="text-align: right;" id="d_4_a">0</th>
								<th style="text-align: right;" id="d_4_b">0</th>
								<th style="text-align: right;" id="d_4_c">0</th>
								<th style="text-align: right;" id="d_4_d">0</th>
								<th style="text-align: right;" id="d_4_e">0</th>
								<th style="text-align: right;" id="d_4_f">0</th>
								<th style="text-align: right;" id="d_4_g">0</th>
								<th style="text-align: right;" id="d_4_h">0</th>
							</tr>
							<tr>
								<th colspan="9">
								<!-- Bar chart -->
							          <div class="box box-primary" id="grpstats3"></div>
							    <!-- /.box -->
								</th>
							</tr>
							<tr>
								<th><font color="#696369">Children 0-5 years old</font>
								<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#grpstats4"><i class="fa fa-line-chart"></i></button>
								</th>
								<th style="text-align: right;" id="d_5_a">0</th>
								<th style="text-align: right;" id="d_5_b">0</th>
								<th style="text-align: right;" id="d_5_c">0</th>
								<th style="text-align: right;" id="d_5_d">0</th>
								<th style="text-align: right;" id="d_5_e">0</th>
								<th style="text-align: right;" id="d_5_f">0</th>
								<th style="text-align: right;" id="d_5_g">0</th>
								<th style="text-align: right;" id="d_5_h">0</th>
							</tr>
							<tr>
								<th colspan="9">
								<!-- Bar chart -->
							          <div class="box box-primary" id="grpstats4"></div>
							    <!-- /.box -->
								</th>
							</tr>
							<tr>
								<th><font color="#696369">Children 6-11 years old</font>
								<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#grpstats5"><i class="fa fa-line-chart"></i></button>
								</th>
								<th style="text-align: right;" id="d_6_a">0</th>
								<th style="text-align: right;" id="d_6_b">0</th>
								<th style="text-align: right;" id="d_6_c">0</th>
								<th style="text-align: right;" id="d_6_d">0</th>
								<th style="text-align: right;" id="d_6_e">0</th>
								<th style="text-align: right;" id="d_6_f">0</th>
								<th style="text-align: right;" id="d_6_g">0</th>
								<th style="text-align: right;" id="d_6_h">0</th>
							</tr>
							<tr>
								<th colspan="9">
								<!-- Bar chart -->
							          <div class="box box-primary" id="grpstats5"></div>
							    <!-- /.box -->
								</th>
							</tr>
							<tr>
								<th><font color="#696369">Children 6-12 years old</font>
								<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#grpstats6"><i class="fa fa-line-chart"></i></button>
								</th>
								<th style="text-align: right;" id="d_7_a">0</th>
								<th style="text-align: right;" id="d_7_b">0</th>
								<th style="text-align: right;" id="d_7_c">0</th>
								<th style="text-align: right;" id="d_7_d">0</th>
								<th style="text-align: right;" id="d_7_e">0</th>
								<th style="text-align: right;" id="d_7_f">0</th>
								<th style="text-align: right;" id="d_7_g">0</th>
								<th style="text-align: right;" id="d_7_h">0</th>
							</tr>
							<tr>
								<th colspan="9">
								<!-- Bar chart -->
							          <div class="box box-primary" id="grpstats6"></div>
							    <!-- /.box -->
								</th>
							</tr>
							<tr>
								<th><font color="#696369">Members 12-15 years old</font>
								<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#grpstats7"><i class="fa fa-line-chart"></i></button>
								</th>
								<th style="text-align: right;" id="d_8_a">0</th>
								<th style="text-align: right;" id="d_8_b">0</th>
								<th style="text-align: right;" id="d_8_c">0</th>
								<th style="text-align: right;" id="d_8_d">0</th>
								<th style="text-align: right;" id="d_8_e">0</th>
								<th style="text-align: right;" id="d_8_f">0</th>
								<th style="text-align: right;" id="d_8_g">0</th>
								<th style="text-align: right;" id="d_8_h">0</th>
							</tr>
							<tr>
								<th colspan="9">
								<!-- Bar chart -->
							          <div class="box box-primary" id="grpstats7"></div>
							    <!-- /.box -->
								</th>
							</tr>
							<tr>
								<th><font color="#696369">Members 13-16 years old</font>
								<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#grpstats8"><i class="fa fa-line-chart"></i></button>
								</th>
								<th style="text-align: right;" id="d_9_a">0</th>
								<th style="text-align: right;" id="d_9_b">0</th>
								<th style="text-align: right;" id="d_9_c">0</th>
								<th style="text-align: right;" id="d_9_d">0</th>
								<th style="text-align: right;" id="d_9_e">0</th>
								<th style="text-align: right;" id="d_9_f">0</th>
								<th style="text-align: right;" id="d_9_g">0</th>
								<th style="text-align: right;" id="d_9_h">0</th>
							</tr>
							<tr>
								<th colspan="9">
								<!-- Bar chart -->
							          <div class="box box-primary" id="grpstats8"></div>
							    <!-- /.box -->
								</th>
							</tr>
							<tr>
								<th><font color="#696369">Members 6-15 years old</font>
								<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#grpstats9"><i class="fa fa-line-chart"></i></button>
								</th>
								<th style="text-align: right;" id="d_10_a">0</th>
								<th style="text-align: right;" id="d_10_b">0</th>
								<th style="text-align: right;" id="d_10_c">0</th>
								<th style="text-align: right;" id="d_10_d">0</th>
								<th style="text-align: right;" id="d_10_e">0</th>
								<th style="text-align: right;" id="d_10_f">0</th>
								<th style="text-align: right;" id="d_10_g">0</th>
								<th style="text-align: right;" id="d_10_h">0</th>
							</tr>
							<tr>
								<th colspan="9">
								<!-- Bar chart -->
							          <div class="box box-primary" id="grpstats9"></div>
							    <!-- /.box -->
								</th>
							</tr>
							<tr>
								<th><font color="#696369">Members 6-16 years old</font>
								<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#grpstats10"><i class="fa fa-line-chart"></i></button>
								</th>
								<th style="text-align: right;" id="d_11_a">0</th>
								<th style="text-align: right;" id="d_11_b">0</th>
								<th style="text-align: right;" id="d_11_c">0</th>
								<th style="text-align: right;" id="d_11_d">0</th>
								<th style="text-align: right;" id="d_11_e">0</th>
								<th style="text-align: right;" id="d_11_f">0</th>
								<th style="text-align: right;" id="d_11_g">0</th>
								<th style="text-align: right;" id="d_11_h">0</th>
							</tr>
							<tr>
								<th colspan="9">
								<!-- Bar chart -->
							          <div class="box box-primary" id="grpstats10"></div>
							    <!-- /.box -->
								</th>
							</tr>
							<tr>
								<th><font color="#696369">Members 10 years old and above</font>
								<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#grpstats11"><i class="fa fa-line-chart"></i></button>
								</th>
								<th style="text-align: right;" id="d_12_a">0</th>
								<th style="text-align: right;" id="d_12_b">0</th>
								<th style="text-align: right;" id="d_12_c">0</th>
								<th style="text-align: right;" id="d_12_d">0</th>
								<th style="text-align: right;" id="d_12_e">0</th>
								<th style="text-align: right;" id="d_12_f">0</th>
								<th style="text-align: right;" id="d_12_g">0</th>
								<th style="text-align: right;" id="d_12_h">0</th>
							</tr>
							<tr>
								<th colspan="9">
								<!-- Bar chart -->
							          <div class="box box-primary" id="grpstats11"></div>
							    <!-- /.box -->
								</th>
							</tr>
							<tr>
								<th><font color="#696369">Person With Disabilites</font>
									<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#grpstats18"><i class="fa fa-line-chart"></i></button></th>
								<th style="text-align: right;" id="d_13_a">0</th>
								<th style="text-align: right;" id="d_13_b">0</th>
								<th style="text-align: right;" id="d_13_c">0</th>
								<th style="text-align: right;" id="d_13_d">0</th>
								<th style="text-align: right;" id="d_13_e">0</th>
								<th style="text-align: right;" id="d_13_f">0</th>
								<th style="text-align: right;" id="d_13_g">0</th>
								<th style="text-align: right;" id="d_13_h">0</th>
							</tr>
							<tr>
								<th colspan="9">
								<!-- Bar chart -->
							          <div class="box box-primary" id="grpstats18"></div>
							    <!-- /.box -->
								</th>
							</tr>
							<tr>
								<th><font color="#696369">Senior Citizens</font>
									<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#grpstats19"><i class="fa fa-line-chart"></i></button>
								</th>
								<th style="text-align: right;" id="d_14_a">0</th>
								<th style="text-align: right;" id="d_14_b">0</th>
								<th style="text-align: right;" id="d_14_c">0</th>
								<th style="text-align: right;" id="d_14_d">0</th>
								<th style="text-align: right;" id="d_14_e">0</th>
								<th style="text-align: right;" id="d_14_f">0</th>
								<th style="text-align: right;" id="d_14_g">0</th>
								<th style="text-align: right;" id="d_14_h">0</th>
							</tr>
							<tr>
								<th colspan="9">
								<!-- Bar chart -->
							          <div class="box box-primary" id="grpstats19"></div>
							    <!-- /.box -->
								</th>
							</tr>

							<tr>
								<th bgcolor="black" style="" colspan="9"><font color="#fff">HEALTH AND NUTRITION</font></th>
							</tr>
							<tr>
								<th><font color="#696369">children under 5 years old who died</font></th>
								<th style="text-align: right;" id="han_1_a">0</th>
								<th style="text-align: right;" id="han_1_b">0</th>
								<th style="text-align: right;" id="han_1_c">0</th>
								<th style="text-align: right;" id="han_1_d">0</th>
								<th style="text-align: right;" id="han_1_e">0</th>
								<th style="text-align: right;" id="han_1_f">0</th>
								<th style="text-align: right;" id="han_1_g">0</th>
								<th style="text-align: right;" id="han_1_h">0</th>
							</tr>
							<tr>
								<th><font color="#696369">women who died due to pregnancy related-causes</font></th>
								<th style="text-align: right;" id="han_2_a">0</th>
								<th style="text-align: right;" id="han_2_b">0</th>
								<th style="text-align: right;" id="han_2_c">0</th>
								<th style="text-align: right;" id="han_2_d">0</th>
								<th style="text-align: right;" id="han_2_e">0</th>
								<th style="text-align: right;" id="han_2_f">0</th>
								<th style="text-align: right;" id="han_2_g">0</th>
								<th style="text-align: right;" id="han_2_h">0</th>
							</tr>
							<tr>
								<th><font color="#696369">malnourished children 0-5 year old</font></th>
								<th style="text-align: right;" id="han_3_a">0</th>
								<th style="text-align: right;" id="han_3_b">0</th>
								<th style="text-align: right;" id="han_3_c">0</th>
								<th style="text-align: right;" id="han_3_d">0</th>
								<th style="text-align: right;" id="han_3_e">0</th>
								<th style="text-align: right;" id="han_3_f">0</th>
								<th style="text-align: right;" id="han_3_g">0</th>
								<th style="text-align: right;" id="han_3_h">0</th>
							</tr>
							<tr>
								<th bgcolor="black" style="" colspan="9"><font color="#fff">HOUSING</font></th>
							</tr>
							<tr>
								<th><font color="#696369">households living in makeshift housing</font></th>
								<th style="text-align: right;" id="h_1_a">0</th>
								<th style="text-align: right;" id="h_1_b">0</th>
								<th style="text-align: right;" id="h_1_c">0</th>
								<th style="text-align: right;" id="h_1_d">0</th>
								<th style="text-align: right;" id="h_1_e">0</th>
								<th style="text-align: right;" id="h_1_f">0</th>
								<th style="text-align: right;" id="h_1_g">0</th>
								<th style="text-align: right;" id="h_1_h">0</th>
							</tr>
							<tr>
								<th><font color="#696369">househols who are informal settlers</font></th>
								<th style="text-align: right;" id="h_2_a">0</th>
								<th style="text-align: right;" id="h_2_b">0</th>
								<th style="text-align: right;" id="h_2_c">0</th>
								<th style="text-align: right;" id="h_2_d">0</th>
								<th style="text-align: right;" id="h_2_e">0</th>
								<th style="text-align: right;" id="h_2_f">0</th>
								<th style="text-align: right;" id="h_2_g">0</th>
								<th style="text-align: right;" id="h_2_h">0</th>
							</tr>
							<tr>
								<th bgcolor="black" style="" colspan="9"><font color="#fff">WATER AND SANITATION</font></th>
							</tr>
							<tr>
								<th><font color="#696369">households without access to safe water</font></th>
								<th style="text-align: right;" id="was_1_a">0</th>
								<th style="text-align: right;" id="was_1_b">0</th>
								<th style="text-align: right;" id="was_1_c">0</th>
								<th style="text-align: right;" id="was_1_d">0</th>
								<th style="text-align: right;" id="was_1_e">0</th>
								<th style="text-align: right;" id="was_1_f">0</th>
								<th style="text-align: right;" id="was_1_g">0</th>
								<th style="text-align: right;" id="was_1_h">0</th>
							</tr>
							<tr>
								<th><font color="#696369">households without access to sanitary toilet facility</font></th>
								<th style="text-align: right;" id="was_2_a">0</th>
								<th style="text-align: right;" id="was_2_b">0</th>
								<th style="text-align: right;" id="was_2_c">0</th>
								<th style="text-align: right;" id="was_2_d">0</th>
								<th style="text-align: right;" id="was_2_e">0</th>
								<th style="text-align: right;" id="was_2_f">0</th>
								<th style="text-align: right;" id="was_2_g">0</th>
								<th style="text-align: right;" id="was_2_h">0</th>
							</tr>
							<tr>
								<th bgcolor="black" style="" colspan="9"><font color="#fff">BASIC EDUCATION</font></th>
							</tr>
							<tr>
								<th><font color="#696369">children 6-11 years old not attending elementary</font>
								<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#grpstats12"><i class="fa fa-line-chart"></i></button>
								</th>
								<th style="text-align: right;" id="be_1_a">0</th>
								<th style="text-align: right;" id="be_1_b">0</th>
								<th style="text-align: right;" id="be_1_c">0</th>
								<th style="text-align: right;" id="be_1_d">0</th>
								<th style="text-align: right;" id="be_1_e">0</th>
								<th style="text-align: right;" id="be_1_f">0</th>
								<th style="text-align: right;" id="be_1_g">0</th>
								<th style="text-align: right;" id="be_1_h">0</th>
							</tr>
							<tr>
								<th colspan="9">
								<!-- Bar chart -->
							          <div class="box box-primary" id="grpstats12"></div>
							    <!-- /.box -->
								</th>
							</tr>
							<tr>
								<th><font color="#696369">children 6-12 years old not attending elementary</font>
								<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#grpstats13"><i class="fa fa-line-chart"></i></button>
								</th>
								<th style="text-align: right;" id="be_2_a">0</th>
								<th style="text-align: right;" id="be_2_b">0</th>
								<th style="text-align: right;" id="be_2_c">0</th>
								<th style="text-align: right;" id="be_2_d">0</th>
								<th style="text-align: right;" id="be_2_e">0</th>
								<th style="text-align: right;" id="be_2_f">0</th>
								<th style="text-align: right;" id="be_2_g">0</th>
								<th style="text-align: right;" id="be_2_h">0</th>
							</tr>
							<tr>
								<th colspan="9">
								<!-- Bar chart -->
							          <div class="box box-primary" id="grpstats13"></div>
							    <!-- /.box -->
								</th>
							</tr>
							<tr>
								<th><font color="#696369">children 12-15 years old not attending high school</font>
								<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#grpstats14"><i class="fa fa-line-chart"></i></button>
								</th>
								<th style="text-align: right;" id="be_3_a">0</th>
								<th style="text-align: right;" id="be_3_b">0</th>
								<th style="text-align: right;" id="be_3_c">0</th>
								<th style="text-align: right;" id="be_3_d">0</th>
								<th style="text-align: right;" id="be_3_e">0</th>
								<th style="text-align: right;" id="be_3_f">0</th>
								<th style="text-align: right;" id="be_3_g">0</th>
								<th style="text-align: right;" id="be_3_h">0</th>
							</tr>
							<tr>
								<th colspan="9">
								<!-- Bar chart -->
							          <div class="box box-primary" id="grpstats14"></div>
							    <!-- /.box -->
								</th>
							</tr>
							<tr>
								<th><font color="#696369">children 13-16 years old not attending high school</font>
								<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#grpstats15"><i class="fa fa-line-chart"></i></button>
								</th>
								<th style="text-align: right;" id="be_4_a">0</th>
								<th style="text-align: right;" id="be_4_b">0</th>
								<th style="text-align: right;" id="be_4_c">0</th>
								<th style="text-align: right;" id="be_4_d">0</th>
								<th style="text-align: right;" id="be_4_e">0</th>
								<th style="text-align: right;" id="be_4_f">0</th>
								<th style="text-align: right;" id="be_4_g">0</th>
								<th style="text-align: right;" id="be_4_h">0</th>
							</tr>
							<tr>
								<th colspan="9">
								<!-- Bar chart -->
							          <div class="box box-primary" id="grpstats15"></div>
							    <!-- /.box -->
								</th>
							</tr>
							<tr>
								<th><font color="#696369">children 6-15 years old not attending school</font>
								<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#grpstats16"><i class="fa fa-line-chart"></i></button>
								</th>
								<th style="text-align: right;" id="be_5_a">0</th>
								<th style="text-align: right;" id="be_5_b">0</th>
								<th style="text-align: right;" id="be_5_c">0</th>
								<th style="text-align: right;" id="be_5_d">0</th>
								<th style="text-align: right;" id="be_5_e">0</th>
								<th style="text-align: right;" id="be_5_f">0</th>
								<th style="text-align: right;" id="be_5_g">0</th>
								<th style="text-align: right;" id="be_5_h">0</th>
							</tr>
							<tr>
								<th colspan="9">
								<!-- Bar chart -->
							          <div class="box box-primary" id="grpstats16"></div>
							    <!-- /.box -->
								</th>
							</tr>
							<tr>
								<th><font color="#696369">children 6-16 years old not attending school</font>
								<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#grpstats17"><i class="fa fa-line-chart"></i></button>
								</th>
								<th style="text-align: right;" id="be_6_a">0</th>
								<th style="text-align: right;" id="be_6_b">0</th>
								<th style="text-align: right;" id="be_6_c">0</th>
								<th style="text-align: right;" id="be_6_d">0</th>
								<th style="text-align: right;" id="be_6_e">0</th>
								<th style="text-align: right;" id="be_6_f">0</th>
								<th style="text-align: right;" id="be_6_g">0</th>
								<th style="text-align: right;" id="be_6_h">0</th>
							</tr>
							<tr>
								<th colspan="9">
								<!-- Bar chart -->
							          <div class="box box-primary" id="grpstats17"></div>
							    <!-- /.box -->
								</th>
							</tr>
							<tr>
							<th bgcolor="black" style="" colspan="9"><font color="#fff">EMPLOYMENT</font></th>
							</tr>
							<tr>
								<th><font color="#696369">Employed</font>
									<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#grpstats20"><i class="fa fa-line-chart"></i></button>
								</th>
								<th style="text-align: right;" id="emp_1_a">0</th>
								<th style="text-align: right;" id="emp_1_b">0</th>
								<th style="text-align: right;" id="emp_1_c">0</th>
								<th style="text-align: right;" id="emp_1_d">0</th>
								<th style="text-align: right;" id="emp_1_e">0</th>
								<th style="text-align: right;" id="emp_1_f">0</th>
								<th style="text-align: right;" id="emp_1_g">0</th>
								<th style="text-align: right;" id="emp_1_h">0</th>      
							</tr>
							<tr>
								<th colspan="9">
								<!-- Bar chart -->
							          <div class="box box-primary" id="grpstats20"></div>
							    <!-- /.box -->
								</th>
							</tr>
							<tr>
								<th><font color="#696369">Unemployed</font>
									<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#grpstats21"><i class="fa fa-line-chart"></i></button>
								</th>
								<th style="text-align: right;" id="emp_2_a">0</th>
								<th style="text-align: right;" id="emp_2_b">0</th>
								<th style="text-align: right;" id="emp_2_c">0</th>
								<th style="text-align: right;" id="emp_2_d">0</th>
								<th style="text-align: right;" id="emp_2_e">0</th>
								<th style="text-align: right;" id="emp_2_f">0</th>
								<th style="text-align: right;" id="emp_2_g">0</th>
								<th style="text-align: right;" id="emp_2_h">0</th>
							</tr>
							<tr>
								<th colspan="9">
								<!-- Bar chart -->
							          <div class="box box-primary" id="grpstats21"></div>
							    <!-- /.box -->
								</th>
							</tr>
							<tr>
								<th bgcolor="black" style="" colspan="9"><font color="#fff">INCOME AND LIVELIHOOD</font></th>
							</tr>
							<tr>
								<th><font color="#696369">households with income below poverty threshold</font></th>
								<th style="text-align: right;" id="ial_1_a">0</th>
								<th style="text-align: right;" id="ial_1_b">0</th>
								<th style="text-align: right;" id="ial_1_c">0</th>
								<th style="text-align: right;" id="ial_1_d">0</th>
								<th style="text-align: right;" id="ial_1_e">0</th>
								<th style="text-align: right;" id="ial_1_f">0</th>
								<th style="text-align: right;" id="ial_1_g">0</th>
								<th style="text-align: right;" id="ial_1_h">0</th>
							</tr>
							<tr>
								<th><font color="#696369">households with income below food threshold</font></th>
								<th style="text-align: right;" id="ial_2_a">0</th>
								<th style="text-align: right;" id="ial_2_b">0</th>
								<th style="text-align: right;" id="ial_2_c">0</th>
								<th style="text-align: right;" id="ial_2_d">0</th>
								<th style="text-align: right;" id="ial_2_e">0</th>
								<th style="text-align: right;" id="ial_2_f">0</th>
								<th style="text-align: right;" id="ial_2_g">0</th>
								<th style="text-align: right;" id="ial_2_h">0</th>
							</tr>
							<tr>
								<th><font color="#696369">households who experienced food shortage</font></th>
								<th style="text-align: right;" id="ial_3_a">0</th>
								<th style="text-align: right;" id="ial_3_b">0</th>
								<th style="text-align: right;" id="ial_3_c">0</th>
								<th style="text-align: right;" id="ial_3_d">0</th>
								<th style="text-align: right;" id="ial_3_e">0</th>
								<th style="text-align: right;" id="ial_3_f">0</th>
								<th style="text-align: right;" id="ial_3_g">0</th>
								<th style="text-align: right;" id="ial_3_h">0</th>
							</tr>
							<tr>
								<th><font color="#696369">Unemployed members of the labor force</font></th>
								<th style="text-align: right;" id="ial_4_a">0</th>
								<th style="text-align: right;" id="ial_4_b">0</th>
								<th style="text-align: right;" id="ial_4_c">0</th>
								<th style="text-align: right;" id="ial_4_d">0</th>
								<th style="text-align: right;" id="ial_4_e">0</th>
								<th style="text-align: right;" id="ial_4_f">0</th>
								<th style="text-align: right;" id="ial_4_g">0</th>
								<th style="text-align: right;" id="ial_4_h">0</th>
							</tr>
							<tr>
								<th bgcolor="black" style="" colspan="9"><font color="#fff">PEACE AND ORDER</font></th>
							</tr>
							<tr>
								<th><font color="#696369">Victims of crime</font></th>
								<th style="text-align: right;" id="pao_1_a">0</th>
								<th style="text-align: right;" id="pao_1_b">0</th>
								<th style="text-align: right;" id="pao_1_c">0</th>
								<th style="text-align: right;" id="pao_1_d">0</th>
								<th style="text-align: right;" id="pao_1_e">0</th>
								<th style="text-align: right;" id="pao_1_f">0</th>
								<th style="text-align: right;" id="pao_1_g">0</th>
								<th style="text-align: right;" id="pao_1_h">0</th>
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
	<!-- ChartJS 1.0.1 -->
	<script src="{{env('FILE_PATH_CUSTOM')}}plugins/chartjs/Chart.min.js"></script>
<script type="text/javascript">
	loadStats();
    function loadStats()
    {
    	$.get('{{URL::Route('statisticSummarry', [$brgyInfo['id'] , $year])}}', function(data)
		{
			for (var i = 0; i < data.length; i++) {
				$("#"+data[i][1]).text(data[i][0]);
			}
    	});

    	for(var i=1; i <= 21 ; i++) {
    		$("#grpstats"+i).append(
    			$('<div />', {'class': 'box-header with-border' }).append(
    				$('<i />' , { 'class' : 'fa fa-bar-chart-o' }),
    				$('<h3 />' , { 'class' : 'box-title' , 'text' : 'Bar Chart' }),
    				$('<i />' , { 'class' : 'pull-right' , 'html' : 'Legend: <font color="c1c7d1">Male</font> | <font color="ef00c0">Female</font>' })),
    			$('<div />', {'class' : 'box-body'}).append(
    				$('<div />', {'class' : 'chart'}).append(
    					$('<canvas />' , {'id' : 'barChart'+i ,'style' : 'height: 300px; width: 100%;'}))));
    	}

    	$.get('{{URL::Route('generateGraph', [$brgyInfo['id'] , $year])}}', function(data)
		{
			for (var i = 0; i < data.length  ; i++) {
				generateChart(data[i][0],data[i][1],i+1);
			}
    	});
    }


    function generateChart(male,female,element) {

    var areaChartData = {
      labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November", "December"],
      datasets: [
        {
          label: "Male",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: male
        },
        {
          label: "Female",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: female
        }
      ]
    };
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart"+element).get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    barChartData.datasets[1].fillColor = "#ef00c0";
    barChartData.datasets[1].strokeColor = "#ef00c0";
    barChartData.datasets[1].pointColor = "#ef00c0";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
    $("#grpstats"+element).addClass("collapse");
}

	$( "#optYear" ).change(function() {
		$cid = {{ $brgyInfo['id'] }};
		$year = $("#optYear").val();
		$.get('{{URL::Route('brgySummaryGenerateLink')}}',{ cid: $cid , year: $year}, function(data)
		{
			window.location.replace(data);
    	});
       
    });
</script>
@endsection