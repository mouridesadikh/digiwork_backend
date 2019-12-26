@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('Verify Email Address')</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            @lang('email_v')
                        </div>
                    @endif

                    @lang('email_v_c')
                    @lang('email_vc'), <a href="{{ route('verification.resend') }}">@lang('email_click')</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
