@extends('layouts.master')
@section('css')
    @section('title')
        {{trans('main_trans.add_student')}}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('Student_trans.add_student') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('main_trans.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('Student_trans.add_student') }}</li>
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
                {{-- +++++++++++++++++++++++ Error +++++++++++++++++++++++ --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- +++++++++++++++++++++++ Store Form +++++++++++++++++++++++ --}}
                <form method="post"  action="{{ route('Student.store') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Student_trans.personal_information')}}</h6><br>
                        <div class="row">
                            {{-- ++++++++++++++++++++++++++++++ name_ar inputField ++++++++++++++++++++++++++++++ --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Student_trans.name_ar')}} : <span class="text-danger">*</span></label>
                                    <input  type="text" name="name_ar"  class="form-control" value="{{ old('name_ar') }}">
                                </div>
                            </div>
                            {{-- ++++++++++++++++++++++++++++++ name_en inputField ++++++++++++++++++++++++++++++ --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Student_trans.name_en')}} : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="name_en" type="text" value="{{ old('name_en') }}" >
                                </div>
                            </div>
                        </div>
                        {{-- ++++++++++++++++++++++++++++++ email inputField ++++++++++++++++++++++++++++++ --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Student_trans.email')}} : </label>
                                    <input type="email"  name="email" class="form-control" value="{{ old('email') }}">
                                </div>
                            </div>
                            {{-- ++++++++++++++++++++++++++++++ password inputField ++++++++++++++++++++++++++++++ --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Student_trans.password')}} :</label>
                                    <input  type="password" name="password" class="form-control" value="{{ old('password') }}" >
                                </div>
                            </div>
                            {{-- ++++++++++++++++++++++++++++++ gender Selectbox ++++++++++++++++++++++++++++++ --}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">{{trans('Student_trans.gender')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="gender_id" value="{{ old('gender_id') }}">
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                        @foreach($Genders as $Gender)
                                            <option  value="{{ $Gender->id }}">{{ $Gender->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- ++++++++++++++++++++++++++++++ Nationality Selectbox ++++++++++++++++++++++++++++++ --}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nal_id">{{trans('Student_trans.Nationality')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="nationalitie_id">
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                        @foreach($nationals as $nal)
                                            <option  value="{{ $nal->id }}">{{ $nal->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- ++++++++++++++++++++++++++++++ Blood Selectbox ++++++++++++++++++++++++++++++ --}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bg_id">{{trans('Student_trans.blood_type')}} : </label>
                                    <select class="custom-select mr-sm-2" name="blood_id">
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                        @foreach($bloods as $bg)
                                            <option value="{{ $bg->id }}">{{ $bg->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- ++++++++++++++++++++++++++++++ Date_of_Birth inputField ++++++++++++++++++++++++++++++ --}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('Student_trans.Date_of_Birth')}}  :</label>
                                    <input class="form-control" type="text"  id="datepicker-action" name="Date_Birth" value="YYY-mm-dd" data-date-format="yyyy-mm-dd">
                                </div>
                            </div>
                        </div>
                        {{-- ++++++++++++++++++++++++++++++ Grade Selectbox ++++++++++++++++++++++++++++++ --}}
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Student_trans.Student_information')}}</h6><br>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Grade_id">{{trans('Student_trans.Grade')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Grade_id">
                                        <option selected disabled>{{trans('Student_trans.Choose')}}...</option>
                                        @foreach($my_grades as $c)
                                            <option  value="{{ $c->id }}">{{ $c->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- ++++++++++++++++++++++++++++++ classrooms Selectbox ++++++++++++++++++++++++++++++ --}}
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Classroom_id">{{trans('Student_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Classroom_id">

                                    </select>
                                </div>
                            </div>
                            {{-- ++++++++++++++++++++++++++++++ section Selectbox ++++++++++++++++++++++++++++++ --}}
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="section_id">{{trans('Student_trans.section')}} : </label>
                                    <select class="custom-select mr-sm-2" name="section_id">

                                    </select>
                                </div>
                            </div>
                            {{-- ++++++++++++++++++++++++++++++ parent Selectbox ++++++++++++++++++++++++++++++ --}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="parent_id">{{trans('Student_trans.parent')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="parent_id">
                                        <option selected disabled>{{trans('Student_trans.Choose')}}...</option>
                                       @foreach($parents as $parent)
                                            <option value="{{ $parent->id }}">{{ $parent->Name_Father }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- ++++++++++++++++++++++++++++++ academic_year Selectbox ++++++++++++++++++++++++++++++ --}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{trans('Student_trans.academic_year')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year">
                                        <option selected disabled>{{trans('Student_trans.Choose')}}...</option>
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option value="{{$year}}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div><br>
                        {{-- ++++++++++++++++++++++++++++++++ Photos inputField ++++++++++++++++++++++++++++++++ --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">{{trans('Student_trans.Attachments')}} : <span class="text-danger">*</span></label>
                                <input type="file" accept="image/*" name="photos[]" multiple>
                            </div>
                        </div>
                        {{-- ++++++++++++++++++++++++++++++++ submit button ++++++++++++++++++++++++++++++++ --}}
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Student_trans.submit')}}</button>
                    </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    {{-- ++++++++++++++++++++ Classrooms Selectbox ++++++++++++++++++++ --}}
    <script>
        $(document).ready(function(){
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
            // ++++++++++++ getsections() : Get "all sections" According to selected "class" selectbox ++++++++++++
            // on change on "selectbox with name='Grade_id' " , Execute The following function
            $('select[name="Classroom_id"]').on('change', function(){
                var Class_id = $(this).val(),
                    Grade_id = $('select[name=Grade_id]').val();

                if( Class_id )
                {
                    $.ajax({
                        url:"/sections/"+Class_id+"/"+Grade_id,
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
        });
   </script>

@endsection
