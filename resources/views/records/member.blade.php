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
        Family Members
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ URL::Route('getUAL') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Family Members</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="box box-primary">
	        <div class="box-header with-border">
	          <h3 class="box-title">Family Members</h3>
	        </div>
	        <div class="box-body">
	        	<div class="row">
	          		<div class="col-lg-4">
			  			<div class="panel-heading">LIST DOWN NAMES OF EACH HOUSEHOLD MEMBER</div>
			  			<button type="button" class="btn btn-info pull-left btn_add">Add</button>

		            </div>
		        </div>
			</div>
    	</div>
    </section>
  </div>
  <!-- /.content-wrapper -->
  @include('includes.footer')
  @include('includes.settingSidebar')
</div>
<script type="text/javascript">
	$(document).on("click",".btn_add",function(){
		$('body').append('<div class="modal fade modal_info" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">\
                        <div class="modal-dialog" style="width:645px;">\
                          	<div class="modal-content">\
	                            <div class="modal-body">\
	                              	<ul class="nav nav-tabs">\
										<li class="active"><a data-toggle="tab" href="#info">Info</a></li>\
										<li><a data-toggle="tab" href="#education">Education</a></li>\
										<li><a data-toggle="tab" href="#komunidad">Komunidad</a></li>\
										<li><a data-toggle="tab" href="#ecom">Economic Activity</a></li>\
										<li><a data-toggle="tab" href="#ecom2">Economic Activity</a></li>\
										<li><a data-toggle="tab" href="#health">Health</a></li>\
									</ul>\
									<div class="tab-content">\
										<div id="info" class="tab-pane fade in active">\
											<h3>Household Information</h3>\
											<div class="form-horizontal">\
												<div class="form-group">\
							                  		<label for="hh_no" class="col-sm-4 control-label">Household Member Number</label>\
								                  	<div class="col-sm-8">\
								                    	<input type="text" class="form-control" id="hh_no" placeholder="Household Member Number">\
								                  	</div>\
							                	</div>\
											</div>\
										</div>\
									  	<div id="education" class="tab-pane fade">\
									    	<h3>Menu 1</h3>\
									    	<p>Some content in menu 1.</p>\
									  	</div>\
									  	<div id="komunidad" class="tab-pane fade">\
									    	<h3>Menu 2</h3>\
									    	<p>Some content in menu 2.</p>\
									  	</div>\
									  	<div id="ecom" class="tab-pane fade">\
									    	<h3>Menu 2</h3>\
									    	<p>Some content in menu 2.</p>\
									  	</div>\
									  	<div id="ecom2" class="tab-pane fade">\
									    	<h3>Menu 2</h3>\
									    	<p>Some content in menu 2.</p>\
									  	</div>\
									  	<div id="health" class="tab-pane fade">\
									    	<h3>Menu 2</h3>\
									    	<p>Some content in menu 2.</p>\
									  	</div>\
									</div>\
	                            </div>\
	                            <div class="modal-footer">\
	                              	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>\
	                            </div>\
                          	</div>\
                        </div>\
                      </div>');
        $('.modal_info').modal('show');
	});
	$(document).on("hidden.bs.modal",".modal_info",function(){
      	$(this).remove();
  	});
</script>
@endsection

