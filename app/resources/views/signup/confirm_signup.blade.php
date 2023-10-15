<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4" id="login">
     <h1 class="logo-name"><img src="/static/images/logo/team_tasks_logo.png" alt="laravel kickstart logo" width="400"></h1><br><br>
     <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Confirm Registeration</h3>
      </div>
      <div class="panel-body">
        <form accept-charset="UTF-8" role="form" action="/signup/confirm/save" method="post">
          @csrf
          <fieldset>
            <input type="" name="confirmCode" value="{{$confirm_code}}" hidden>
            <div class="form-group">
              <input class="form-control" type="text" name="userfirstName" value="{{$company_details->user_fname}}" readonly>
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="userlastName" placeholder="Last name" value="{{$company_details->user_lname}}" readonly>
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="userOrgName" placeholder="Organisation" value="{{$company_details->user_comp}}" readonly>
            </div>
            <div class="form-group">
              <input class="form-control"type="email" name="userEmail" placeholder="Email" value="{{$company_details->user_email}}" readonly>
            </div>
            <div class="form-group">
              <input class="form-control" type="password" name="userPassword" placeholder="Enter password (min 8 characters">
            </div>
            <div class="form-group">
              <input class="form-control" type="password" name="confirmUserPassword" placeholder="Enter password (min 8 characters">
            </div>
            <input type="submit" class="btn btn-lg btn-primary btn-block" name="signup" value="Signup">
          </fieldset>
        </form>
        <br>
        <br>
        @if(session()->has('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}
        </div>
        <br><br>
        @elseif(session()->has('error'))
        <div class="alert alert-danger">
          {{ session()->get('error') }}
        </div>
        <br><br>
        @endif
        <hr>
      </div>
    </div>
  </div>
</div>
</div>
