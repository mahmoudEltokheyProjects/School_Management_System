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
            <div class="w-100">
                {{-- +++++++++++++++++++++ "show Student" Button +++++++++++++++++++++ --}}
                <a href="{{route('Student.index')}}" class="btn btn-primary btn-md pull-left" role="button"
                    aria-pressed="true"> {{trans('main_trans.list_students')}}
                </a>
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
                        {{-- +++++++++++++++++++ name_ar inputField +++++++++++++++++++ --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('Student_trans.name_ar')}} : <span class="text-danger">*</span></label>
                                <input  type="text" name="name_ar"  class="form-control" value="{{ old('name_ar') }}">
                            </div>
                        </div>
                        {{-- +++++++++++++++++++ name_en inputField +++++++++++++++++++ --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('Student_trans.name_en')}} : <span class="text-danger">*</span></label>
                                <input  class="form-control" name="name_en" type="text" value="{{ old('name_en') }}" >
                            </div>
                        </div>
                    </div>
                    {{-- ================================ email,password inputField ================================ --}}
                    <div class="row">
                        {{-- +++++++++++++++++++++++++++++++ email array ++++++++++++++++++++++++ --}}
                        <div class="col-md-6">
                            <div class="form-group ">
                                <table class="bordered">
                                    <thead class="email_thead">
                                        <tr>
                                            <th class="text-left" style="font-weight: normal;">
                                                <label class="mb-2">
                                                    <span class="text-danger">*</span>@lang('Student_trans.email')
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
                                                        placeholder="@lang('Student_trans.email')"
                                                        name="email[]"
                                                        value="{{ old('email') }}" required >
                                                    @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </td>
                                            <td  class="col-md-6">
                                                {{-- +++++++++++++ Add New Phone Number +++++++++ --}}
                                                <a href="javascript:void(0)" class="btn btn-xs btn-primary addRow_email" type="button">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- ++++++++++++++++++++++++++++++ password inputField ++++++++++++++++++++++++++++++ --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('Student_trans.password')}} :</label>
                                <input  type="password" name="password" class="form-control" value="{{ old('password') }}" >
                            </div>
                        </div>
                    </div>
                    {{-- ================================ Gender , Nationality , regions , quarter Selectbox ================================ --}}
                    <div class="row">
                        {{-- +++++++++++++++++++ gender Selectbox +++++++++++++++++++ --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender">{{trans('Student_trans.gender')}} : <span class="text-danger">*</span></label>
                                <select class="form-control select2" name="gender_id" value="{{ old('gender_id') }}">
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($Genders as $Gender)
                                        <option  value="{{ $Gender->id }}">{{ $Gender->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- +++++++++++++++++++ Nationality Selectbox +++++++++++++++++++ --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nal_id">{{trans('Student_trans.Nationality')}} : <span class="text-danger">*</span></label>
                                <select class="form-control select2" name="nationalitie_id">
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($nationals as $nal)
                                        <option  value="{{ $nal->id }}">{{ $nal->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- +++++++++++++++++++ Blood Selectbox +++++++++++++++++++ --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bg_id">{{trans('Student_trans.blood_type')}} : </label>
                                <select class="form-control select2" name="blood_id">
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($bloods as $bg)
                                        <option value="{{ $bg->id }}">{{ $bg->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- +++++++++++++++++++ Date_of_Birth inputField +++++++++++++++++++ --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>{{trans('Student_trans.Date_of_Birth')}}  :</label>
                                <input class="form-control" type="text"  id="datepicker-action" name="Date_Birth" value="YYY-mm-dd" data-date-format="yyyy-mm-dd">
                            </div>
                        </div>
                    </div>
                    {{-- ================================ countries , states , Blood , Date_of_Birth Selectbox ================================ --}}
                    <div class="row">
                        {{-- ++++++++++++++++ countries selectbox : الدولة : (countries table) +++++++++++++++++ --}}
                        <div class="col-md-3 mb-3">
                            <label for="country-dd">@lang('Student_trans.country')</label>
                            <select id="country-dd" name="country_id" class="select2">
                                <option selected disabled>{{trans('Student_trans.Choose')}}...</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country['id'] }}">{{ $country['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- ++++++++++++++++ state selectbox : المحافظة : (states table) +++++++++++++++++ --}}
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="state-dd">@lang('Student_trans.state')</label>
                                <div class="d-flex justify-content-center">
                                    <select id="state-dd" name="state_id" class="form-control select2">
                                        <option selected disabled>{{trans('Student_trans.Choose')}}...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- ++++++++++++++++ regions selectbox : المناطق : (cities table) +++++++++++++++++ --}}
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="city-dd">@lang('Student_trans.city')</label>
                                <div class="d-flex justify-content-center">
                                    <select id="city-dd" name="city_id" class="form-control select2">
                                        <option selected disabled>{{trans('Student_trans.Choose')}}...</option>
                                    </select>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" id="add_city_btn_id" data-target="#createRegionModal">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{-- ++++++++++++++++ quarter selectbox : الاحياء +++++++++++++++++ --}}
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="quarters_id">@lang('Student_trans.quarter')</label>
                                <div class="d-flex justify-content-center">
                                    <select id="quarter-dd" name="quarter_id" class="form-control select2">
                                        <option selected disabled>{{trans('Student_trans.Choose')}}...</option>
                                    </select>
                                    {{-- add "new quarter" --}}
                                    <button type="button" class="btn btn-primary" data-toggle="modal"  id="add_quarter_btn_id"  data-target="#createQuarterModal">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- ================================ Grade Selectbox ================================ --}}
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
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-success btn-md nextBtn pull-left" type="submit">{{trans('Student_trans.submit')}}</button>
                        </div>
                    </div>
                </form>
                {{-- ++++++++++++ students Modals ++++++++++++ --}}
                @include('pages.Students.partial.modals')
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
                            $('select[name=section_id]').append('<option selected disabled">{{ trans('Student_trans.Choose') }}</option>');
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
        // ++++++++++++++++++++++++ Add New Row in "Email" inputField ++++++++++++++++++++++++
        $('.email_tbody').on('click','.addRow_email', function(){
            console.log('new Email inputField was added');
            var tr = `<tr>
                        <td class="col-md-12 p-0">
                            <input  type="text" class="form-control" placeholder="@lang('Student_trans.email')" name="email[]"
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
                    </tr> `;
            $('.email_tbody').append(tr);
        } );
        $('.email_tbody').on('click','.deleteRow_email',function(){
            $(this).parent().parent().remove();
        });
        // ++++++++++++++++++++++ Countries , State , Cities Selectbox ++++++++++++++++
        // ================ state selectbox ================
        $('#country-dd').change(function(event) {
            // Capture the selected Country value
            var idCountry = this.value;
            $('#state-dd').html('');
            $.ajax({
                url: "/students/fetch-state",
                type: 'POST',
                dataType: 'json',
                data: {country_id: idCountry,_token:"{{ csrf_token() }}"},
                success:function(response)
                {
                    console.log("+++++++++ ",response," ++++++++++");
                    $('#state-dd').html('<option value="">Select State</option>');
                    $.each(response.states,function(index, val)
                    {
                        $('#state-dd').append('<option value="'+val.id+'">'+val.name+'</option>')
                    });
                }
            })
        });
        // ================================ city selectbox ================================
        $('#state-dd').change(function(event) {
            // Capture the selected State value
            var idState = this.value;
            $('#city-dd').html('');
            $.ajax({
                url: "/students/fetch-city",
                type: 'POST',
                dataType: 'json',
                data: {state_id: idState,_token:"{{ csrf_token() }}"},
                success:function(response)
                {
                    console.log("+++++++++ ",response," ++++++++++");
                    $('#city-dd').html('<option value="">Select City</option>');
                    $.each(response.cities,function(index, val)
                    {
                        $('#city-dd').append('<option value="'+val.id+'">'+val.name+'</option>')
                    });
                }
            })
        });
        // ++++++++++++ store "state_id" in hidden inputField in "cities modal" ++++++++++
        $("#add_city_btn_id").on('click', function(){
            var state_id = $("#state-dd").val();
            $("#stateId").val(state_id);
            console.log("+++++++++++++++++++++++++++ "+state_id+" +++++++++++++++++++++++++++");
        });
        // ================================ quarter selectbox ================================
        $('#city-dd').change(function(event) {
            // Capture the selected City value
            var idCity = this.value;
            $('#quarter-dd').html('');
            $.ajax({
                url: "/students/fetch-quarter",
                type: 'POST',
                dataType: 'json',
                data: {city_id: idCity,_token:"{{ csrf_token() }}"},
                success:function(response)
                {
                    console.log("+++++++++ ",response," ++++++++++");
                    $('#quarter-dd').html('<option value="">Select Quarter</option>');
                    $.each(response.quarters,function(index, val)
                    {
                        $('#quarter-dd').append('<option value="'+val.id+'">'+val.name+'</option>')
                    });
                }
            })
        });
        // ++++++++++++ store "city_id" in hidden inputField in "cities modal" ++++++++++
        $("#add_quarter_btn_id").on('click', function(){
            var city_id = $("#city-dd").val();
            $("#cityId").val(city_id);
            console.log("+++++++++++++++++++++++++++ "+city_id+" +++++++++++++++++++++++++++");
        });
   </script>

@endsection
