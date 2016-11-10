<!-- Small boxes (Stat box) -->
      <div class="row" id="statsbox_brgy">
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <script type="text/javascript">
        function countstatsbox()
        {
          $.get('{{URL::Route('statsbox')}}', function(data)
          {
            if(data.length != 0)
            {
              $('#statsbox_brgy').empty();
              for (var i = 0; i < data.length; i++) 
              {
                $('#statsbox_brgy').append(
                    $('<div />', {'class': 'col-lg-3 col-xs-6' }).append(
                        $('<div />', {'class': 'small-box bg-aqua' }).append(
                             $('<div />', {'class': 'inner' }).append(
                               $('<h3 />', {'id': 'nu' , 'text' : data[i]['total_population']}),
                                $('<p />', {'text': 'Total population for Brgy. '+data[i]['brgy_name'] })
                              ),
                              $('<div />', {'class': 'icon' }).append(
                                $('<i />', {'class': 'ion ion-android-locate' })
                              ),
                              $('<a  />', {'class': 'small-box-footer' , 'html': 'Summary statistic <i class="fa fa-arrow-circle-right"></i>' , 'href' : data[i]['link'] })
                             )));
              }
            }
            else
            {
              promptMsg('fail',"No records yet.")
            }
          });
        }
        countstatsbox();
    </script>