    <div class="container">
    <div class="row">
    <div class="col-md-4 col-md-offset-4" id="login">
     <h1 class="logo-name"><img src="/static/images/logo/team_tasks_logo.png" alt="laravel kickstart logo" width="400"></h1><br><br>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Sign in</h3>
        </div>
          <div class="panel-body">
            <form accept-charset="UTF-8" role="form" action="/login/validate" method="post">
              @csrf
                    <fieldset>
                <div class="form-group">
                  <input class="form-control" type="email" name="userEmail" placeholder="Enter your email address/username" v-model="userName" required>
              </div>
              <div class="form-group">
                <input class="form-control" type="password" name="userPassword" placeholder="Enter your password" v-model="userPwd" required>
              </div>
              <!-- <div class="checkbox">
                  <label>
                    <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                  </label>
                </div> -->
              <!-- <input class="btn btn-lg btn-success btn-block" type="submit" value="Login"> -->
              <button class="btn btn-lg btn-success btn-block" id="login-btn" @click="loginUser">Login</button>
            </fieldset>
              </form>
              <hr>

          </div>
      </div>
      <p>If you do not have an account, please <a href="/signup">sign up</a> here.</p>
    </div>
  </div>
</div>
<script src="static/assets/js/app/login.js"></script>
