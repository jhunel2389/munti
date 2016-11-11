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
								                    	<input type="text" class="form-control" id="household_member_no" placeholder="Household Member Number">\
								                  	</div>\
							                	</div>\
							                	<label class="control-label" for="inputWarning"> 11. Surname, Firstname, Middle name</label>\
						    					<span class="help-block">Apelyido, Pangalan, Panggitnang pangalan</span>\
						    					<div class="form-group">\
								                  	<div class="col-sm-4">\
								                    	<input type="text" class="form-control" id="lname" placeholder="Surname">\
								                  	</div>\
								                  	<div class="col-sm-4">\
								                    	<input type="text" class="form-control" id="fname" placeholder="Firstname">\
								                  	</div>\
								                  	<div class="col-sm-4">\
								                    	<input type="text" class="form-control" id="mname" placeholder="Middle name">\
								                  	</div>\
							                	</div>\
							                	<label class="control-label" for="inputWarning"> 12. In which nuclear family does he/she belong?</label>\
						    					<span class="help-block">Sa aling pamilya napapabilang siya napapabilang?</span>\
						    					<div class="form-group">\
								                  	<div class="col-sm-8">\
								                    	<input type="text" class="form-control" id="mem_12" placeholder="">\
								                  	</div>\
							                	</div>\
							                	<label class="control-label" for="inputWarning"> 13. What is the relationship of household member to the head of the household?</label>\
						    					<span class="help-block">Ano ang relasyon niya sa puno ng sambahayan?</span>\
						    					<div class="form-group">\
								                  	<div class="col-sm-4">\
								                    	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="mem_13" id="mem_13" value="1">\
									                     		Head\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="mem_13" id="mem_13" value="2">\
									                     		Wife/Spouse\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="mem_13" id="mem_13" value="3">\
									                     		Son/Daughter\
									                    	</label>\
									                  	</div>\
								                  	</div>\
								                  	<div class="col-sm-4">\
								                    	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="mem_13" id="mem_13" value="4">\
									                     		Son-in-law/Daughter-in-law\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="mem_13" id="mem_13" value="5">\
									                     		Grandson/grandaughter\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="mem_13" id="mem_13" value="6">\
									                     		Father/mother\
									                    	</label>\
									                  	</div>\
								                  	</div>\
								                  	<div class="col-sm-4">\
								                    	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="mem_13" id="mem_13" value="7">\
									                     		Other relatives\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="mem_13" id="mem_13" value="8">\
									                     		Housemaid/boy\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="mem_13" id="mem_13" value="9">\
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
										                      		<input type="radio" name="sex_14" id="sex_14" value="1">\
										                     		Male\
										                    	</label>\
										                  	</div>\
									                  	</div>\
									                  	<div class="col-sm-4">\
									                    	<div class="radio">\
										                    	<label>\
										                      		<input type="radio" name="sex_14" id="sex_14" value="2">\
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
										                      		<input type="radio" name="civil_reg_16" id="civil_reg_16" value="1">\
										                     		Yes\
										                    	</label>\
										                  	</div>\
									                  	</div>\
									                  	<div class="col-sm-4">\
									                    	<div class="radio">\
										                    	<label>\
										                      		<input type="radio" name="civil_reg_16" id="civil_reg_16" value="2">\
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
							                			<input type="text" class="form-control" id="stats_17" placeholder="etnika">\
							                		</div>\
							                	</div>\
							                	<label class="control-label" for="inputWarning"> 18. Martial Status/ Katayuan Sibil?</label>\
						    					<div class="form-group">\
								                  	<div class="col-sm-3">\
								                    	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="mem_18" id="mem_18" value="1">\
									                     		Walang asawa\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="mem_18" id="mem_18" value="2">\
									                     		May asawa\
									                    	</label>\
									                  	</div>\
								                  	</div>\
								                  	<div class="col-sm-3">\
								                    	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="mem_18" id="mem_18" value="3">\
									                     		Balo\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="mem_18" id="mem_18" value="4">\
									                     		Live-in\
									                    	</label>\
									                  	</div>\
								                  	</div>\
								                  	<div class="col-sm-3">\
								                  		<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="mem_18" id="mem_18" value="5">\
									                     		Hiwalay\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="mem_18" id="mem_18" value="6">\
									                     		Hiwalay sa asawa\
									                    	</label>\
									                  	</div>\
								                  	</div>\
								                  	<div class="col-sm-3">\
								                  		<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="mem_18" id="mem_18" value="7">\
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
										                      		<input type="radio" name="ofw_19" id="ofw_19" value="1">\
										                     		Yes\
										                    	</label>\
										                  	</div>\
									                  	</div>\
									                  	<div class="col-sm-4">\
									                    	<div class="radio">\
										                    	<label>\
										                      		<input type="radio" name="ofw_19" id="ofw_19" value="2">\
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
									                      		<input type="radio" name="mem_20" id="mem_20" value="1" checked>\
									                      		Same Address\
									                    	</label>\
									                  	</div>\
									                </div>\
									                <div class="col-sm-3">\
									                	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" name="mem_20" id="mem_20" value="2">\
									                      		Other Address: Address 3 years ago\
									                    	</label>\
									                  	</div>\
									                </div>\
									                <div class="col-sm-7">\
								                    	<input type="text" class="form-control" id="mem_20_other" placeholder="">\
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
										                      		<input type="radio" name="d_21_schooling" class="q21Radio" id="d_21_schooling" value="1">\
										                     		Yes\
										                    	</label>\
										                  	</div>\
									                  	</div>\
									                  	<div class="col-sm-4">\
									                    	<div class="radio">\
										                    	<label>\
										                      		<input type="radio" name="d_21_schooling" class="q21Radio" id="d_21_schooling" value="2">\
										                     		No\
										                    	</label>\
										                  	</div>\
									                  	</div>\
								                	</div>\
						                		</div>\
						                	</div>\
						                	<div class="forq21">\
						                	</div>\
						                	<div class="form-group">\
					                			<label class="control-label" for="inputWarning"> 25. What is his/her highest educational attainment?</label>\
				    							<span class="help-block">Ano ang pinakamataas na antas ng pag aaral ang natapos niya?</span>\
				    							<input style="width: 200px" type="text" class="form-control" id="d_25_a" placeholder="">\
				    						</div>\
				    						<div class="form-group">\
					                			<label class="control-label" for="inputWarning"> If college graduate, what is his/her course?</label>\
				    							<span class="help-block">Anong kurso ang natapos niya?</span>\
				    							<input style="width: 200px" type="text" class="form-control" id="d_25_b" placeholder="kurso">\
				    						</div>\
									  	</div>\
									  	<div id="komunidad" class="tab-pane fade">\
									  		<h3></h3>\
									    	<div class="form-group">\
					                			<label class="control-label" for="inputWarning"> 27. Siya ba ay rehistradong botante?</label>\
				    							<span class="help-block">Is he/she a registered voter?</span>\
				    							<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="f_27" class="" id="f_27" value="1">\
							                     		Yes\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="f_27" class="" id="f_27" value="2">\
							                     		No\
							                    	</label>\
							                  	</div>\
				    						</div>\
				    						<div class="form-group">\
					                			<label class="control-label" for="inputWarning"> 28. Kung oo,suya ba ay bumoto noong nakaraang eleksyon?</label>\
				    							<span class="help-block">If yes, did he/she voted last election?</span>\
				    							<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="f_28" class="" id="f_28" value="1">\
							                     		Yes\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="f_28" class="" id="f_28" value="2">\
							                     		No\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="f_28" class="" id="f_28" value="3">\
							                     		Dont know\
							                    	</label>\
							                  	</div>\
				    						</div>\
									  	</div>\
									  	<div id="ecom" class="tab-pane fade">\
									  		<h3></h3>\
									    	<div class="row">\
						                		<div class="col-md-7">\
						                			<label class="control-label" for="inputWarning"> (31.) How many hob or business does he/she have?</label>\
						                			<span class="help-block">(Ilang hanapbuhay/negosyo ang mayroon siya?)</span>\
						                		</div>\
						                		<div class="col-md-3">\
						                			<input type="text" style="width: 60px" class="form-control" id="f_31" placeholder="">\
						                		</div>\
						                	</div>\
						                	<div class="form-group">\
					                			<label class="control-label" for="inputWarning"> 29. Did he/she do any work for atleast one hour during the past week?</label>\
				    							<span class="help-block">(Siya ba ay may hanapbuhay kahit isang oras noong nakaraang lingo?)</span>\
				    							<div class="radio">\
							                    	<label>\
							                      		<input type="radio" class="q29Radio" name="f_29" class="" id="f_29" value="1">\
							                     		No; if no:\
							                    	</label>\
							                  	</div>\
							                  	<div class="forq29n" style="padding-left: 20px;">\
						                		</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" class="q29Radio" name="f_29" class="" id="f_29" value="2">\
							                     		Yes; if yes:\
							                    	</label>\
							                  	</div>\
							                  	<div class="forq29y">\
						                		</div>\
				    						</div>\
									  	</div>\
									  	<div id="ecom2" class="tab-pane fade">\
									    	<h3></h3>\
									    	<div class="form-group">\
									    		<label class="control-label" for="inputWarning"> 48A. IN the past 12 months, how much is the total salary/wages(in cash) she/she has receieved)?</label>\
				    							<span class="help-block">Noong nakaraang buwan, magkano ang kabuuang halaga ng sweldo/sahod na kaniyang natanggap(SALAPI)?</span>\
									    		<input type="text" class="form-control" id="f_48_a" placeholder="" style="width: 200px">\
									    	</div>\
									    	<div class="form-group">\
									    		<label class="control-label" for="inputWarning"> 48B. IN the past 12 months, how much is the total salary/wages(in kind) she/she has receieved)?</label>\
				    							<span class="help-block">Noong nakaraang buwan, magkano ang kabuuang halaga ng sweldo/sahod na kaniyang natanggap(BAGAY)?</span>\
									    		<input type="text" class="form-control" id="f_48_b" placeholder="" style="width: 200px">\
									    	</div>\
									    	<div class="form-group">\
									    		<label class="control-label" for="inputWarning"> 49. Is he/she a member of SSS or GSIS?</label>\
				    							<span class="help-block">Siya ba ay miyembro ng SS o GSIS?</span>\
									    		<div class="radio">\
							                    	<label>\
							                      		<input type="radio" class="q49Radio" name="f_49" class="" id="f_49" value="yes">\
							                     		SSS only\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" class="q49Radio" name="f_49" class="" id="f_49" value="no">\
							                     		GSIS only\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" class="q49Radio" name="f_49" class="" id="f_49" value="no">\
							                     		Both SSS and GSIS\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" class="q49Radio" name="f_49" class="" id="f_49" value="no">\
							                     		Neither\
							                    	</label>\
							                  	</div>\
									    	</div>\
									  	</div>\
									  	<div id="health" class="tab-pane fade">\
									    	<h3></h3>\
									    	<div class="form-group">\
									    		<label class="control-label" for="inputWarning"> 50. Is the household member pregnant?</label>\
				    							<span class="help-block">Siya ba ay buntis?/span>\
				    							<div class="row">\
				    								<div class="col-md-1">\
				    									<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q50Radio" name="g_50" class="" id="g_50" value="1">\
									                     		Yes\
									                    	</label>\
									                  	</div>\
				    								</div>\
				    								<div class="col-md-1">\
				    									<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q50Radio" name="g_50" class="" id="g_50" value="2">\
									                     		No\
									                    	</label>\
									                  	</div>\
				    								</div>\
				    							</div>\
									    	</div>\
									    	<div class="form-group">\
									    		<label class="control-label" for="inputWarning"> 51. Is he/she a solo parent taking care of child/children?</label>\
				    							<span class="help-block">Siya ba nag iisang magulang na may kinakailingang anak?/span>\
				    							<div class="row">\
				    								<div class="col-md-1">\
				    									<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q51Radio" name="g_51" class="" id="g_51" value="1">\
									                     		Yes\
									                    	</label>\
									                  	</div>\
				    								</div>\
				    								<div class="col-md-1">\
				    									<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q51Radio" name="g_51" class="" id="g_51" value="2">\
									                     		No\
									                    	</label>\
									                  	</div>\
				    								</div>\
				    							</div>\
									    	</div>\
									    	<div class="form-group">\
									    		<label class="control-label" for="inputWarning"> 52. Does he/she have any physical or mental disablity?</label>\
				    							<span class="help-block">Siya ba ay may kapansanan?/span>\
				    							<div class="row">\
				    								<div class="col-md-1">\
				    									<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q52Radio" name="g_52" class="" id="g_52" value="1">\
									                     		Yes:if yes, please answer 53:\
									                    	</label>\
									                  	</div>\
				    								</div>\
				    								<div class="col-md-1">\
				    									<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q52Radio" name="g_52" class="" id="g_52" value="2">\
									                     		No\
									                    	</label>\
									                  	</div>\
				    								</div>\
				    							</div>\
									    	</div>\
									    	<div class="forq52y">\
									    	</div>\
									    	<div class="form-group">\
									    		<label class="control-label" for="inputWarning"> 54. Does he/she have PWDs ID?</label>\
				    							<span class="help-block">Siya ba ay may ID para sa mga PWD?/span>\
				    							<div class="row">\
				    								<div class="col-md-1">\
				    									<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q54Radio" name="g_54" class="" id="g_54" value="yes">\
									                     		Yes\
									                    	</label>\
									                  	</div>\
				    								</div>\
				    								<div class="col-md-1">\
				    									<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q54Radio" name="g_54" class="" id="g_54" value="yes">\
									                     		No\
									                    	</label>\
									                  	</div>\
				    								</div>\
				    							</div>\
									    	</div>\
									    	<b>"For 60 years old and above"</b>\
									    	<div class="form-group">\
									    		<label class="control-label" for="inputWarning"> 55. Does he/she a Senior Citizens ID?</label>\
				    							<span class="help-block">Siya ba ay may ID para sa mga Senior Citizen?/span>\
				    							<div class="row">\
				    								<div class="col-md-1">\
				    									<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q55Radio" name="g_55" class="" id="g_55" value="yes">\
									                     		Yes\
									                    	</label>\
									                  	</div>\
				    								</div>\
				    								<div class="col-md-1">\
				    									<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q55Radio" name="g_55" class="" id="g_55" value="yes">\
									                     		No\
									                    	</label>\
									                  	</div>\
				    								</div>\
				    							</div>\
									    	</div>\
									    	<b>"For children ages 0-5:(ANSWER AS PRESCRIBED BY BARANGAY NUTRITION SCHOLAR)"</b>\
									    	<div class="form-group">\
									    		<label class="control-label" for="inputWarning"> 58. Nutrition Status of Members 0-5 Years Old?</label>\
									    		<span class="help-block">ANTAS NG KALUSUGAN NG BATANG 0-5 TAONG GULANG AYON SA BARANGAY NUTRITION SCHOLAR:?/span>\
		    									<div class="radio">\
							                    	<label>\
							                      		<input type="radio" class="q58Radio" name="g_58" class="" id="g_58" value="1">\
							                     	Above Normal\
							                    	</label>\
							                  	</div>\
		    									<div class="radio">\
							                    	<label>\
							                      		<input type="radio" class="q58Radio" name="g_58" class="" id="g_58" value="2">\
							                     		Normal\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" class="q58Radio" name="g_58" class="" id="g_58" value="3">\
							                     		Moderately Below Normal\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" class="q58Radio" name="g_58" class="" id="g_58" value="4">\
							                     		Severely Below Normal\
							                    	</label>\
							                  	</div>\
									    	</div>\
									  	</div>\
									</div>\
	                            </div>\
	                            <div class="modal-footer">\
	                              	<button type="button" class="btn btn-default btnClose" >Close</button>\
	                              	<button type="button" class="btn btn-info" >Submit</button>\
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
		$('.btnClose').bind('click', function(){
			var status = confirm("Are you sure?");
        	if(status == true){
        		$('.modal_info').modal('hide');
        	}
		});
        /*$(document).on("click",".btnClose",function(){
        	var status = confirm("Are you sure?");
        	if(status == true){
        		$('.modal_info').modal('hide');
        	}
        });*/
		$(document).on("change",".q52Radio",function(){
			if( $(this).is(":checked") ){
				var val = $(this).val();
				$(".forq52y").empty();
				if(val == "1"){
					$(".forq52y").append('<div class="form-group">\
											<label class="control-label" for="inputWarning"> 53. What type of disablity does he/she have?</label>\
			    							<div class="row">\
			    								<div class="col-md-6">\
			    									<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q53Radio" name="g_53" class="" id="g_53" value="yes">\
								                     		Total Blindness\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q53Radio" name="g_53" class="" id="g_53" value="yes">\
								                     		Partial Blindness\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q53Radio" name="g_53" class="" id="g_53" value="yes">\
								                     		Low vision\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q53Radio" name="g_53" class="" id="g_53 value="yes">\
								                     		Total deaf\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q53Radio" name="g_53" class="" id="g_53" value="yes">\
								                     		Partial deaf\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q53Radio" name="g_53" class="" id="g_53" value="yes">\
								                     		Oral defect\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q53Radio" name="g_53" class="" id="g_53" value="yes">\
								                     		One hand\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q53Radio" name="g_53" class="" id="g_53" value="yes">\
								                     		No hands\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q53Radio" name="g_53" class="" id="g_53" value="yes">\
								                     		One leg\
								                    	</label>\
								                  	</div>\
			    								</div>\
			    								<div class="col-md-6">\
			    									<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q53Radio" name="g_53" class="" id="g_53" value="yes">\
								                     		No legs\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q53Radio" name="g_53" class="" id="g_53" value="yes">\
								                     		Mild cerebral palsy\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q53Radio" name="g_53" class="" id="g_53" value="yes">\
								                     		Severe cerebral palsy\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q53Radio" name="g_53" class="" id="g_53" value="yes">\
								                     		Retarded\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q53Radio" name="g_53" class="" id="g_53" value="yes">\
								                     		Mentally III\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q53Radio" name="g_53" class="" id="g_53" value="yes">\
								                     		Mentally retardation\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q53Radio" name="g_53" class="" id="g_53" value="yes">\
								                     		Multiple Impairment\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q53Radio" name="g_53" class="" id="g_53" value="yes">\
								                     		Others:\
								                    	</label>\
								                  	</div>\
								                  	<input type="text" style="width: 200px" class="form-control" id="g_53_b" placeholder="">\
			    								</div>\
			    							</div>\
			    						</div>\
										');
				}
				else{

				}
			}
		});

		$(document).on("change",".q29Radio",function(){
			$(".forq29y").empty();
			$(".forq29n").empty();
			if( $(this).is(":checked") ){
				var val = $(this).val();
				if(val == "1"){
					$(".forq29n").append('<div class="form-group">\
					                			<label class="control-label" for="inputWarning"> 30. Although he/she did not work, did he/she have a job or business during the pastweek?</label>\
				    							<span class="help-block">(Kung hindi naghahanapbuhay, mayroon ba siyang negosyo noon nakaraang linggo?)</span>\
				    							<div class="radio">\
							                    	<label>\
							                      		<input type="radio" class="q30Radio" name="f_30" class="" id="f_30" value="yes">\
							                     		Yes; if yes, please proceed to question 32-39(check below)\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" class="q30Radio" name="f_30" class="" id="f_30" value="no">\
							                     		No; if no please answer the question 40-47:\
							                    	</label>\
							                  	</div>\
							                  	<div class="forq30n"style="padding-left: 20px;">\
						                		</div>\
				    						</div>');
					$(".forq29y").empty();
				}
				else{
					$(".forq29n").empty();
					append_forq29y();

				}
			}
		});
		
		function append_forq29y()
		{
			$(".forq29y").append('<div class="form-group">\
					                			<label class="control-label" for="inputWarning"> 32. What is his/her primary job, occupation or business during the past week?</label>\
				    							<span class="help-block">(Ano ang kaniyang pangunahing hanapbuhay/negosyo noong nakaraang linggo?)</span>\
				    							<input type="text" class="form-control" id="f_32" placeholder="" style="width: 200px">\
				    						</div>\
				    						<div class="form-group">\
				    							<label class="control-label" for="inputWarning"> 33. In what kind of industry did he/she work during the past week?</label>\
				    							<span class="help-block">(In what kind of industry did he/she work during the past week?)</span>\
				    							<input type="text" class="form-control" id="f_33" placeholder="" style="width: 200px">\
				    						</div>\
				    						<div class="form-group">\
					                			<label class="control-label" for="inputWarning"> 34. What is his/her nature of employment?</label>\
				    							<span class="help-block">(Ano ang katayuan o kalagayan niya sa trabaho?)</span>\
				    							<div class="radio">\
							                    	<label>\
							                      		<input type="radio" class="q34Radio" name="f_34" class="" id="" value="1">\
							                     		Permanent\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" class="q34Radio" name="f_34" class="" id="" value="2">\
							                     		Short-term, seasonal, or casual\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" class="q34Radio" name="f_34" class="" id="" value="3">\
							                     		Worked on different jobs on day to day or week to week\
							                    	</label>\
							                  	</div>\
				    						</div>\
				    						<div class="form-group">\
				    							<div class="row">\
				    								<div class="col-md-6">\
				    									<label class="control-label" for="inputWarning"> 35. Normal working hours per day during the past week?</label>\
				    								</div>\
				    								<div class="col-md-4">\
				    									<input type="text" class="form-control" id="f_35" placeholder="" style="width: 60px">\
				    								</div>\
				    							</div>\
				    						</div>\
				    						<div class="form-group">\
				    							<div class="row">\
				    								<div class="col-md-6">\
				    									<label class="control-label" for="inputWarning"> 36. Total number of hours worked during the past week?</label>\
				    								</div>\
				    								<div class="col-md-4">\
				    									<input type="text" class="form-control" id="f_36" placeholder="" style="width: 60px">\
				    								</div>\
				    							</div>\
				    						</div>\
				    						<label class="control-label" for="inputWarning"> 37. Did he/she want more hours of work during the past week?</label>\
			    							<span class="help-block">(Naghahanap ba siya ng karagdagang oras ng trabaho noong nakaraang linggo?)</span>\
			    							<div class="row">\
			    								<div class="col-md-1">\
			    									<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q37Radio" name="f_37" class="" id="f_37" value="1">\
								                     		Yes\
								                    	</label>\
								                  	</div>\
			    								</div>\
			    								<div class="col-md-1">\
			    									<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q37Radio" name="f_37" class="" id="f_37" value="2">\
								                     		No\
								                    	</label>\
								                  	</div>\
			    								</div>\
			    							</div>\
			    							<label class="control-label" for="inputWarning"> 38. Did he/she look for additional work during the past week?</label>\
			    							<span class="help-block">(Naghahanap ba siya ng karagdagang trabaho noong nakaraang linggo?)</span>\
			    							<div class="row">\
			    								<div class="col-md-1">\
			    									<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q38Radio" name="f_38" class="" id="f_38" value="1">\
								                     		Yes\
								                    	</label>\
								                  	</div>\
			    								</div>\
			    								<div class="col-md-1">\
			    									<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q38Radio" name="f_38" class="" id="f_38" value="2">\
								                     		No\
								                    	</label>\
								                  	</div>\
			    								</div>\
			    							</div>\
			    							<label class="control-label" for="inputWarning"> 39. What is his/her class of worker?</label>\
			    							<span class="help-block">(Anong uri siya ng manggagawa?)</span>\
			    							<div class="row">\
			    								<div class="col-md-6">\
			    									<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q39Radio" name="f_39" class="" id="f_39" value="1">\
								                     		Working for private household\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q39Radio" name="f_39" class="" id="f_39" value="2">\
								                     		Working for private business/establishment/farm\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q39Radio" name="f_39" class="" id="f_39" value="3">\
								                     		Working for government/government cooperation\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q39Radio" name="f_39" class="" id="f_39" value="4">\
								                     		Self-employed without paid employee\
								                    	</label>\
								                  	</div>\
			    								</div>\
			    								<div class="col-md-6">\
			    									<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q39Radio" name="f_39" class="" id="f_39" value="5">\
								                     		Employee in own family-operated farm or business\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q39Radio" name="f_39" class="" id="f_39" value="6">\
								                     		Working with pay on own family-operated farm or business\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q39Radio" name="f_39" class="" id="f_39" value="7">\
								                     		Working without pay on own family-operated farm or business\
								                    	</label>\
								                  	</div>\
			    								</div>\
			    							</div>\
				    						');
		}
		$(document).on("change",".q30Radio",function(){
			if( $(this).is(":checked") ){ 
				var val = $(this).val();
				$(".forq30n").empty();
				$(".forq29y").empty();
				if(val == "1"){
					$(".forq29y").empty();
					append_forq29y();
				}
				else{
					$(".forq30n").append('<div class="form-group">\
					                			<label class="control-label" for="inputWarning"> 40. Did he/she look for work or tried to establish business during the past week?</label>\
				    							<span class="help-block">(Naghahanap ba siya ng trabaho o sinubukang mag tayo ng negosyo noong nakaraang linggo?)</span>\
				    							<div class="radio">\
							                    	<label>\
							                      		<input type="radio" class="q40Radio" name="f_40" class="" id="f_40" value="1">\
							                     		Yes; if yes, please answer questions 41-43\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" class="q40Radio" name="f_40" class="" id="f_40" value="2">\
							                     		No; if no please answer questions 44-47:\
							                    	</label>\
							                  	</div>\
							                  	<div class="forq40"style="padding-left: 20px;">\
						                		</div>\
				    						</div>');
				}
			}
		});
		
		$(document).on("change",".q40Radio",function(){
			if( $(this).is(":checked") ){ 
				$(".forq40").empty();
				var val = $(this).val();
				if(val == "1"){
					$(".forq40").append('<div class="form-group">\
											<label class="control-label" for="inputWarning"> 41. Is this the first time for him/her to look for work or establish a business?</label>\
			    							<span class="help-block">(Ito ba ang kaniyang unang beses na naghahanap ng trabaho o sinubukang mag simula ng negosyo?)</span>\
			    							<div class="row">\
			    								<div class="col-md-1">\
			    									<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q41Radio" name="f_41" class="" id="f_41" value="1">\
								                     		Yes\
								                    	</label>\
								                  	</div>\
			    								</div>\
			    								<div class="col-md-1">\
			    									<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q41Radio" name="f_41" class="" id="f_41" value="2">\
								                     		No\
								                    	</label>\
								                  	</div>\
			    								</div>\
			    							</div>\
			    							<label class="control-label" for="inputWarning"> 42. Ways of looking for job/job Searching Methods?</label>\
			    							<span class="help-block">(Paano siya nag hanap ng trabaho?)</span>\
			    							<div class="row">\
			    								<div class="col-md-6">\
			    									<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q42Radio" name="f_42" class="" id="f_42" value="1">\
								                     		Registered in public employment agency\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q42Radio" name="f_42" class="" id="f_42" value="2">\
								                     		Registered in employment agency\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q42Radio" name="f_42" class="" id="f_42" value="3">\
								                     		Approached employee directly\
								                    	</label>\
								                  	</div>\
			    								</div>\
			    								<div class="col-md-6">\
			    									<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q42Radio" name="f_42" class="" id="f_42" value="4">\
								                     		Approached relatives/friends\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q42Radio" name="f_42" class="" id="f_42" value="5">\
								                     		Place or answerd private advertisements\
								                    	</label>\
								                  	</div>\
								                  	<div class="radio">\
								                    	<label>\
								                      		<input type="radio" class="q42Radio" name="f_42" class="" id="f_42" value="6">\
								                     		Others(pls. Specify)\
								                    	</label>\
								                  	</div>\
								                  	<input style="width: 200px" type="text" class="form-control" id="hh_no" placeholder="">\
			    								</div>\
			    							</div>\
										</div>\
										<div class="form-group">\
			    							<div class="row">\
						                		<div class="col-md-7">\
						                			<label class="control-label" for="inputWarning"> (43.) How may weeks has he/she been looking for works?</label>\
						                			<span class="help-block">(Ilang linggo na siyang naghahanap ng trabaho?)</span>\
						                		</div>\
						                		<div class="col-md-3">\
						                			<input type="text" style="width: 60px" class="form-control"  placeholder="">\
						                		</div>\
						                	</div>\
						                </div>\
										');
				}
				else{
					$(".forq40").append('<div class="form-group">\
					                			<label class="control-label" for="inputWarning"> 44. Why did he/she not look for work?</label>\
				    							<span class="help-block">(Bakit hindi siya nag hahanap ng trabaho?)</span>\
				    							<div class="row">\
				    								<div class="col-md-6">\
				    									<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q44Radio" name="r44" class="" id="" value="yes">\
									                     		Tired/Believes no is available\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q44Radio" name="r44" class="" id="" value="no">\
									                     		Awaiting results of job application\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q44Radio" name="r44" class="" id="" value="no">\
									                     		Bad Weather\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q44Radio" name="r44" class="" id="" value="no">\
									                     		Too young/old or retired/with disablity\
									                    	</label>\
									                  	</div>\
				    								</div>\
				    								<div class="col-md-6">\
				    									<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q44Radio" name="r44" class="" id="" value="yes">\
									                     		Waiting for rehire/job recall\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q44Radio" name="r44" class="" id="" value="no">\
									                     		Temporary illness/disablity\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q44Radio" name="r44" class="" id="" value="no">\
									                     		Household, family duties\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q44Radio" name="r44" class="" id="" value="no">\
									                     		Schooling\
									                    	</label>\
									                  	</div>\
				    								</div>\
				    								<div class="radio col-sm-4">\
								                    	<label>\
								                      		<input type="radio" class="q44Radio" name="r44" class="" id="" value="no">\
								                     		Others(pls. specify)\
								                    	</label>\
								                  	</div>\
								                  	<div class="col-sm-8">\
								                    	<input type="text" class="form-control" id="hh_no" placeholder="">\
								                  	</div>\
				    							</div>\
				    							<label class="control-label" for="inputWarning"> 45. When was the last time he/she looked for work?</label>\
				    							<span class="help-block">(Kailan siya huling naghanap ng trabaho?)</span>\
				    							<div class="row">\
				    								<div class="col-md-6">\
				    									<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q45Radio" name="r45" class="" id="" value="yes">\
									                     		With in the past 1 month\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q45Radio" name="r45" class="" id="" value="no">\
									                     		More than 6 months\
									                    	</label>\
									                  	</div>\
				    								</div>\
				    								<div class="col-md-6">\
				    									<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q45Radio" name="r45" class="" id="" value="yes">\
									                     		1 to 6 months\
									                    	</label>\
									                  	</div>\
									                  	<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q45Radio" name="r45" class="" id="" value="no">\
									                     		Never(hindi kailanman)\
									                    	</label>\
									                  	</div>\
				    								</div>\
				    							</div>\
				    							<label class="control-label" for="inputWarning"> 46. If opportunity for work existed udring past week, would he/she have been available?</label>\
				    							<span class="help-block">(Kung nag karoon ng pag kakataong magkatrabaho ay available ba siya noongnakaraang linggo?)</span>\
				    							<div class="row">\
				    								<div class="col-md-1">\
				    									<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q46Radio" name="r46" class="" id="" value="yes">\
									                     		Yes\
									                    	</label>\
									                  	</div>\
				    								</div>\
				    								<div class="col-md-1">\
				    									<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q46Radio" name="r46" class="" id="" value="no">\
									                     		No\
									                    	</label>\
									                  	</div>\
				    								</div>\
				    							</div>\
				    							<label class="control-label" for="inputWarning"> 47. Is she/he willing to take up work during the past week or within the next 2 weeks?</label>\
				    							<span class="help-block">(Willing o payag ba siya na mag karoon ng trabaho noong nakaraang linggo sa susunod na dalawang linggo?)</span>\
				    							<div class="row">\
				    								<div class="col-md-1">\
				    									<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q47Radio" name="r47" class="" id="" value="yes">\
									                     		Yes\
									                    	</label>\
									                  	</div>\
				    								</div>\
				    								<div class="col-md-1">\
				    									<div class="radio">\
									                    	<label>\
									                      		<input type="radio" class="q47Radio" name="r47" class="" id="" value="no">\
									                     		No\
									                    	</label>\
									                  	</div>\
				    								</div>\
				    							</div>\
				    						</div>');
				}
			}
		});

		$(document).on("change",".q21Radio",function(){
		    if( $(this).is(":checked") ){ // check if the radio is checked
            	var val = $(this).val(); // retrieve the value
            	$(".forq21yn").fadeOut("fast", function() {
			        $(this).remove();
			    });
            	if(val == "1"){
            		$(".forq21").append('<div class="forq21yn">\
	            							<label class="control-label" for="inputWarning"> 22. What grade/year he/she currently attending? (Pls. specify)</label>\
					                		<input type="text" class="form-control" id="hh_no" placeholder="Example grade 6">\
					                		<label class="control-label" for="inputWarning"> 23.Where does he/she attend school?</label>\
					    					<div class="form-group">\
						                    	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="r22" id="optionsRadios1" value="option1">\
							                     		Public(School name)\
							                    	</label>\
							                  	</div>\
							                  	<input type="text" class="form-control" id="hh_no" placeholder="name of school">\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="r22" id="optionsRadios1" value="option1">\
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
							                      		<input type="radio" name="r24" id="optionsRadios1" value="option1">\
							                     		Malayo ang paaralan\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="r24" id="optionsRadios1" value="option1">\
							                     		Walang paaralan sa barangay\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="r24" id="optionsRadios1" value="option1">\
							                     		walang regular na transportatyon\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="r24" id="optionsRadios1" value="option1">\
							                     		Mahal ang pagaaral\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="r24" id="optionsRadios1" value="option1">\
							                     		Pagkakasakit/kapansanan\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="r24" id="optionsRadios1" value="option1">\
							                     		Dahil sa gawaing bahay\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="r24" id="optionsRadios1" value="option1">\
							                     		Pagpapakasal\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="r24" id="optionsRadios1" value="option1">\
							                     		Hanapbuhay/naghahanap ngtrabaho\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="r24" id="optionsRadios1" value="option1">\
							                     		Walang interes mag aral\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="r24" id="optionsRadios1" value="option1">\
							                     		Hindi makapag adjust sa pag aaral\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="r24" id="optionsRadios1" value="option1">\
							                     		May problema saschool record\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="r24" id="optionsRadios1" value="option1">\
							                     		Tapos ng mag aral\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="r24" id="optionsRadios1" value="option1">\
							                     		Problema sa birth certificate\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="r24" id="optionsRadios1" value="option1">\
							                     		Masyado pang bata para mag aral\
							                    	</label>\
							                  	</div>\
							                  	<div class="radio">\
							                    	<label>\
							                      		<input type="radio" name="r24" id="optionsRadios1" value="option1">\
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

