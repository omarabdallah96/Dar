@extends('layouts.super')

@section('title')
الرئيسية

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('احصائيات') }}</div>
                <div>
                    <div class="m-3 alert alert-success">
                        عدد الطلاب : {{$users}}
                    </div>

                    <div class="m-3 alert alert-success">
                        <a href="{{route('time.index')}}">
                            عدد المراكز : {{$centers}}

                        </a>
                    </div>
                    <div class="m-3 alert alert-success">
                        <a href="{{route('time.index')}}">
                            عدد الاساتذه : {{$users}}

                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
