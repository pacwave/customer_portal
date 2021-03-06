@extends('layouts.no_nav')
<style>
body{
	background-image:url({{ asset('assets/images/body-bg.jpg') }});
	background-repeat: no-repeat;
}
.loginbox .col-sm-6 {
    padding: 10px 15px !important;
    min-height: 410px !important;
}
</style>
@section('content')
<div class="vertically-center">
 <div class="container">
<div class="row">
            <div class="col-md-8 col-md-offset-2">
				<div class="row loginbox">
					<div class="col-sm-6 bg_darkgrey">
						<div class="loginlogo">
						<img src="{{ asset('assets/images/login-logo.png') }}">
						</div>
					</div>
					<div class="col-sm-6">
					@if(count(getAvailableLanguages()) > 1)
					<div class="lang_selector">
					@if(count(getAvailableLanguages()) > 1)
					@include("layouts.partials.lang")
					@endif
					</div>
					@endif

<h2>{{trans("headers.forgotUsernameOrPassword",[],$language)}}</h2>
<p class="text-info1">
                            {{trans("register.forgotDescription",[],$language)}}
                        </p>
   {!! Form::open(['action' => 'AuthenticationController@sendResetEmail', 'id' => 'passwordResetForm', 'method' => 'post']) !!}
                        <div class="form-group">
                            <label for="email">{{trans("register.email",[],$language)}}</label>
                            {!! Form::email("email",null,['id' => 'email', 'class' => 'form-control', 'placeholder' => trans("register.email",[],$language)]) !!}
                        </div>
                        <button type="submit" class="btn btn-primary">{{trans("actions.sendResetEmail",[],$language)}}</button>
                        {!! Form::close() !!}
<p class="text-info1">
                    <a href="{{action("AuthenticationController@index")}}">{{trans("register.back",[],$language)}}</a>
                </p>

</div>
</div>
</div>
</div>
</div>
@endsection
@section('additionalJS')
    {!! JsValidator::formRequest('App\Http\Requests\SendPasswordResetRequest','#passwordResetForm') !!}
@endsection
@section('additionalCSS')
    <link rel="stylesheet" href="/assets/css/pages/index.css">
@endsection