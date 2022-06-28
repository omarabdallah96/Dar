@extends('layouts.app')
<style>
    table {
        direction: rtl;

    }
</style>
@section('title')
طلابي
@endsection

@section('content')
@if(count($students) > 0)
<a href="{{route('students.create')}}" class="btn btn-primary  mb-3 ml-3">إضافة طالب
    <i class="fa fa-plus"></i>
</a>
@endif
<table class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>الاسم</th>
            <th>العائلة</th>

            <th>الحنس</th>

            <th>الحالة</th>
            <th>
                السجل
            </th>



        </tr>
    </thead>

    <tbody>
        @forelse ($students as $student)
        <tr>
            <td>{{$student->name}}</td>
            <td>{{$student->last_name}}</td>
            <td>
                @if($student->sex=='m')
                ذكر
                @else
                أنثى
                @endif
            </td>
            <td>
                @if($student->active)
                مسجل
                @else
                غير مسجل
                @endif
            </td>
            <td>
                <a href="{{route('students.show', $student->id)}}" class="btn btn-primary">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{route('students.edit', $student->id)}}" class="btn btn-warning">
                    <i class="fas fa-edit"></i>
                </a>
               
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">
                لا يوجد طلاب <a href="{{route('students.create')}}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    اضافة طالب
                </a>
            </td>

        </tr>

        @endforelse
    </tbody>
</table>




@endsection