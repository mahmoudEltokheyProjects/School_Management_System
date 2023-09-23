@extends('layouts.master')
@section('css')
    @section('title')
        {{trans('Student_trans.Student_Edit')}}
    @stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ __('Student_trans.Student_Edit') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('Student_trans.Student_Edit') }}</li>
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
                {{-- +++++++++++++++++++++++++++++++ Errors +++++++++++++++++++++++++++++++ --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- +++++++++++++++++++++++++++++++ "Update Student" Form +++++++++++++++++++++++++++++++ --}}
                <form action="{{ route('Student.update','test') }}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    {{-- ====================================== Personal Information ====================================== --}}
                    <h4 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Student_trans.personal_information')}}</h4><br>
                    {{-- ///////////////// Row 1 ///////////////// --}}
                    <div class="row">
                        {{-- ++++++++++++++++ "name_ar" inputField ++++++++++++++++ --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('Student_trans.name_ar')}} : <span class="text-danger">*</span></label>
                                <input value="{{$Students->getTranslation('name','ar')}}" type="text" name="name_ar"  class="form-control">
                                {{-- "Student_id" hidden_inputField --}}
                                <input type="hidden" name="id" value="{{$Students->id}}">
                            </div>
                        </div>
                        {{-- ++++++++++++++++ "name_en" inputField ++++++++++++++++ --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('Student_trans.name_en')}} : <span class="text-danger">*</span></label>
                                <input value="{{$Students->getTranslation('name','en')}}" class="form-control" name="name_en" type="text" >
                            </div>
                        </div>
                    </div>
                    {{-- ///////////////// Row 2 ///////////////// --}}
                    <div class="row">
                        {{-- ++++++++++++++++ "email" inputField ++++++++++++++++ --}}
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('Student_trans.email')}} : </label>
                                <input type="email" value="{{ $Students->email }}" name="email" class="form-control" >
                            </div>
                        </div> --}}
                        {{-- +++++++++++++++++++++++++++++++ email array ++++++++++++++++++++++++ --}}
                        <div class="col-md-6">
                            <div class="form-group ">
                                <table class="bordered">
                                    <thead class="email_thead">
                                        <tr>
                                            <th class="text-left" style="font-weight: normal;">
                                                <label class="mb-2">
                                                    <span class="text-danger">*</span>@lang('lang.email')
                                                </label>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="email_tbody">
                                        <tr>
                                            <td class="col-md-12 p-0">
                                                <div class="select_body d-flex justify-content-between align-items-center" >
                                                    <input type="text"
                                                        class="form-control"
                                                        placeholder="@lang('lang.email')"
                                                        name="email[]"
                                                        value="{{ old('email') }}" required >
                                                    <td  class="col-md-6">
                                                        {{-- +++++++++++++ Add New Phone Number +++++++++ --}}
                                                        <a href="javascript:void(0)" class="btn btn-xs btn-primary addRow_email" type="button">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </td>
                                                    @error('email')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    @php
                                                        $emailArray = explode(',', $Students->email);
                                                        // Remove square brackets from each element in the emailArray
                                                        foreach ($emailArray as $key => $email)
                                                        {
                                                            $emailArray[$key] = str_replace(['[', ']','"'], '', $email);
                                                        }
                                                    @endphp
                                                    {{-- Iterate over the email array elements --}}
                                                    @foreach ($emailArray as $email)
                                                        <tr>
                                                            <td class="col-md-12 p-0">
                                                                <input  type="text" class="form-control" placeholder="@lang('lang.email')" name="email[]"
                                                                        value="{{ $email }}" required >
                                                                        @error('email')
                                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                                        @enderror
                                                            </td>
                                                            <td class="col-md-6">
                                                                <a href="javascript:void(0)" class="btn btn-xs btn-danger deleteRow_email" type="button">
                                                                    <i class="fa fa-close"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tr>
                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- ++++++++++++++++ "password" inputField ++++++++++++++++ --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('Student_trans.password')}} :</label>
                                <input value="{{ $Students->password }}" type="password" name="password" class="form-control" >
                            </div>
                        </div>
                        {{-- ++++++++++++++++ "gender" selectbox ++++++++++++++++ --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender">{{trans('Student_trans.gender')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="gender_id">
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($Genders as $Gender)
                                        <option value="{{$Gender->id}}" {{$Gender->id == $Students->gender_id ? 'selected' : ""}}>{{ $Gender->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- ++++++++++++++++ "Nationality" selectbox ++++++++++++++++ --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nal_id">{{trans('Student_trans.Nationality')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="nationalitie_id">
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($nationals as $nal)
                                        <option value="{{ $nal->id }}" {{$nal->id == $Students->nationalitie_id ? 'selected' : ""}}>{{ $nal->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- ++++++++++++++++ "blood" selectbox ++++++++++++++++ --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bg_id">{{trans('Student_trans.blood_type')}} : </label>
                                <select class="custom-select mr-sm-2" name="blood_id">
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($bloods as $bg)
                                        <option value="{{ $bg->id }}" {{$bg->id == $Students->blood_id ? 'selected' : ""}}>{{ $bg->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- ++++++++++++++++ "Date_of_Birth" inputField ++++++++++++++++ --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>{{trans('Student_trans.Date_of_Birth')}}  :</label>
                                <input class="form-control" type="text" value="{{$Students->Date_Birth}}" id="datepicker-action" name="Date_Birth" data-date-format="yyyy-mm-dd">
                            </div>
                        </div>
                    </div>
                    {{-- ====================================== Student Information ====================================== --}}
                    <h4 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Student_trans.Student_information')}}</h4><br>
                    <div class="row">
                        {{-- ++++++++++++++++++++++++ "Grades" selectbox ++++++++++++++++++++++++ --}}
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="Grade_id">{{trans('Student_trans.Grade')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Grade_id">
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($Grades as $Grade)
                                        <option value="{{ $Grade->id }}" {{$Grade->id == $Students->Grade_id ? 'selected' : ""}}>{{ $Grade->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- ++++++++++++++++++++++++ "classrooms" selectbox ++++++++++++++++++++++++ --}}
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="Classroom_id">{{trans('Student_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Classroom_id">
                                    <option value="{{$Students->Classroom_id}}">{{$Students->classroom->Name_Class}}</option>
                                </select>
                            </div>
                        </div>
                        {{-- ++++++++++++++++++++++++ "sections" selectbox ++++++++++++++++++++++++ --}}
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="section_id">{{trans('Student_trans.section')}} : </label>
                                <select class="custom-select mr-sm-2" name="section_id">
                                    <option value="{{$Students->section_id}}"> {{$Students->section->Name_Section}}</option>
                                </select>
                            </div>
                        </div>
                        {{-- ++++++++++++++++++++++++ "parents" selectbox ++++++++++++++++++++++++ --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="parent_id">{{trans('Student_trans.parent')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="parent_id">
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($parents as $parent)
                                        <option value="{{ $parent->id }}" {{ $parent->id == $Students->parent_id ? 'selected' : ""}}>{{ $parent->Name_Father }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- ++++++++++++++++++++++++ "academic_year" inputField ++++++++++++++++++++++++ --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">{{trans('Student_trans.academic_year')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}" {{$year == $Students->academic_year ? 'selected' : ' '}}>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div><br>
                    {{-- ///////////////// Submit Button ///////////////// --}}
                    <button class="btn btn-success btn-md nextBtn pull-right" type="submit">{{trans('Student_trans.submit')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            // ------------------------------------ Grades Selectbox ------------------------------------
            // on change on "selectbox with name='Grade_id' " , Execute The following function
            $('select[name=Grade_id]').on('change',function(){
                // Get "grade_id" of "selected option" from "selectbox" ==> ["value" of "selected option" == "grade_id"]
                var Grade_id = $(this).val();
                // if "Grade_id" of "selected option" has value , Go to url = "/classes/Grade_id"
                if (Grade_id)
                {
                    $.ajax({
                        url:'/classes/'+Grade_id ,
                        type:'GET' ,
                        dataType:'json' ,
                        success:function(data)
                        {
                            console.log(data);
                            $('select[name=Classroom_id]').empty();
                            // Put "All classes" on "Class Selectbox"
                            $('select[name=Classroom_id]').append('<option selected disabled">{{ trans('Student_trans.Choose') }}</option>');
                            $.each(data, function(key,value){
                                $('select[name=Classroom_id]').append('<option value="'+key+'">'+value+'</option>');
                            });
                        },
                    });
                }
                else
                {
                    console.log('AJAX load did not work');
                }
            });
            // ------------------------------------ Classrooms Selectbox ------------------------------------
            // ++++++++++++ getsections() : Get "all sections" According to selected "class" selectbox ++++++++++++
            // on change on "selectbox with name='Grade_id' " , Execute The following function
            $('select[name="Classroom_id"]').on('change', function(){
                var Class_id = $(this).val();
                if( Class_id )
                {
                    $.ajax({
                        url:"/sections/"+Class_id,
                        type:'GET',
                        dataType:'json',
                        success:function(data)
                        {
                            console.log(data);
                            $('select[name=section_id]').empty();
                            // Put "All sections" on "sections Selectbox"
                            $.each(data, function(key,value){
                                $('select[name=section_id]').append('<option value="'+key+'">'+value+'</option>');
                            });
                        }
                    });
                }
                else
                {
                    console.log('AJAX load did not work');
                }
            });
            // ============================== Email Repeater ==============================
            // +++++++++++++ Add New Row in email +++++++++++++
            $('.email_tbody').on('click','.addRow_email', function(){
                console.log('new Email inputField was added');
                var tr =`<tr>
                            <td class="col-md-12 p-0">
                                <input  type="text" class="form-control" placeholder="@lang('lang.email')" name="email[]"
                                        value="{{ old('email') }}" required >
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                            </td>
                            <td class="col-md-6">
                                <a href="javascript:void(0)" class="btn btn-xs btn-danger deleteRow_email" type="button">
                                    <i class="fa fa-close"></i>
                                </a>
                            </td>
                        </tr>`;
                $('.email_tbody').append(tr);
            });
            // +++++++++++++ Delete Row in email +++++++++++++
            $('.email_tbody').on('click','.deleteRow_email',function(){
                $(this).parent().parent().remove();
            });
        });
   </script>

@endsection
