<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Muntinlupa | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{env('FILE_PATH_CUSTOM')}}bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{env('FILE_PATH_CUSTOM')}}dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{env('FILE_PATH_CUSTOM')}}plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="{{URL::Route('index')}}"><b><img width="200" height="200" src="{{env('FILE_PATH_CUSTOM')}}img/logo1.png"></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form onSubmit="return regUser();" id="regForm">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Firstname" id="fname" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Lastname" id="lname" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" id="regusername" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" id="regemail" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="regPassword" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password" id="re-password" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" id="btnSubmit">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="{{URL::Route('getLogin')}}" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<div class="modal  fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Failed to Log in!</h4>
      </div>
      <div class="modal-body">
        <p id="mdl_msg"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<!-- jQuery 2.2.0 -->
<script src="{{env('FILE_PATH_CUSTOM')}}plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{env('FILE_PATH_CUSTOM')}}bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="{{env('FILE_PATH_CUSTOM')}}plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });

  $("#regForm").submit(function(e) {
      e.preventDefault();
  });

  function validateEmail(email)
  { 
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
  }

  function regUser()
  {
    $_token = "{{ csrf_token() }}";
    $username = $("#regusername").val();
    $email = $("#regemail").val();
    $password = $("#regPassword").val();
    $repassword = $("#re-password").val();
    $fname = $("#fname").val();
    $lname = $("#lname").val();
    $("#myModal").removeClass("modal-danger");
    $("#myModal").removeClass("modal-success");
      if($password == $repassword)
      {
        

        $("#btnSubmit").empty();
        $("#btnSubmit").append('<div class="overlay tbl-overlay"><i class="fa fa-spinner fa-spin"></i></div>');
        $('#btnSubmit').prop('disabled', true);

        $.post('{{URL::Route('postCreate')}}', { _token: $_token, email: $email , username: $username, password: $password, fname: $fname, lname: $lname}, function(data)
        {
            $("#btnSubmit").empty();
            $("#btnSubmit").append("Register");
            $('#btnSubmit').prop('disabled', false);
            if(data.status == "success")
            {
              $("#myModal").addClass("modal-success");
              $('#mdl_msg').text(data.message);
              $('#myModal').modal('show');
              $("input, textarea").val("");
            }
            else
            {
              $("#myModal").addClass("modal-danger");
              $('#mdl_msg').text(data.message);
              $('#myModal').modal('show');
            }
            //console.log(data);
        });
      }
      else
      {
        
        $("#myModal").addClass("modal-danger");
        $('#mdl_msg').text("Password does not match.");
        $('#myModal').modal('show');

        //alert("pass");
        /*$('.has-error').empty();
            $('.has-error').append($('<label />' , {'class' :  'control-label' , 'html' : '<i class="fa fa-times-circle-o"></i>Password does not match.'}));*/
      }
  }
</script>
</body>
</html>
