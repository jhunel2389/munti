<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
   @if(Auth::User())
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <span class="hidden-xs">{{$userInfo['fname']}} {{$userInfo['lname']}}</span>
  </a>
 
  <ul class="dropdown-menu">
    <!-- User image -->
    
    <li class="user-header">
      <p>
        {{$userInfo['fname']}} {{$userInfo['lname']}}
        <small>Member since {{date("M Y", strtotime($userInfo['dm']))}}</small>
      </p>
    </li>
    <!-- Menu Body -->
    <!--<li class="user-body">
      <div class="row">
        <div class="col-xs-4 text-center">
          <a href="#">batang ex</a>
        </div>
        <div class="col-xs-4 text-center">
          <a href="#">Sales</a>
        </div>
        <div class="col-xs-4 text-center">
          <a href="#">Friends</a>
        </div>
      </div>
      <!-- /.row
    </li>-->
    <!-- Menu Footer-->
    <li class="user-footer">
      <!--<div class="pull-left">
        <a href="#" class="btn btn-default btn-flat">Profile</a>
      </div>-->
      <div class="pull-left">
        <a href="{{ URL::Route('getLogout') }}" class="btn btn-default btn-flat">Sign out</a>
      </div>
    </li>
  </ul>
  @else
    <a href="{{ URL::Route('getLogin') }}">Log in</a>
  @endif
</li>