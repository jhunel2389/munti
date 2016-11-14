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
      <!-- AREA CHART -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title" style="text-align: center;">Population Chart</h3>
          <div class="form-group has-feedback  col-md-2">
            <label>Select Year:</label>
              <select class="form-control" id="optYear">
                @for($a = 2015 ; $a <= date("Y") ;$a++)
                <option value="{{$a}}" {{(date("Y") == $a) ? 'selected' : ''}}>{{$a}}</option>
                @endfor
            </select>
          </div>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="chart">
            <canvas id="areaChart" style="height:250px"></canvas>
          </div>
          <div class="overlay">
            <div class="progress progress-striped active">
              <div class="progress-bar" role="progressbar"
              aria-valuemin="0" aria-valuemax="0" style="width:0%">
               <span>0%</span>
              </div>
            </div>
          </div>
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
    $( "#optYear" ).change(function() {
       loadChart();
    });
    loadChart();
    function loadChart(){
    $.ajax({
        xhr: function() {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function(evt) {
                
                if (evt.lengthComputable) {
                    //var percentComplete = evt.loaded / evt.total;
                    var percentComplete = Math.round(evt.loaded * 100 / evt.total);
                    console.log(percentComplete );
                    //Do something with upload progress here
                    $(".overlay").find('.progress-bar').css("width",percentComplete+"%");
                    $(".overlay").find('span').html(percentComplete+"% please wait ...");
                }
           }, false);

           xhr.addEventListener("progress", function(evt) {

               if (evt.lengthComputable) {
                   var percentComplete = Math.round(evt.loaded * 100 / evt.total);
                   //Do something with download progress
                    $(".overlay").find('.progress-bar').css("width",percentComplete+"%");
                    $(".overlay").find('span').html(percentComplete+"% please wait ...");
               }
           }, false);

           return xhr;
        },
        type: 'get',
        url: '{{URL::Route('chartStatS')}}',
        data: {
            "_token": "{{ csrf_token() }}",
            "year": $("#optYear").val(),
        },

        beforeSend: function () {
           // $('#loading').show();
        },

        complete: function () {
            //$(".modal_progress").hide();
            $(".overlay").remove();
        },

        success: function (response) {
            //$("#data").html("data receieved");
            /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas);

    var areaChartData = {
      labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
      datasets: [
        {
          label: "Digital Goods",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: response,
        }
      ]
    };

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions);
        }
    });
    //get 
  };
</script>
@endsection

