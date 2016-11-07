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
        <form onSubmit="return regHouseHold();" id="regForm">
          <div class="box-body">
          	<div class="row">
          		<div class="col-lg-5">
          			<div class="panel panel-default">
          				<div class="panel-heading">I. Location</div>
					  	<div class="panel-body">
						    <div class="input-group">
							  	<span class="input-group-addon" id="sizing-addon2">a.1. Region ( Rehiyon )</span>
							  	<input type="text" class="form-control" placeholder="Region(Rehiyon)" aria-describedby="sizing-addon2" id="region" required>
							</div>
							<div class="input-group">
							  	<span class="input-group-addon" id="sizing-addon2">a.2. Province ( Lalawigan )</span>
							  	<input type="text" class="form-control" placeholder="Province ( Lalawigan )" aria-describedby="sizing-addon2" id="province" required>
							</div>
							<div class="input-group">
							  	<span class="input-group-addon" id="sizing-addon2">b. City ( Bayan/Lungsod )</span>
							  	<input type="text" class="form-control" placeholder="City ( Bayan/Lungsod )" aria-describedby="sizing-addon2" id="city" required>
							</div>
							<div class="input-group">
							  	<span class="input-group-addon" id="sizing-addon2">c. Barangay</span>
							  	<input type="text" class="form-control" placeholder="Barangay" aria-describedby="sizing-addon2" id="region" required>
							</div>
					  	</div>
					</div>
				</div>
				<div class="col-lg-7">
          			<div class="panel panel-default">
					  	<div class="panel-body">
						    <div class="input-group">
							  	<span class="input-group-addon" id="sizing-addon2">II.  Household Identification Number ( Numero  )</span>
							  	<input type="text" class="form-control" placeholder="Household Identification Number ( Numero  )" aria-describedby="sizing-addon2" id="household_id_no" required>
							</div>
							<div class="input-group">
							  	<span class="input-group-addon" id="sizing-addon2">III. Name of respondent ( Pangelan ng nakapanayam )</span>
							  	<input type="text" class="form-control" placeholder="Name of respondent ( Pangelan ng nakapanayam )" aria-describedby="sizing-addon2" id="name_of_respondent"required>
							</div>
							<div class="bootstrap-timepicker">
								<div class="input-group date">
				                  	<span class="input-group-addon" id="sizing-addon2">IV. Date ( Petsa ng panayam )</span>
				                  	<input type="text" class="form-control pull-right" id="datepicker" required>
				                </div>
				            </div>
				            <div class="bootstrap-timepicker">
			                  <div class="input-group">
			                  	<div class="input-group-addon">
			                      V. Time started ( Oras ng panayam )
			                    </div>
			                    <input type="text" class="form-control timepicker" id="time_started" required>
			                  </div>
              				</div>
							<div class="input-group">
							  	<span class="input-group-addon" id="sizing-addon2">VI. Interviewer ( Tagapanayam )</span>
							  	<input type="text" class="form-control" placeholder="Interviewer ( Tagapanayam )" aria-describedby="sizing-addon2" id="interviewer_enumerator" required>
							</div>
							
					  	</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
          			<div class="panel panel-default">
          				<div class="panel-heading">A. Dwelling</div>
					  	<div class="panel-body">
						    <div class="form-group">
						    	<label class="control-label" for="inputWarning"> 1. In what type of building does the household reside?</label>
						    	<span class="help-block">Ano ang uri ng tirahan ng sambahayan?</span>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="opt1_a" id="opt1_a" value="1" checked>
				                      Single house
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="opt1_a" id="opt1_a" value="2">
				                      Duplex
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="opt1_a" id="opt1_a" value="3">
				                      Multi-unit residential(three units or more)
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="opt1_a" id="opt1_a" value="4">
				                      Commercial/industrial/agricultural building
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="opt1_a" id="opt1_a" value="5">
				                      Others(boat, cave, etc.)
				                    </label>
				                </div>
				            </div>
				            <div class="form-group">
						    	<label class="control-label" for="inputWarning"> 2. How many bedrooms does this housing unit have?</label>
						    	<span class="help-block">Ilang silid/kwarto mayroon ang tirahan ng sambahayan?</span>
						         <input type="text" class="form-control input_num" maxlength="2"  placeholder="" style="width: 60px" required>
				            </div>
				            <div class="form-group">
						    	<label class="control-label" for="inputWarning"> 3. What type of construction materials are the roofs made of?</label>
						    	<span class="help-block">Anong uri ng materyales ang ginamit sa paggawa ng bubong ng tirahan?</span>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="opt3_a" id="opt3_a" value="1" checked>
				                      Strong materials(concrete, brick, stone, wood, galvanized iron)
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="opt3_a" id="opt3_a" value="2">
				                      Ligh materials( bamboo, sawali, cogon, nipa)
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="opt3_a" id="opt3_a" value="3">
				                      Salvaged/makeshift materials
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="opt3_a" id="opt3_a" value="4">
				                      Mixed but predominantly strong materials
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="opt3_a" id="opt3_a" value="5">
				                      Mixed but predominantly light materials
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="opt3_a" id="opt3_a" value="6">
				                      Mixed but predominantly salvaged materials
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="opt3_a" id="opt3_a" value="7">
				                      Not applicable
				                    </label>
				                </div>
				            </div>
				            <div class="form-group">
						    	<label class="control-label" for="inputWarning"> 4. What type of construction materials are the walls made of?</label>
						    	<span class="help-block">Anong uri ng materyales ang ginamit sa paggawa ng dingding ng tirahan?</span>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="opt4_a" id="opt4_a" value="1" checked>
				                      Strong materials(concrete, brick, stone, wood, galvanized iron)
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="opt4_a" id="opt4_a" value="2">
				                      Ligh materials( bamboo, sawali, cogon, nipa)
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="opt4_a" id="opt4_a" value="3">
				                      Salvaged/makeshift materials
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="opt4_a" id="opt4_a" value="4">
				                      Mixed but predominantly strong materials
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="opt4_a" id="opt4_a" value="5">
				                      Mixed but predominantly light materials
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="opt4_a" id="opt4_a" value="6">
				                      Mixed but predominantly salvaged materials
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="opt4_a" id="opt4_a" value="7">
				                      Not applicable
				                    </label>
				                </div>
				            </div>
					  	</div>
					</div>
					
				</div>
				<div class="col-lg-6">
					<div class="panel panel-default">
          				<div class="panel-heading">B. Household Characteristics</div>
					  	<div class="panel-body">
							<div class="form-group">
						    	<label class="control-label" for="inputWarning"> 5. How many members of the households are OFWs?</label>
						    	<span class="help-block">Ilang miyembro dito sa inyong sambahayan ang OFW?</span>
						         <input type="text" class="form-control input_num" maxlength="2"  placeholder="" style="width: 60px" required>
				            </div>
				            <div class="form-group">
						    	<label class="control-label" for="inputWarning"> 6. How many families are there in the household?</label>
						    	<span class="help-block">Ilang pamilya ang nasa sambahayan?</span>
						         <input type="text" class="form-control input_num" maxlength="2"  placeholder="" style="width: 60px" required>
				            </div>
				            <div class="form-group">
				            	<label class="control-label" for="inputWarning"> 7. Are there members of the household who are pregnant?</label>
						    	<span class="help-block">Mayroon bang miyembro sa sambahayan na buntis?</span>
				                <div class="checkbox">
				                    <label>
				                      <input type="checkbox" class="q7">
				                      Yes
				                    </label>
				                </div>
								<div class="checkbox">
									<label>
									  <input type="checkbox" class="q7" checked>
									  No
									</label>
								</div>
			                </div>
			                <div class="form-group">
				            	<label class="control-label" for="inputWarning"> 8. Are there members of the household who are solo parents?</label>
						    	<span class="help-block">Mayroon bang miyembro sa sambahayan na nag iisang magulang?</span>
				                <div class="checkbox">
				                    <label>
				                      <input type="checkbox" class="q8">
				                      Ye
				                    </label>
				                </div>
								<div class="checkbox">
									<label>
									  <input type="checkbox" class="q8" checked>
									  No
									</label>
								</div>
			                </div>
			                <div class="form-group">
				            	<label class="control-label" for="inputWarning"> 9. Are there members of the household who are disabled?</label>
						    	<span class="help-block">Mayroon bang miyembro sa sambahayan na may kapansanan?</span>
				                <div class="checkbox">
				                    <label>
				                      <input type="checkbox" class="q9">
				                      Yes
				                    </label>
				                </div>
								<div class="checkbox">
									<label>
									  <input type="checkbox" class="q9" checked>
									  No
									</label>
								</div>
			                </div>
					  	</div>
					</div>
          			<div class="panel panel-default">
          				<div class="panel-heading">C. Demography</div>
					  	<div class="panel-body">
						    <div class="form-group">
						    	<label class="control-label" for="inputWarning"> 10. How many members are there in the household including OFWs?</label>
						    	<span class="help-block">Ilang miyembro mayroon dito sa inyong sambahayankabilang ang OFW?</span>
						         <input type="text" class="form-control input_num" maxlength="2"  placeholder="" style="width: 60px" id="c_10" required >
				            </div>
					  	</div>
					</div>
				</div>
			</div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary" id="btnSubmit">Submit</button>
          </div>
        </form>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
  @include('includes.footer')
  @include('includes.settingSidebar')
</div>
<script type="text/javascript">
$(function () {
    $('#datepicker').datepicker({
      autoclose: true
    });
    $(".timepicker").timepicker({
      showInputs: false
    });
});
$(".q7").change(function()
{
  $(".q7").prop('checked',false);
  $(this).prop('checked',true);
});
$(".q8").change(function()
{
  $(".q8").prop('checked',false);
  $(this).prop('checked',true);
});
$(".q9").change(function()
{
  $(".q9").prop('checked',false);
  $(this).prop('checked',true);
});

$("#regForm").submit(function(e) {
  e.preventDefault();
});
$(".input_num").keydown(function (event) {
    
    //prevent using shift with numbers
    if (event.shiftKey == true) {
        event.preventDefault();
    }

    if (!((event.keyCode == 190) || (event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46)) {
        event.preventDefault();

    }
});


function regHouseHold()
{
	$_token = "{{ csrf_token() }}";
	$username = $("#regusername").val();
	$email = $("#regemail").val();
	$password = $("#regPassword").val();
	$repassword = $("#re-password").val();
	$fname = $("#fname").val();
	$lname = $("#lname").val();

    $("#btnSubmit").empty();
    $("#btnSubmit").append('<div class="overlay tbl-overlay"><i class="fa fa-spinner fa-spin"></i></div>');
    $('#btnSubmit').prop('disabled', true);

    /*$.post('{{URL::Route('postCreate')}}', { _token: $_token, email: $email , username: $username, password: $password, fname: $fname, lname: $lname}, function(data)
    {
        $("#btnSubmit").empty();
        $("#btnSubmit").append("Submit");
        $('#btnSubmit').prop('disabled', false);
        if(data.status == "success")
        {
          promptMsg(data.status,data.message);
        }
        else
        {
          promptMsg(data.status,data.message);
        }
    });*/
}
</script>
@endsection

