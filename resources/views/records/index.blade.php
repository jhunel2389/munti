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
        File Maintenance
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ URL::Route('getUAL') }}"><i class="fa fa-dashboard"></i> File Maintenance</a></li>
        <li class="active">Barangay</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div id="div-entry" class="box box-success"></div>

		<!-- user admin list -->
		<div class="box box-primary">
            <div class="box-header">
            	<h3 class="box-title">Barangay</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dtUAList" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>System ID</th>
                  <th>Household Identification</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <div class="overlay tbl-overlay">
	        	<i class="fa fa-spinner fa-spin"></i>
	        </div>
            <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('includes.footer')
  @include('includes.settingSidebar')
</div>
<script type="text/javascript">
	defaultDisplay();
	householdList();
	function householdList()
	{
		$.get('{{URL::Route('householdList')}}', function(data)
		{
			$('.tbl-overlay').remove();
			if(data.length != 0)
			{
				//$('#tbUAList').empty();
				$('#dtUAList').DataTable().clear();
				for (var i = 0; i < data.length; i++) 
				{

					/*$('#tbUAList').append('<tr style="cursor:pointer">\
							                  <td>'+data[i].id+'</td>\
							                  <td>'+data[i].name+'</td>\
							                </tr>');*/
					$('#dtUAList').DataTable().row.add([''+data[i].id+'', 
                                                  ''+data[i].household_id_no+'',
                                                  ]).draw();
				}
				var table = $("#dtUAList").DataTable();
				$('#dtUAList tbody').on('click', 'tr', function () {
			        var data = table.row( this ).data();
			        householdInfo(data[0]);
			    } );
			}
			else
			{
				$("#dtUAList").DataTable();
				promptMsg('fail',"No records yet.")
			}

		});
	}

	function householdInfo(cid)
	{
		$.get('{{URL::Route('houdeholdUrlGenerator')}}', { cid: cid}, function(data)
    	{
			window.location.replace(data);
		});
	}

	function setNewEntry()
	{
		window.location.replace('{{URL::Route('getRecord','add')}}');
	}
	function defaultDisplay()
	{
	   	$('#div-entry').append('<div class="overlay">\
			        	<i class="fa fa-spinner fa-spin"></i>\
			        </div>');
	   	$('#div-entry').empty();
		$('#div-entry').append(
				$('<div />' , { 'class' : 'box-header with-border'}).append(
					$('<h3 />' , { 'class' : 'box-title' , 'text' : 'Users'}),
					$('<div />' , { 'class' : 'box-tools pull-right'}).append(
						'<button id="btn-new-user" class="btn btn-primary btn-sm" type="button" onClick="setNewEntry();">\
							<i class="fa fa-plus-circle"></i>\
							New\
						</button>\
						<button class="btn btn-box-tool" data-widget="collapse">\
							<i class="fa fa-minus"></i>\
						</button>')),
				$('<div />' , { 'class' : 'box-body' , 'style' : 'min-height:100px'}).append(
					$('<div />' , { 'class' : 'row' }).append(
						$('<div />' , {'class' : 'col-md-12 col-lg-12'}).append(
							$('<h1 />' , { 'class': 'text-center'}).append(
								$('<small />').append(
									$('<button />' , { 'id':'btn-new-user-icn' , 'class':'btn btn-app' , 'data-placement':'top' , 'data-toggle':'tooltip' , 'type':'button' , 'onClick':'setNewEntry();' , 'html' : '<i class="fa fa-plus-circle fa-3x"></i>Add Ne Household Entry'}).append(
										''),
									$('<br />'),
									'Click on the below list for preview'))))),
				$('<div />' , { 'class' : 'box-footer'}));
	}

</script>
@endsection

