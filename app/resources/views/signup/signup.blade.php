<div class="container">
    <div class="row">
    <div class="col-md-4 col-md-offset-4" id="login">
     <h1 class="logo-name"><img src="/static/images/logo/team_tasks_logo.png" alt="laravel kickstart logo" width="400"></h1><br><br>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Sign Up</h3>
        </div>
          <div class="panel-body">
            <!-- <form accept-charset="UTF-8" role="form" action="login/auth" method="post"> -->
                    <fieldset>
                <div class="form-group">
                  <input class="form-control" type="email" placeholder="Enter your username" v-model="userName" required>
              </div>
              <div class="form-group">
                <input class="form-control" type="password" placeholder="Enter your password" v-model="userPwd" required>
              </div>
              <!-- <div class="checkbox">
                  <label>
                    <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                  </label>
                </div> -->
              <!-- <input class="btn btn-lg btn-success btn-block" type="submit" value="Login"> -->
              <button class="btn btn-lg btn-success btn-block" id="login-btn" @click="loginUser">Signup</button>
            </fieldset>
              <!-- </form> -->
              <hr>

          </div>
      </div>
      <p>If you aready have an account, please <a href="/login">Login In</a> here.</p>
    </div>
  </div>
</div>
<script src="static/assets/js/app/login.js"></script>
