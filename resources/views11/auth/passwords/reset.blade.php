@extends('layouts.auth')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .password-container {
            position: relative;
            display: inline-block;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>


    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
        <div class="brand-logo pb-4 text-center">
            <a href="#" class="logo-link">
                <img class="logo-light logo-img logo-img-lg" src="{{ asset('images/FMDQlogo.svg') }}"
                    srcset="{{ asset('images/FMDQlogo.svg') }}" alt="logo">
                <img class="logo-dark logo-img logo-img-lg" src="{{ asset('images/FMDQlogo.svg') }}"
                    srcset="{{ asset('images/FMDQlogo.svg') }}" alt="logo-dark">


            </a>
        </div>
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h5 class="nk-block-title">Reset Password</h5>
                <div class="nk-block-des">
                    {{-- <p>If you forgot your password, well, then we’ll
                                        email you instructions to reset your password.</p> --}}
                </div>
            </div>
        </div><!-- .nk-block-head -->
        @if (Session::has('message'))
            <div class="alert alert-success text-center mb-4" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger text-center mb-4" role="alert">
                {{ Session::get('error') }}
            </div>
        @endif
        <form method="POST" action="{{ route('Adminresetpasswordsubmit') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="default-01">Email</label>

                </div>
                <input type="email" name="email"
                    class="form-control form-control-lg  @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" id="default-01" placeholder="Enter your email address or username">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div><!-- .foem-group -->

            <!-- .foem-group -->
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="password">Password*</label>


                </div>
                <div class="form-control-wrap">

                    <a tabindex="-1" href="#" class="form-icon form-icon-right" data-target="password"
                        onclick="togglePassword('myInput')">
                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                    </a>
                    <input type="password" name="password"
                        class="form-control form-control-lg @error('password') is-invalid @enderror" id="myInput"
                        placeholder="Enter your password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <p>
                    <h6>Password Policy</h6>
                    </p>
                    <ul class="list-unstyled">
                        <li>- Password must contain at least eight characters</li>
                        <li>- Password must be different from username</li>
                        <li>- Password must contain at least one number (0-9)</li>
                        <li>- Password must contain at least one lowercase letter (a-z)</li>
                        <li>- Password must contain at least one uppercase letter (A-Z)</li>
                    </ul>
                </div>
            </div><!-- .foem-group -->

            <div class="form-group">
                <div class="form-label-group">

                    <a tabindex="-1" href="#" class="form-icon form-icon-right" data-target="password"
                        onclick="togglePassword('myInputq')">
                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                    </a>
                    <input type="password" name="password_confirmation"
                        class="form-control form-control-lg @error('password') is-invalid @enderror" id="myInputq"
                        placeholder="Confirm your password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    {{-- <label class="form-label" for="password">Confirm Password</label>

                </div>
                <div class="form-control-wrap">
                    <input type="password" name="password_confirmation"
                        class="form-control form-control-lg @error('password') is-invalid @enderror" id="confirm_password"
                        placeholder="Confirm your password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror --}}
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block" name="SUBMIT" id="submit"
                    onclick="loading(); setTimeout('document.getElementById(\'' + this.id + '\').disabled=true;', 50);   "
                    type="submit">
                    <i class="fas fa-spinner fa-spin" style="display:none;"></i>
                    <span class="btn-text">Reset</span>
                </button>
                {{-- <input type="submit" class="btn btn-lg btn-primary btn-block" name="SUBMIT" value="Reset"
                                onclick="this.disabled='disabled';this.form.submit();" /> --}}

                {{-- {!! Form::button('Place Your Order', ['class' => 'pull-right btn btn-success', 'onclick' => 'submit()']) !!} --}}

                {{-- <input type="submit"  class="btn btn-lg btn-primary btn-block" value="Sign in" class="pull-right btn btn-success" name="submit" onclick="this.disabled=true;this.form.submit();">  --}}
                {{-- <button id="disable-submit" type="submit" class="g-recaptcha btn btn-light rounded-pill" data-sitekey="{{ config('services.recaptcha.sitekey') }}" data-callback='onSubmit' data-action='submit'>
                                    {{ __('Register') }}
                                </button>  --}}

                {{-- <button type="submit"  id="button" class="btn btn-lg btn-primary btn-block">Sign in</button> --}}
            </div>
            <!-- .foem-group -
                                                                                
                                                                                                    <div class="form-group">
                                                                                
                                                                                                        <button type="submit" class="btn btn-lg btn-primary btn-block">Send Password Reset Link</button>
                                                                                                    </div>
                                                                                                </form>-->
            <div class="form-note-s2 pt-4">Wait, I remember my password......<a href="{{ route('login') }}">Click here</a>
            </div>

    </div>
    </div>
    </div>

    <script>
        function togglePassword(inputId) {
            var x = document.getElementById(inputId);
            var icon = document.querySelector(`[onclick="togglePassword('${inputId}')"]`);

            if (x.type === "password") {
                x.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("passcode-icon icon-hide icon ni ni-eye-off");
            } else {
                x.type = "password";
                icon.classList.remove("passcode-icon icon-hide icon ni ni-eye-off");
                icon.classList.add("fa-eye");
            }
        }
    </script>
@endsection


















































{{-- @extends('layouts.auth')

@section('content')
        <div class="wrapper-page account-page-full">

            <div class="card shadow-none">
                <div class="card-block">

                    <div class="account-box">
                        
                        <div class="card-box shadow-none p-4">
                            <div class="p-2">
                                <div class="text-center mt-4">
                                    <a href="index.html"><img src="{{ asset('assets/images/FMDQlogo.svg')}}" height="45" alt="logo"></a>
                                </div>

                                <h4 class="font-size-18 mt-5 text-center">Reset Password</h4>
                             
                                {{-- @if (Session::has('message'))
                                <div class="alert alert-success text-center mb-4" role="alert">
                                {{ Session::get('message') }} --}}


{{-- @if (Session::has('message'))
                                <div class="alert alert-success text-center mb-4" role="alert">
                                {{ Session::get('message') }}
                                     </div>
                                     @endif
                
                                     @if (Session::has('error'))
                                     <div class="alert alert-danger text-center mb-4" role="alert">
                                     {{ Session::get('error') }}
                                          </div>
                                          @endif
                                <form method="POST" class="mt-4" action="{{ route('Adminresetpasswordsubmit') }}"  >
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">

                                 
                                <div class="mb-3">
                                    <label class="form-label" for="username">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" name="email"   autocomplete="email" autofocus placeholder="Enter email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="userpassword">Password</label>
                                    <input type="password" name="password" required class="form-control  @error('password') is-invalid @enderror" name="userpassword" placeholder="Enter password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <p><h6>Password Policy</h6></p>
                                <ul class="list-unstyled">
                                <li>- Password must contain at least eight characters</li>
                                <li>-  Password must be different from username</li>
                                <li>-  Password must contain at least one number (0-9)</li>
                                <li>-  Password must contain at least one lowercase letter (a-z)</li>
                                <li>-  Password must contain at least one uppercase letter (A-Z)</li>
                                </ul>




                                <div class="mb-3">
                                    <label class="form-label" for="userpassword">Confirm Password</label>
                                    <input type="password" name="password_confirmation" required  class="form-control  @error('password') is-invalid @enderror" name="userpassword" placeholder="Enter password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
    

                               
    
                                <div class="mb-3 row">
                                    <div class="col-sm-6">
                                      
                                    </div>
                                    <div class="col-sm-6 text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                                    </div>
                                </div>

                               

                            </form>

                            <div class="mt-5 pt-4 text-center">
                                <p>Remember It ? <a href="{{ route('login') }}" class="fw-medium text-primary"> Sign In here </a> </p>
                                <p>© <script>document.write(new Date().getFullYear())</script> Veltrix. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                            </div>

                        </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    

        @endsection     --}}
