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
							<div class="bootstrap-timepicker">
								<div class="input-group date">
				                  	<span class="input-group-addon" id="sizing-addon2">IV. Date ( Petsa ng panayam )</span>
				                  	<input type="text" class="form-control pull-right" id="datepicker">
				                </div>
				            </div>
				            <div class="bootstrap-timepicker">
			                  <div class="input-group">
			                  	<div class="input-group-addon">
			                      V. Time started ( Oras ng panayam )
			                    </div>
			                    <input type="text" class="form-control timepicker">
			                  </div>
              				</div>
							<div class="input-group">
							  	<span class="input-group-addon" id="sizing-addon2">VI. Interviewer ( Tagapanayam )</span>
							  	<input type="text" class="form-control" placeholder="Interviewer ( Tagapanayam )" aria-describedby="sizing-addon2">
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
				                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
				                      Single house
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
				                      Duplex
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
				                      Multi-unit residential(three units or more)
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
				                      Commercial/industrial/agricultural building
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
				                      Others(boat, cave, etc.)
				                    </label>
				                </div>
				            </div>
				            <div class="form-group">
						    	<label class="control-label" for="inputWarning"> 2. How many bedrooms does this housing unit have?</label>
						    	<span class="help-block">Ilang silid/kwarto mayroon ang tirahan ng sambahayan?</span>
						         <input type="text" class="form-control"  placeholder="" style="width: 60px">
				            </div>
				            <div class="form-group">
						    	<label class="control-label" for="inputWarning"> 3. What type of construction materials are the roofs made of?</label>
						    	<span class="help-block">Anong uri ng materyales ang ginamit sa paggawa ng bubong ng tirahan?</span>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
				                      Strong materials(concrete, brick, stone, wood, galvanized iron)
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
				                      Ligh materials( bamboo, sawali, cogon, nipa)
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
				                      Salvaged/makeshift materials
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
				                      Mixed but predominantly strong materials
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
				                      Mixed but predominantly light materials
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
				                      Mixed but predominantly salvaged materials
				                    </label>
				                </div>
				                <div class="radio">
				                    <label>
				                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
				                      Not applicable
				                    </label>
				                </div>
				            </div>
					  	</div>
					</div>
					<div class="panel panel-default">
          				<div class="panel-heading">B. Household Characteristics</div>
					  	<div class="panel-body">
						    
					  	</div>
					</div>
				</div>
				<div class="col-lg-6">
          			<div class="panel panel-default">
          				<div class="panel-heading">C. Demography</div>
					  	<div class="panel-body">
						    
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
<script type="text/javascript">
$(function () {
    $('#datepicker').datepicker({
      autoclose: true
    });
    $(".timepicker").timepicker({
      showInputs: false
    });
});
</script>
@endsection

