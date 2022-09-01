@extends('layouts.app')
<style>
    .grid-container {
        display: grid;
        grid-template-columns: 10% auto auto auto auto auto auto;
        /* padding: 10px; */
    }

    .grid-item {
        border: 1px solid rgba(0, 0, 0, 0.8);
        /* padding: 20px; */
        font-size: 14px;
        text-align: center;

    }

    .timesheet {
        word-wrap: break-word;
    }

    @media print {
        .hidden-print {
            display: none !important;
        }
    }
</style>
@section('title')
@if(auth()->user()->group== 1)
السجل الأسبوعي الخاص ب: {{$user->name}} {{$user->last_name}}
@else
جدول التلاميذ
@endif
@endsection

@section('content')
@if(count($timesheets) < 1 ) <a href="{{route('time.create')}}" class="btn btn-primary  mb-3 ml-3 hidden-print">
    اضافة سجل
    <i class="fa fa-plus"></i>
    </a>
    @else

    <a href="{{route('time.create')}}" class="btn btn-primary  mb-3 ml-3 hidden-print">
        اضافة سجل
        <i class="fa fa-plus"></i>
    </a>

    <h6>
        السجل الأسبوعي الخاص ب: {{$user->name}} {{$user->last_name}}
    </h6>

    <div class="grid-container">
        <div class="grid-item">
            <span>
                الوقت
            </span>
            <hr>
            @foreach($time_shift as $time )
            {{$time}}

            <br>




            @endforeach
        </div>
        <div class="grid-item timesheet">
            <span>
                الاثنين
            </span>
            <hr>

            @foreach($time_shift as $date => $time )


            @foreach($timesheets as $timesheet)

            @if($timesheet->time_day == $date && $timesheet->day_name== 1)
            <span class="timesheet">
                {{$timesheet->student_name}} {{$timesheet->student_last_name}}

            </span>


            @endif


            @endforeach
            <br>




            @endforeach
        </div>
        <div class="grid-item">
            <span>
                الثلاثاء
            </span>
            <hr>

            @foreach($time_shift as $date => $time )


            @foreach($timesheets as $timesheet)

            @if($timesheet->time_day == $date && $timesheet->day_name== 2)
            {{$timesheet->student_name}} {{$timesheet->student_last_name}}


            @endif


            @endforeach
            <br>
            @endforeach
        </div>
        <div class="grid-item"> <span>
                الأربعاء
            </span>
            <hr>

            @foreach($time_shift as $date => $time )


            @foreach($timesheets as $timesheet)

            @if($timesheet->time_day == $date && $timesheet->day_name== 3)
            {{$timesheet->student_name}} {{$timesheet->student_last_name}}


            @endif


            @endforeach
            <br>
            @endforeach
        </div>
        <div class="grid-item"> <span>
                الخميس
            </span>
            <hr>

            @foreach($time_shift as $date => $time )


            @foreach($timesheets as $timesheet)

            @if($timesheet->time_day == $date && $timesheet->day_name== 4)
            {{$timesheet->student_name}} {{$timesheet->student_last_name}}


            @endif


            @endforeach
            <br>
            @endforeach
        </div>
        <div class="grid-item"> <span>
                الجمعه
            </span>
            <hr>

            @foreach($time_shift as $date => $time )


            @foreach($timesheets as $timesheet)

            @if($timesheet->time_day == $date && $timesheet->day_name== 5)
            {{$timesheet->student_name}} {{$timesheet->student_last_name}}


            @endif


            @endforeach
            <br>
            @endforeach
        </div>
        <div class="grid-item"> <span>
                السبت
            </span>
            <hr>

            @foreach($time_shift as $date => $time )


            @foreach($timesheets as $timesheet)

            @if($timesheet->time_day == $date && $timesheet->day_name== 6)

            <span>
                {{$timesheet->student_name}} {{$timesheet->student_last_name}}
            </span>


            @endif


            @endforeach
            <br>
            @endforeach
        </div>

    </div>

    @endif



    @endsection
