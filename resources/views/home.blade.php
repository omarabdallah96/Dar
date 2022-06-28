@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('عدد الطلاب') }}</div>
                <div>
                    <div class="m-3 alert alert-success">
                        عدد الطلاب :  {{$users->students->count()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection