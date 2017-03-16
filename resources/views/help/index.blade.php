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
	Guidelines
	<small></small>
	</h1>
	<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Help</li>
	</ol>
	</section>

	    <!-- Main content -->
    <section class="content">
       <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Help</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <h3>Dashboard</h3>
                <label>To view and to show the population and summary statistic of each barangay and to provide the graph for analyzing data based on the category of residents in each barangay.</label>
              </div>
              <!-- /.form-group -->
            </div>
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <h3>File Maintenance</h3>
                <label>To Add Barangay and to change the status from Active to In-Active.</label>
              </div>
              <!-- /.form-group -->
            </div>
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <h3>Secret Question</h3>
                <label>To Add or Remove Secret Question to retrieve your account if you forget your password.</label>
              </div>
              <!-- /.form-group -->
            </div>
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <h3>Records</h3>
                <label>Click Add New Household Entry to answer the given questions for the family and Submit.</label>
                <label>Click the View Household Member to proceed on the next questions for each member of the family.</label> 
              </div>
              <!-- /.form-group -->
            </div>
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <h3>User Access Management</h3>
                <label>Click User Access Level
                  To view the names of the Admin who are able to manage the system and
                  to Add User Admin or change the role of Admin to become User.</label> 
              </div>
              <!-- /.form-group -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->


	<!-- Main content -->
	<section class="content">

	<!-- Main row -->
	<div class="row">
	<!--insert chart -->
	</div>
	<!-- /.row (main row) -->

	</section>
	<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	@include('includes.footer')
</div>
<script type="text/javascript">
</script>
@endsection

