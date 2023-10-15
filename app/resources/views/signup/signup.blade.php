<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4" id="login">
     <h1 class="logo-name"><img src="/static/images/logo/team_tasks_logo.png" alt="laravel kickstart logo" width="400"></h1><br><br>
     <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Sign Up</h3>
      </div>
      <div class="panel-body">
        <form accept-charset="UTF-8" role="form" action="signup/save" method="post">
          @csrf
          <fieldset>
            <div class="form-group">
              <input class="form-control" type="text" name="firstName" placeholder="Enter your first name" required>
            </div>
            <br>
            <div class="form-group">
              <input class="form-control" type="text" name="lastName" placeholder="Enter your last name" required>
            </div>
            <br>
            <div class="form-group">
              <input class="form-control" type="email" name="adminEmail" placeholder="Enter your email address" required>
            </div>
            <br>
            <div class="form-group">
              <input class="form-control" type="text" name="orgName" placeholder="Enter the name of your organization" required>
            </div>
            <br>
            <input class="btn btn-lg btn-success btn-block" type="submit" value="Signup">
          </fieldset>
        </form>
        <hr>
      </div>
    </div>
    <p>If you aready have an account, please <a href="/login">Sign In</a> here.</p>
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
  </div>
</div>
</div>
<script src="static/assets/js/app/login.js"></script>
