@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><strong>Usage</strong></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="well well-sm col-md-10 col-md-offset-1 text-center">
                            Total Requests: <code>{{ Auth::user()->request_count }}</code>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading text-center"><strong>API Key</strong></div>

                <div class="panel-body">
                    <div class="row">
                        <div class="well well-sm col-md-10 col-md-offset-1 text-center">
                            <code>{{ Auth::user()->api_token }}</code>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
