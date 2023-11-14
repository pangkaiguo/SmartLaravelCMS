<!DOCTYPE html>
<html lang="{{ trans('backLang.code') }}" dir="{{ trans('backLang.direction') }}">
<head>
    @include('backEnd.includes.head')
</head>
<body>
<div class="app" id="app">

    <!-- ############ LAYOUT START-->
    <div class="center-block w-xxl w-auto-xs p-y-md">
        <div class="navbar">
            <div class="pull-center">
                <div>
                    <a class="navbar-brand"><img src="{{ URL::to('backEnd/assets/images/logo.png') }}" alt="."> <span
                            class="hidden-folded inline">{{ trans('backLang.control') }}</span></a>
                </div>
            </div>
        </div>
        <div class="p-a-md box-color r box-shadow-z1 text-color">
            <div class="m-b text-sm">
                {{ trans('backLang.signedInToControl') }}
            </div>
            <form name="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                @if($errors ->any())
                    <div class="alert alert-danger m-b-0">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <div class="md-form-group float-label {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" value="{{ old('email') }}" class="md-input" required>
                    <label>{{ trans('backLang.connectEmail') }}</label>
                </div>
                <div class="md-form-group float-label {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" name="password" class="md-input" required>
                    <label>{{ trans('backLang.connectPassword') }}</label>
                </div>
                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
                <div class="m-b-md">
                    <label class="md-check">
                        <input type="checkbox" name="remember"><i
                            class="primary"></i> {{ trans('backLang.keepMeSignedIn') }}
                    </label>
                </div>
                <button type="submit" class="btn primary btn-block p-x-md m-b">{{ trans('backLang.signIn') }}</button>
            </form>
            <hr/>
            @if(env("FACEBOOK_STATUS") && env("FACEBOOK_ID") && env("FACEBOOK_SECRET"))
                <a href="{{ route('social.oauth', 'facebook') }}" class="btn btn-primary btn-block text-left">
                    <i class="fa fa-facebook pull-right"></i> {{ trans('backLang.loginWithFacebook') }}
                </a>
            @endif
            @if(env("TWITTER_STATUS") && env("TWITTER_ID") && env("TWITTER_SECRET"))
                <a href="{{ route('social.oauth', 'twitter') }}" class="btn btn-info btn-block text-left">
                    <i class="fa  fa-twitter pull-right"></i> {{ trans('backLang.loginWithTwitter') }}
                </a>
            @endif
            @if(env("GOOGLE_STATUS") && env("GOOGLE_ID") && env("GOOGLE_SECRET"))
                <a href="{{ route('social.oauth', 'google') }}" class="btn danger btn-block text-left">
                    <i class="fa fa-google pull-right"></i> {{ trans('backLang.loginWithGoogle') }}
                </a>
            @endif
            @if(env("LINKEDIN_STATUS") && env("LINKEDIN_ID") && env("LINKEDIN_SECRET"))
                <a href="{{ route('social.oauth', 'linkedin') }}" class="btn btn-primary btn-block text-left">
                    <i class="fa fa-linkedin pull-right"></i> {{ trans('backLang.loginWithLinkedIn') }}
                </a>
            @endif
            @if(env("GITHUB_STATUS") && env("GITHUB_ID") && env("GITHUB_SECRET"))
                <a href="{{ route('social.oauth', 'github') }}" class="btn btn-default dark btn-block text-left">
                    <i class="fa fa-github pull-right"></i> {{ trans('backLang.loginWithGitHub') }}
                </a>
            @endif
            @if(env("BITBUCKET_STATUS") && env("BITBUCKET_ID") && env("BITBUCKET_SECRET"))
                <a href="{{ route('social.oauth', 'bitbucket') }}" class="btn primary btn-block text-left">
                    <i class="fa fa-bitbucket pull-right"></i> {{ trans('backLang.loginWithBitbucket') }}
                </a>
            @endif

            @if(Helper::GeneralWebmasterSettings("register_status"))
                <a href="{{ url('/register') }}" class="btn info btn-block text-left">
                    <i class="fa fa-user-plus pull-right"></i> {{ trans('backLang.createNewAccount') }}
                </a>
            @endif
            <div class="p-v-lg text-center">
                <div class="m-t"><a href="{{ url('/password/reset') }}"
                                    class="text-primary _600">{{ trans('backLang.forgotPassword') }}</a></div>
            </div>

        </div>



    </div>

    <!-- ############ LAYOUT END-->


</div>
@include('backEnd.includes.foot')
</body>
</html>

