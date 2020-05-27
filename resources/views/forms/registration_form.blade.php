<form id="login-form" action="{{ route('register') }}" method="POST" class="col l12 z-depth-2 white darken-2" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="input-field l12">
            <h4 class="purple-text lighten-4">Join us today</h4>
        </div>
    </div>

    <div class="row">
        <div class="input-field col l4 m4 s12">
            <i class="material-icons prefix purple-text">account_circle</i>
            <input name="surname" id="surname-edit" type="text" class="validate" required value="@isset($data){{ $data['surname'] }} @else {{ old('surname') }} @endisset">
            <label for="surname-edit">Surname</label>
        </div>
        <div class="input-field col l4 m4 s12">
            <i class="material-icons prefix purple-text">account_circle</i>
            <input name="firstname" id="firstname-edit" type="text" class="validate" required value="@isset($data){{ $data['firstname'] }} @else {{ old('firstname') }} @endisset">
            <label for="firstname-edit">Firstname</label>
        </div>
        <div class="input-field col l4 m4 s12">
            <i class="material-icons prefix purple-text">account_circle</i>
            <input name="middlename" id="middlename-edit" type="text" class="validate" required value="@isset($data){{ $data['middlename'] }} @else {{ old('middlename') }} @endisset">
            <label for="middlename-edit">Middlename</label>
        </div>

        <div class="input-field col l12 m6 s12">
            <i class="material-icons prefix purple-text">mode_edit</i>
            <input name="age" id="age-edit" type="number" class="validate" required value="@isset($data){{ $data['age'] }} @else {{ old('age') }} @endisset"  maxlength="3">
            <label for="age-edit">Age</label>
        </div>

        <div class="input-field col l12 m6 s12">
            <div id="input-field" class="file-field input-field">
                <div class="btn purple">
                    <span class="white-text">File</span>
                    <input type="file" name="profile_picture" required>
                </div>
                <div class="file-path-wrapper">
                    <input id="picture-edit" class="file-path validate" type="text" name="profile_picture" placeholder="Upload Profile Picture" required>
                </div>
            </div>
        </div>

        <div class="input-field col l12 m4 s12">
            <i class="material-icons prefix purple-text">email</i>
            <input name="email" id="email-edit" type="email" class="validate" required value="@isset($data){{ $data['email'] }} @else {{ old('email') }} @endisset">
            <label for="email-edit">Email</label>
            @isset($email_error_msg)
                <small class="red-text">{{ $email_error_msg }}</small>
            @endisset
        </div>

        <div class="input-field col l12 m4 s12">
            <i class="material-icons prefix purple-text">vpn_key</i>
            <input name="password" id="password-edit" type="password" class="validate" required minlength="8">
            <label for="password-edit">Password</label>
        </div>

        <div class="input-field col l12 m4 s12">
            <i class="material-icons prefix purple-text">vpn_key</i>
            <input name="confirm_password" id="confirm_password-edit" type="password" class="validate" required minlength="8">
            <label for="confirm_password-edit">Confirm Password</label>
            @isset($password_error_msg)
                <small class="red-text">{{ $password_error_msg }}</small>
            @endisset
        </div>
    </div>

    <div class="row">
        <button type="submit" name="login" id="register-btn" class="col xl2 l3 m3 s5 right btn purple lighten-4 waves-effect waves-light indigo-text">
            Register
            <i class="material-icons right">send</i>
        </button>
    </div>

</form>
<small class="grey-text form-text">Already have an account? <a href="{{ route('login_page') }}">Login now!</a></small>
