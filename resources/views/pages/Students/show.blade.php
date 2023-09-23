@extends('layouts.master')
@section('css')
@section('title')
    {{trans('Student_trans.Student_details')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('Student_trans.Student_details')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="card-body">
                        <div class="tab nav-border">
                            {{-- ==================== Tab_Panel Header ==================== --}}
                            <ul class="nav nav-tabs" role="tablist">
                                {{-- +++++++++ Tab1 : Details +++++++++ --}}
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                       role="tab" aria-controls="home-02"
                                       aria-selected="true">{{trans('Student_trans.Student_details')}}
                                    </a>
                                </li>
                                {{-- +++++++++ Tab2 : Attachments +++++++++ --}}
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                       role="tab" aria-controls="profile-02"
                                       aria-selected="false">{{trans('Student_trans.Attachments')}}</a>
                                </li>
                            </ul>
                            {{-- ==================== Tab_Panel Body ==================== --}}
                            <div class="tab-content">
                                {{-- Tab1 Body : Details --}}
                                <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                     aria-labelledby="home-02-tab">
                                    <table class="table table-striped table-hover" style="text-align:center">
                                        <tbody>
                                            {{-- +++++++++++ Row +++++++++++ --}}
                                            <tr>
                                                <th scope="row">{{trans('Student_trans.name')}}</th>
                                                <td>{{ $Student->name }}</td>
                                                <th scope="row">{{trans('Student_trans.email')}}</th>
                                                {{-- Convert the email and phone strings to arrays --}}
                                                @php
                                                    $emailArray = explode(',', $Student->email);
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
                                                <th scope="row">{{trans('Student_trans.gender')}}</th>
                                                <td>{{$Student->gender->Name}}</td>
                                                <th scope="row">{{trans('Student_trans.Nationality')}}</th>
                                                <td>{{$Student->Nationality->Name}}</td>
                                            </tr>
                                            {{-- +++++++++++ Row +++++++++++ --}}
                                            <tr>
                                                <th scope="row">{{trans('Student_trans.Grade')}}</th>
                                                <td>{{ $Student->grade->Name }}</td>
                                                <th scope="row">{{trans('Student_trans.classrooms')}}</th>
                                                <td>{{$Student->classroom->Name_Class}}</td>
                                                <th scope="row">{{trans('Student_trans.section')}}</th>
                                                <td>{{$Student->section->Name_Section}}</td>
                                                <th scope="row">{{trans('Student_trans.Date_of_Birth')}}</th>
                                                <td>{{ $Student->Date_Birth}}</td>
                                            </tr>
                                            {{-- +++++++++++ Row +++++++++++ --}}
                                            <tr>
                                                <th scope="row">{{trans('Student_trans.parent')}}</th>
                                                <td>{{ $Student->myparent->Name_Father}}</td>
                                                <th scope="row">{{trans('Student_trans.academic_year')}}</th>
                                                <td>{{ $Student->academic_year }}</td>
                                                <th scope="row"></th>
                                                <td></td>
                                                <th scope="row"></th>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- Tab2 Body : Attachements --}}
                                <div class="tab-pane fade" id="profile-02" role="tabpanel"
                                     aria-labelledby="profile-02-tab">
                                    <div class="card card-statistics">
                                        <div class="card-body">
                                            <form method="post" action="{{ route('Upload_attachment') }}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label
                                                            for="academic_year">{{trans('Student_trans.Attachments')}}
                                                            : <span class="text-danger">*</span></label>
                                                        <input type="file" accept="image/*" name="photos[]" multiple required>
                                                        {{-- I need "student_name" To store "uploaded_images" in "student_name folder" in "public folder" --}}
                                                        <input type="hidden" name="student_name" value="{{$Student->name}}">
                                                        <input type="hidden" name="student_id" value="{{$Student->id}}">
                                                    </div>
                                                </div>
                                                <br><br>
                                                <button type="submit" class="button button-border x-small">
                                                       {{trans('Student_trans.submit')}}
                                                </button>
                                            </form>
                                        </div>
                                        <br>
                                        <table class="table center-aligned-table mb-0 table table-hover"
                                               style="text-align:center">
                                            <thead>
                                                <tr class="table-secondary">
                                                    <th scope="col">#</th>
                                                    <th scope="col">{{trans('Student_trans.filename')}}</th>
                                                    <th scope="col">{{trans('Student_trans.created_at')}}</th>
                                                    <th scope="col">{{trans('Student_trans.Processes')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($Student->images as $attachment)
                                                    <tr style='text-align:center;vertical-align:middle'>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$attachment->filename}}</td>
                                                        <td>{{$attachment->created_at->diffForHumans()}}</td>
                                                        <td colspan="2">
                                                            {{-- ++++++++++++++++++ Download Button ++++++++++++++++++ --}}
                                                            <a class="btn btn-outline-info btn-sm"
                                                            href="{{url('Download_attachment')}}/{{ $attachment->imageable->name }}/{{$attachment->filename}}"
                                                            role="button">
                                                            <i class="fa fa-download"></i>&nbsp; {{trans('Student_trans.Download')}}
                                                            </a>
                                                            {{-- ++++++++++++++++++ Delete Button ++++++++++++++++++ --}}
                                                            <button type="button" class="btn btn-outline-danger btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#Delete_img{{ $attachment->id }}"
                                                                    title="{{ trans('Grades_trans.Delete') }}">{{trans('Student_trans.delete')}}
                                                            </button>

                                                        </td>
                                                    </tr>
                                                    @include('pages.Students.Delete_img')
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- row closed -->
@endsection
@section('js')

@endsection
