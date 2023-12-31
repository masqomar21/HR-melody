@extends('layout.main')

@section('title', 'login')

@section('content')

  <style>
    .required-color {
    color: #ff4747;
    }
    .error {
        border-color: #ff4747;
    }
    .valid {
        border-color: #37a137;
    }
    .hide {
        display: none;
    }
    .field-icon {
    float: right;
    margin-left: -25px;
    margin-top: -25px;
    position: relative;
    z-index: 2;
    }
</style>
<main class="">
    <section class="container">
        <article class="row justify-content-center">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-4 mb-md-5 pt-5">
                    <h2 class="heading-section" style="color: #1B016A; font-family: 'Poppins', sans-serif; font-weight: bold;">WELCOME TO HRIS PT. GATRA MAPAN</h2>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 pt-4 pt-md-5">
                <div class="shadow p-4 position-relative">

                    <div class="wrap d-md-flex justify-content-center">

                        <figure class="img w-50 mx-auto mx-md-0 pt-md-4 p-md-2">
                            <img src="{{ asset('/') }}assets/images/Logo-Gatra.png" class="img-fluid position-relative" alt="">
                        </figure>
                        <div class="login-wrap p-2 p-md-4">
                            <div class="d-flex">
                                <div class="w-50">
                                    <h3 class="mb-4">Sign In</h3>
                                </div>
                        </div>
                        <form class="signIn-form" action="{{route('autahenticate')}}" method="POST">
                            @csrf
                            <div class="input-section">
                              <label class="mb-1">email<span class="required-color">*</span></label>
                              <input
                                class="form-control"
                                type="email"
                                placeholder="masukan email"
                                id="email"
                                name="email"
                                value="{{old('email')}}"
                                required
                              />
                                {{-- @error('email')

                                <span id="username-error" class=" required-color error-message"
                                  >{{$message}}</span>
                                @enderror
                              <span id="empty-username" class="hide required-color error-message"
                                >This field is required.</span --}}

                            </div>
                            <div class="input-section mt-3">
                              <label class="mb-1">Password<span class="required-color">*</span></label>
                              <input
                                class="form-control"
                                type="password"
                                placeholder="Enter Password"
                                id="password"
                                name="password"
                                required
                              />
                              <span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>

                            </div>
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3 mt-3" id="submit-button">Log In</button>
                            {{-- <label class="text-black-50 py-2 d-flex justify-content-center">--OR--</label>
                            <button class="form-control btn btn-info rounded submit px-3" id="submit-button">Log In As Karyawan</button> --}}
                          </form>
                        </div>
                    </div>
                    @error('email')
                    <div class="alert alert-danger text-center" role="alert">
                        {{$message}}
                      </div>
                    @enderror
                </div>
            </div>
        </article>
    </section>
</main>
<script>




    const togglePassword = document.querySelector('.toggle-password');
    const pass = document.querySelector('#password');
    togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = pass.getAttribute('type') === 'password' ? 'text' : 'password';
        pass.setAttribute('type', type);
        // toggle the eye / eye slash icon
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });

    //Name
    let usernameInput = document.getElementById("username-input");
    let usernameError = document.getElementById("username-error");
    let emptyUsernameError = document.getElementById("empty-username");

    //Password
    let password = document.getElementById("password");
    let passwordError = document.getElementById("password-error");
    let emptypasswordError = document.getElementById("empty-password");

    //Submit
    let submitButton = document.getElementById("submit-button");

    //Valid
    let validClasses = document.getElementsByClassName("valid");
    let invalidClasses = document.getElementsByClassName("error");

    const passwordVerify = (password) => {
    const regex = /^[A-Za-z0-9!@#$%^&*()\-_=+[{\]}\\|;:'",<.>/?`~\s]{2,}$/;
    return regex.test(password);
    };


//Text verification (if input contains only text)
    const textVerify = (text) => {
    const regex = /^[a-zA-Z]{3,}$/;
    return regex.test(text);
    };

    //For empty input - accepts(input,empty error for that input and other errors)
    const emptyUpdate = (
    inputReference,
    emptyErrorReference,
    otherErrorReference
    ) => {
    if (!inputReference.value) {
        //input is null/empty
        emptyErrorReference.classList.remove("hide");
        otherErrorReference.classList.add("hide");
        inputReference.classList.add("error");
    } else {
        //input has some content
        emptyErrorReference.classList.add("hide");
    }
    };

    //For error styling and displaying error message
    const errorUpdate = (inputReference, errorReference) => {
    errorReference.classList.remove("hide");
    inputReference.classList.remove("valid");
    inputReference.classList.add("error");
    };

    //For no errors
    const validInput = (inputReference) => {
    inputReference.classList.remove("error");
    inputReference.classList.add("valid");
    };

    //Name
    usernameInput.addEventListener("input", () => {
    if (textVerify(usernameInput.value)) {
        //If verification returns true
        usernameError.classList.add("hide");
        validInput(usernameInput);
    } else {
        //for false
        errorUpdate(usernameInput, usernameError);
        //empty checker
        emptyUpdate(usernameInput, emptyUsernameError, usernameError);
    }
    });

    //Password
    password.addEventListener("input", () => {
    if (passwordVerify(password.value)) {
        passwordError.classList.add("hide");
        validInput(password);
    } else {
        errorUpdate(password, passwordError);
        emptyUpdate(password, emptypasswordError, passwordError);
    }
    });

</script>
@endsection
