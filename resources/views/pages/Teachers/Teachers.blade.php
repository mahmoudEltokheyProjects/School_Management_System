@extends('layouts.master')
@section('css')

@section('title')
    {{trans('main_trans.List_Teachers')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.List_Teachers')}}
@stop
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
                                <a href="{{route('Teacher.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('Teacher_trans.Add_Teacher') }}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('Teacher_trans.Name_Teacher')}}</th>
                                            <th>{{trans('Teacher_trans.Gender')}}</th>
                                            <th>{{trans('Teacher_trans.Joining_Date')}}</th>
                                            <th>{{trans('Teacher_trans.specialization')}}</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($Teachers as $Teacher)
                                            <tr>
                                                <?php $i++; ?>
                                                <td>{{ $i }}</td>
                                                <td>{{$Teacher->Name}}</td>
                                                <td>{{$Teacher->genders->Name}}</td>
                                                <td>{{$Teacher->Joining_Date}}</td>
                                                <td>{{$Teacher->specializations->Name}}</td>
                                                <td>
                                                    <a href="{{route('Teacher.edit',$Teacher->id)}}" data-toggle="modal" data-target="#edit{{ $Teacher->id }}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Teacher{{ $Teacher->id }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                            {{-- +++++++++++++++++++ delete Modal +++++++++++++++++++ --}}
                                            <div class="modal fade" id="delete_Teacher{{$Teacher->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('Teacher.destroy','test')}}" method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('Teacher_trans.Delete_Teacher') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> {{ trans('Teacher_trans.Delete_Teacher_msg') }}  "{{ $Teacher->Name }}" </p>
                                                            <input type="hidden" name="id"  value="{{$Teacher->id}}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                                                                <button type="submit"
                                                                        class="btn btn-danger">{{ trans('My_Classes_trans.submit') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                            {{-- ++++++++++++++++++++++++++++++++++ Edit Modal ++++++++++++++++++++++++++++++++++ --}}
                                            <div class="modal fade" id="edit{{ $Teacher->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                                                                {{ trans('Sections_trans.edit_Section') }}
                                                            </h5>
                                                            <button type="button" class="close"
                                                                    data-dismiss="modal"
                                                                    aria-label="Close">
                                                            <span
                                                                aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        {{-- Edit Form --}}
                                                        <div class="modal-body">
                                                            <form action="{{ route('Teacher.update', 'test') }}" method="POST">
                                                                {{ method_field('patch') }}
                                                                {{ csrf_field() }}
                                                                <div class="row">
                                                                    {{-- +++++++++++++++++ "Teacher_Name" in "Arabic" inputField +++++++++++++++++ --}}
                                                                    <div class="col-md-6">
                                                                        <label for="Name_Teacher">{{trans('Teacher_trans.Name_Teacher')}}</label>
                                                                        <input type="text"
                                                                            name="Name_ar"
                                                                            class="form-control"
                                                                            id="Name_Teacher"
                                                                            value="{{ $Teacher->getTranslation('Name', 'ar') }}">
                                                                    </div>
                                                                    {{-- +++++++++++++++++ "Teacher_Name_en" in "English" inputField +++++++++++++++++ --}}
                                                                    <div class="col-md-6">
                                                                        <label for="Name_Teacher">{{trans('Teacher_trans.Name_en')}}</label>
                                                                        <input type="text" name="Name_en" class="form-control"
                                                                                id="Name_Teacher_en"
                                                                                value="{{ $Teacher->getTranslation('Name', 'en') }}">
                                                                        {{-- ========== "Teacher id" hidden inputField ========== --}}
                                                                        <input id="id"
                                                                            type="hidden"
                                                                            name="id"
                                                                            class="form-control"
                                                                            value="{{ $Teacher->id }}">
                                                                    </div>
                                                                    {{-- +++++++++++++++++ Selectbox : Teacher : genders +++++++++++++++++ --}}
                                                                    <div class="col-md-6">
                                                                        <label for="inputName" class="control-label">
                                                                            {{ trans('Teacher_trans.Gender') }}
                                                                        </label>
                                                                        <select name="Gender_id"
                                                                                class="custom-select"
                                                                                onclick="console.log($(this).val())">
                                                                            <!-- old selected value -->
                                                                            <option
                                                                                value="{{ $Teacher->genders->id }}">
                                                                                {{ $Teacher->genders->Name }}
                                                                            </option>
                                                                            @php
                                                                                $genders = \App\Models\Gender::all();
                                                                            @endphp
                                                                            @foreach ($genders as $gender)
                                                                                @if ($Teacher->genders->Name != $gender->Name )
                                                                                    <option
                                                                                        value="{{ $gender->id }}">
                                                                                        {{ $gender->Name }}
                                                                                    </option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    {{-- +++++++++++++++++ Selectbox : Teacher : specialization +++++++++++++++++ --}}
                                                                    <div class="col-md-6">
                                                                        <label for="Specialization_id">{{trans('Teacher_trans.specialization')}}</label>
                                                                        <select class="custom-select my-1 mr-sm-2" name="Specialization_id">
                                                                            <option
                                                                                value="{{ $Teacher->specializations->id }}">
                                                                                {{ $Teacher->specializations->Name }}
                                                                            </option>
                                                                            @foreach($specializations as $specialization)
                                                                                @if ($Teacher->specializations->Name != $specialization->Name )
                                                                                    <option value="{{$specialization->id}}">{{$specialization->Name}}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    {{-- +++++++++++++++++ inputField : Joining_Date +++++++++++++++++ --}}
                                                                    <div class="col-md-6">
                                                                        <label for="title">{{trans('Teacher_trans.Joining_Date')}}</label>
                                                                        <div class='input-group date'>
                                                                            <input class="form-control" type="text" value="{{ $Teacher->Joining_Date }}" id="datepicker-action" name="Joining_Date" data-date-format="yyyy-mm-dd">
                                                                        </div>
                                                                        @error('Joining_Date')
                                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    {{-- +++++++++++++++++ inputField : Email +++++++++++++++++ --}}
                                                                    <div class="col-md-6">
                                                                        <label for="Teacher_Email">{{trans('Teacher_trans.Email')}}</label>
                                                                        <input type="email"
                                                                            name="Email"
                                                                            class="form-control"
                                                                            id="Teacher_Email"
                                                                            value="{{ $Teacher->Email }}">
                                                                    </div>
                                                                    {{-- +++++++++++++++++ inputField : Password +++++++++++++++++ --}}
                                                                    <div class="col-md-6">
                                                                        <label for="Teacher_Password">{{trans('Teacher_trans.Password')}}</label>
                                                                        <input type="password"
                                                                            name="password"
                                                                            class="form-control"
                                                                            id="Teacher_Password"
                                                                            value="">
                                                                    </div>
                                                                    {{-- +++++++++++++++++ inputField : Address +++++++++++++++++ --}}
                                                                    <div class="col-md-6">
                                                                        <label for="address">{{trans('Teacher_trans.Address')}}</label>
                                                                        <textarea class="form-control" name="Address" id="address" rows="4"></textarea>
                                                                    </div>
                                                                    <br/>
                                                                </div>
                                                                <br>
                                                                {{-- /////////////////////// Modal Footer : "Save" , "Cancel" Button ///////////////////////--}}
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                                        {{ trans('Sections_trans.Close') }}
                                                                    </button>
                                                                    <button type="submit" class="btn btn-danger">{{ trans('Sections_trans.submit') }}</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
