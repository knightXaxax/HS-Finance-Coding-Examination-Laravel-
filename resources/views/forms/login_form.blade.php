<form id="login-form" action="{{ route('login') }}" method="POST" class="col l12 z-depth-2 white darken-2">
    @csrf
    <div class="row">
        <div class="input-field l12">
            <h4 class="purple-text lighten-4">Login now</h4>
        </div>
    </div>

    <div class="row">
        <div class="input-field col l10 m12 s12 push-l1">
            <input name="email" id="email-login" type="email" class="validate" required value="@isset($email){{ $email }} @else {{ old('email') }} @endisset">
            <label for="email-login">Email</label>
            @isset($email_error_msg)
                <small class="red-text">{{ $email_error_msg }}</small>
            @endisset
        </div>

        <div class="input-field col l10 m12 s12 push-l1">
            <input name="password" id="password-login" type="password" class="validate" required minlength="8">
            <label for="password-login">Password</label>
            @isset($password_error_msg)
                <small class="red-text">{{ $password_error_msg }}</small>
            @endisset
        </div>
    </div>

    <div class="row">
        <button type="submit" name="login" id="login-btn" class="col l3 pull-l1 right btn purple lighten-4 waves-effect waves-light indigo-text">
            Login
            <i class="material-icons right">arrow_forward_ios</i>
        </button>
    </div>

</form>
<small class="grey-text form-text">Don't have an account yet? <a href="{{ route('registration_page') }}">Register now!</a></small>
