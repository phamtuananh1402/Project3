<!-- The Modal -->
<div id="idlogin" class="modal embed-responsive">
                            <span onclick="document.getElementById('idlogin').style.display='none'"
                                  class="close" title="Close Modal">&times;</span>
    <!-- Modal Content -->
    <form class="modal-content animate" role="form" method="POST" action="{{route('login')}}">
        {{ csrf_field() }}
        <div class="imgcontainer">
            <img src="{{asset('images/companyava.png')}}" alt="Avatar" class="avatar" style="margin-left:450px">
        </div>
        <br/>
        <br/>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label"><b>E-Mail Address</b></label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email"
                       value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                                                 <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                @endif
            </div>
        </div>
        <br/>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password"
                       required>

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"
                               name="remember" {{ old('remember') ? 'checked' : '' }}> Remember
                        Me
                    </label>
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-danger">
                    Login
                </button>

                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
            </div>
        </div>

    </form>
</div>