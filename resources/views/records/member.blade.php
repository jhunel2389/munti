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
							                	<label class="control-label" for="inputWarning"> 11. Surname, Firstname, Middle name</label>\
						    					<span class="help-block">Apelyido, Pangalan, Panggitnang pangalan</span>\
						    					<div class="form-group">\
								                  	<div class="col-sm-4">\
								                    	<input type="text" class="form-control" id="hh_no" placeholder="Surname">\
								                  	</div>\
								                  	<div class="col-sm-4">\
								                    	<input type="text" class="form-control" id="hh_no" placeholder="Firstname">\
								                  	</div>\
								                  	<div class="col-sm-4">\
								                    	<input type="text" class="form-control" id="hh_no" placeholder="Middle name">\
								                  	</div>\
							                	</div>\
							                	<label class="control-label" for="inputWarning"> 12. In which nuclear family does he/she belong?</label>\
						    					<span class="help-block">Sa aling pamilya napapabilang siya napapabilang?</span>\
						    					<div class="form-group">\
								                  	<div class="col-sm-8">\
								                    	<input type="text" class="form-control" id="hh_no" placeholder="">\
								                  	</div>\
							                	</div>\
							                	<label class="control-label" for="inputWarning"> 13. What is the relationship of household member to the head of the household?</label>\
						    					<span class="help-block">Ano ang relasyon niya sa puno ng sambahayan?</span>\
						    					<div class="form-group">\
								                  	<div class="col-sm-4">\
								                    	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
									                     		Head\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
									                     		Wife/Spouse\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
									                     		Son/Daughter\
									                    	</label>\
									                  	</div>\
								                  	</div>\
								                  	<div class="col-sm-4">\
								                    	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
									                     		Son-in-law/Daughter-in-law\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
									                     		Grandson/grandaughter\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
									                     		Father/mother\
									                    	</label>\
									                  	</div>\
								                  	</div>\
								                  	<div class="col-sm-4">\
								                    	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
									                     		Other relatives\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
									                     		Housemaid/boy\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
									                     		Other non-relatives\
									                    	</label>\
									                  	</div>\
								                  	</div>\
							                	</div>\
							                	<div class="row">\
							                		<div class="col-md-3">\
							                			<label class="control-label" for="inputWarning"> 14. Sex(Kasarian)</label>\
							                		</div>\
							                		<div class="col-md-5">\
							                			<div class="form-group">\
								                  		<div class="col-sm-4">\
									                    	<div class="radio">\
										                    	<label>\
										                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
										                     		Male\
										                    	</label>\
										                  	</div>\
									                  	</div>\
									                  	<div class="col-sm-4">\
									                    	<div class="radio">\
										                    	<label>\
										                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
										                     		Female\
										                    	</label>\
										                  	</div>\
									                  	</div>\
								                	</div>\
							                		</div>\
							                	</div>\
							                	<div class="row">\
							                		<div class="col-md-5">\
							                			<label class="control-label" for="inputWarning"> 15. Birthday(Petsa ng kapanganakan)</label>\
							                		</div>\
							                		<div class="col-md-5">\
							                			<input type="text" class="form-control" id="datepicker" placeholder="Birthday">\
							                		</div>\
							                	</div>\
							                	<div class="row">\
							                		<div class="col-md-6">\
							                			<label class="control-label" for="inputWarning"> 16. Registered Birth to the CIVIL Registry Office</label>\
							                		</div>\
							                		<div class="col-md-4">\
							                			<div class="form-group">\
								                  		<div class="col-sm-4">\
									                    	<div class="radio">\
										                    	<label>\
										                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
										                     		Yes\
										                    	</label>\
										                  	</div>\
									                  	</div>\
									                  	<div class="col-sm-4">\
									                    	<div class="radio">\
										                    	<label>\
										                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
										                     		No\
										                    	</label>\
										                  	</div>\
									                  	</div>\
								                	</div>\
							                		</div>\
							                	</div>\
							                	<div class="row">\
							                		<div class="col-md-8">\
							                			<label class="control-label" for="inputWarning"> 17. Ethnicity By Blood(Kinabibilangang Etnika ex. Bicolano)</label>\
							                		</div>\
							                		<div class="col-md-4">\
							                			<input type="text" class="form-control" id="" placeholder="etnika">\
							                		</div>\
							                	</div>\
							                	<label class="control-label" for="inputWarning"> 18. Martial Status/ Katayuan Sibil?</label>\
						    					<div class="form-group">\
								                  	<div class="col-sm-3">\
								                    	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
									                     		Walang asawa\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
									                     		May asawa\
									                    	</label>\
									                  	</div>\
								                  	</div>\
								                  	<div class="col-sm-3">\
								                    	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
									                     		Balo\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
									                     		Live-in\
									                    	</label>\
									                  	</div>\
								                  	</div>\
								                  	<div class="col-sm-3">\
								                  		<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
									                     		Hiwalay\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
									                     		Hiwalay sa asawa\
									                    	</label>\
									                  	</div>\
								                  	</div>\
								                  	<div class="col-sm-3">\
								                  		<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
									                     		Hindi alam\
									                    	</label>\
									                  	</div>\
								                  	</div>\
							                	</div>\
							                	<div class="row">\
							                		<div class="col-md-6">\
							                			<label class="control-label" for="inputWarning"> 19. Is he/she an OFW? Siya ba ay isang OFW?</label>\
							                		</div>\
							                		<div class="col-md-4">\
							                			<div class="form-group">\
								                  		<div class="col-sm-4">\
									                    	<div class="radio">\
										                    	<label>\
										                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
										                     		Yes\
										                    	</label>\
										                  	</div>\
									                  	</div>\
									                  	<div class="col-sm-4">\
									                    	<div class="radio">\
										                    	<label>\
										                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
										                     		No\
										                    	</label>\
										                  	</div>\
									                  	</div>\
								                	</div>\
							                		</div>\
							                	</div>\
							                	<label class="control-label" for="inputWarning"> 20. Where was he/she residing 3 years ago?</label>\
							                	<span class="help-block">Saan siya nakatira noong nakaraaang 3 taon?</span>\
							                	<div class="form-group">\
							                		<div class="col-sm-2">\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>\
									                      		Same Address\
									                    	</label>\
									                  	</div>\
									                </div>\
									                <div class="col-sm-3">\
									                	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">\
									                      		Other Address: Address 3 years ago\
									                    	</label>\
									                  	</div>\
									                </div>\
									                <div class="col-sm-7">\
								                    	<input type="text" class="form-control" id="hh_no" placeholder="">\
								                  	</div>\
								                </div>\
											</div>\
										</div>\
									  	<div id="education" class="tab-pane fade">\
									    	<h3>Education(of household member)</h3>\
						    				<div class="row">\
						                		<div class="col-md-6">\
						                			<label class="control-label" for="inputWarning"> 21. Is he/she attending school?</label>\
					    							<span class="help-block">Nag aaral ba siya sa paaralan?</span>\
						                		</div>\
						                		<div class="col-md-4">\
						                			<div class="form-group">\
								                  		<div class="col-sm-4">\
									                    	<div class="radio">\
										                    	<label>\
										                      		<input type="radio" name="q21Radio" class="q21Radio" id="q21" value="yes">\
										                     		Yes\
										                    	</label>\
										                  	</div>\
									                  	</div>\
									                  	<div class="col-sm-4">\
									                    	<div class="radio">\
										                    	<label>\
										                      		<input type="radio" name="q21Radio" class="q21Radio" id="q21" value="no">\
										                     		No\
										                    	</label>\
										                  	</div>\
									                  	</div>\
								                	</div>\
						                		</div>\
						                	</div>\
						                	<div class="forq21">\
						                	</div>\
						                	<div class="row">\
						                		<div class="col-md-6">\
						                			<div class="form-group">\
							                			<label class="control-label" for="inputWarning"> 25. What is his/her highest educational attainment?</label>\
						    							<span class="help-block">Ano ang pinakamataas na ?</span>\
						    						</div>\
						                		</div>\
						                		<div class="col-md-4">\
						                			<input type="text" class="form-control" id="hh_no" placeholder="Household Member Number">\
						                		</div>\
						                	</div>\
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
        $(function () {
		    $('#datepicker').datepicker({
		      autoclose: true
		    });
		});
		$(document).on("change",".q21Radio",function(){
		    if( $(this).is(":checked") ){ // check if the radio is checked
            	var val = $(this).val(); // retrieve the value
            	$(".forq21yn").fadeOut("fast", function() {
			        $(this).remove();
			    });
            	if(val == "yes"){
            		$(".forq21").append('<div class="forq21yn">\
	            							<label class="control-label" for="inputWarning"> 22. What grade/year he/she currently attending? (Pls. specify)</label>\
					                		<input type="text" class="form-control" id="hh_no" placeholder="Example grade 6">\
					                		<label class="control-label" for="inputWarning"> 23.Where does he/she attend school?</label>\
					    					<div class="form-group">\
						                    	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
							                     		Public(School name)\
							                    	</label>\
							                  	</div>\
							                  	<input type="text" class="form-control" id="hh_no" placeholder="name of school">\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
							                     		Private(School name)\
							                    	</label>\
							                  	</div>\
							                  	<input type="text" class="form-control" id="hh_no" placeholder="name of school">\
						                	</div>\
					                	</div>\
				                		');
            	}
            	else{
            		$(".forq21").append('<div class="forq21yn">\
            								<label class="control-label" for="inputWarning"> 24. Why he/she not attending school?</label>\
            								<span class="help-block">Bakit hindi siya nag aaral?</span>\
            								<div class="form-group">\
						                    	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
							                     		Malayo ang paaralan\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
							                     		Walang paaralan sa barangay\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
							                     		walang regular na transportatyon\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
							                     		Mahal ang pagaaral\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
							                     		Pagkakasakit/kapansanan\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
							                     		Dahil sa gawaing bahay\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
							                     		Pagpapakasal\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
							                     		Hanapbuhay/naghahanap ngtrabaho\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
							                     		Walang interes mag aral\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
							                     		Hindi makapag adjust sa pag aaral\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
							                     		May problema saschool record\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
							                     		Tapos ng mag aral\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
							                     		Problema sa birth certificate\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
							                     		Masyado pang bata para mag aral\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">\
							                     		Iba pa\
							                    	</label>\
							                  	</div>\
							                  	<input type="text" class="form-control" id="hh_no" placeholder="" style="width: 200px" >\
						                	</div>\
					                	</div>\
				                		');
            	}
        	}
		});
	});
	$(document).on("hidden.bs.modal",".modal_info",function(){
      	$(this).remove();
  	});
  	
</script>
@endsection

