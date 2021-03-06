@extends('layouts.app')
<style>
    body {
        direction: rtl;
        padding: 50px
    }

    label {
        float: right;
        margin-bottom: 10px;
    }

    .title {
        font-size: 16px;
        font-weight: bold;
    }
</style>

@section('title')
اضافة طالب

@endsection

@section('content')
<div class="container mb-5">
    <div class="row">
        <div class="col-md-8">
            <span class="title">
                تسميع جديدة للطالب {{$student->name}}
            </span>
        </div>
    </div>
</div>

<form action="{{route('revisions.store')}}" method="POST">
    @csrf
    <!-- 2 fields per row -->
    <input type="hidden" name="student_id" value="{{$student->id}}">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="name">من</label>
                <input type="text" class="form-control" name="from" id="name" required autocomplete="off" placeholder="من الاية">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="m_name">
                    الى
                </label>
                <input type="text" class="form-control" name="to" id="m_name" required autocomplete="off" placeholder="الى الاية">
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-3">
            <div class="form-group">
                <label for="last_name">نوع التسميعة</label>
                <select class="form-control form-select" name="revision_type">
                    <option value="1">حفظ</option>
                    <option value="2">تسميع</option>
                    <option value="2">مراجعة</option>


                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="phone">التقيم</label>
                <input type="number" class="form-control" name="note" id="note" required autocomplete="off" placeholder="العلامة على 20 " min="0" max="20">
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="phone">ملاحظات</label>
                <textarea class="form-control" name="notes" id=""></textarea>
            </div>
        </div>

    </div>

    <button type="submit" class="btn btn-primary float-right mt-3">
        <i class="fas fa-save"></i>
        حفظ
    </button>
    <button type="reset" class="btn btn-danger float-right mt-3 mr-3">
        <i class="fas fa-trash-alt"></i>
        مسح الحقول
    </button>
    <button type="button" class="btn btn-secondary float-right mt-3 mr-3" onclick="window.location.href=`{{route('students.index')}}`">
        <i class="fas fa-backward"></i>
        رجوع
    </button>
</form>




@endsection