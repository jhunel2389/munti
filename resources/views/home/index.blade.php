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
	Dashboard
	<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Dashboard</li>
	</ol>
	</section>
	@include('includes.statsBox')
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

