@extends('layouts.master')
@section('css')
    @section('title')
        {{trans('main_trans.list_students')}}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('Student_trans.breadcrumbs_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('main_trans.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('Student_trans.List_student') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                {{-- +++++++++++++++++++++ "Add Student" Button +++++++++++++++++++++ --}}
                                <a href="{{route('Student.create')}}" class="btn btn-success nextBtn btn-md pull-left" role="button"
                                   aria-pressed="true"> <i class="fa fa-plus"></i> {{trans('student_trans.add_student')}}
                                </a>
                                <br><br>
                                {{-- ++++++++++++++++++++ date search +++++++++++++ --}}
                                <form action="{{route('student.filter')}}" method="GET">
                                    <div class="row mb-5">
                                        {{-- Start Date --}}
                                        <div class="col-md-3">
                                            <label for="start_date">{{ __('main_trans.start_date') }} : </label>
                                            <input type="date" class="form-control" name="start_date" id="start_date">
                                        </div>
                                        {{-- End Date --}}
                                        <div class="col-md-3">
                                            <label for="end_date">{{ __('main_trans.end_date') }} : </label>
                                            <input type="date" class="form-control" name="end_date" id="end_date">
                                        </div>
                                        {{-- filter button --}}
                                        <div class="col-md-3 mt-4 pt-3">
                                           <button type="submit" class="btn btn-primary"> {{ __('main_trans.Filter') }}</button>
                                        </div>
                                    </div>
                                </form>
                                {{-- +++++++++++++++++++++ "Student" Table +++++++++++++++++++++ --}}
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('Student_trans.Name_Student')}}</th>
                                            <th>{{trans('Student_trans.email')}}</th>
                                            <th>{{trans('Student_trans.gender')}}</th>
                                            <th>{{trans('Student_trans.Grade')}}</th>
                                            <th>{{trans('Student_trans.classrooms')}}</th>
                                            <th>{{trans('Student_trans.section')}}</th>
                                            <th>{{trans('Student_trans.created_at')}}</th>
                                            <th>{{trans('Student_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                                {{-- $loop->index == index of current iteration of loop , start with 0 --}}
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$student->name}}</td>
                                                {{-- Convert the email and phone strings to arrays --}}
                                                @php
                                                    $emailArray = explode(',', $student->email);
                                                    // Remove "square brackets" from each element in the "emailArray"
                                                    foreach ($emailArray as $key => $email)
                                                    {
                                                        $emailArray[$key] = str_replace(['[', ']','"'], '', $email);
                                                    }
                                                @endphp
                                                <td class="col3">
                                                    {{-- Iterate over the email array elements --}}
                                                    @foreach ($emailArray as $email)
                                                        {{ $email }}<br>
                                                    @endforeach
                                                </td>
                                                <td>{{$student->gender->Name}}</td>
                                                <td>{{$student->grade->Name}}</td>
                                                <td>{{$student->classroom->Name_Class}}</td>
                                                <td>{{$student->section->Name_Section}}</td>
                                                <td>{{ $student->created_at->format('Y-m-d') }}</td>
                                                {{-- Processes Button --}}
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{trans('Student_trans.Processes')}}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            {{-- Show Button --}}
                                                            <a class="dropdown-item" href="{{route('Student.show',$student->id)}}" target="_blank">
                                                                <i style="color: #ffc107" class="fa fa-eye "></i>&nbsp;
                                                                {{ trans('Student_trans.Show_Student_Data') }}
                                                            </a>
                                                           {{-- Edit Button --}}
                                                            <a class="dropdown-item" href="{{route('Student.edit',$student->id)}}" target="_blank">
                                                                <i style="color:green" class="fa fa-edit"></i>&nbsp;
                                                                {{ trans('Student_trans.Edit_Student_Data') }}
                                                            </a>
                                                            {{-- <a class="dropdown-item" href="{{route('Fees_Invoices.show',$student->id)}}"><i style="color: #0000cc" class="fa fa-edit"></i>&nbsp;اضافة فاتورة رسوم&nbsp;</a>
                                                            <a class="dropdown-item" href="{{route('receipt_students.show',$student->id)}}"><i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;سند قبض</a>
                                                            <a class="dropdown-item" href="{{route('ProcessingFee.show',$student->id)}}"><i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp; استبعاد رسوم</a>
                                                            <a class="dropdown-item" href="{{route('Payment_students.show',$student->id)}}"><i style="color:goldenrod" class="fas fa-donate"></i>&nbsp; &nbsp;سند صرف</a> --}}

                                                            {{-- Delete Button --}}
                                                            <a class="dropdown-item" data-target="#Delete_Student{{ $student->id }}" data-toggle="modal" href="##Delete_Student{{ $student->id }}">
                                                                <i style="color: red" class="fa fa-trash"></i>&nbsp;
                                                                {{ trans('Student_trans.Delete_Student_Data') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            {{-- ++++++++++++++++++++++ Delete Modal ++++++++++++++++++++++ --}}
                                            @include('pages.Students.Delete')
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
