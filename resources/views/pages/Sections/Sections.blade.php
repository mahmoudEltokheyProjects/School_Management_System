@extends('layouts.master')
@section('css')

    @section('title')
        {{ trans('Sections_trans.title_page') }}
    @stop
    {{-- +++++++++++++++ Style : checkboxes and labels inside selectbox +++++++++++++++ --}}
    <style>
        /* selectbox and dropdown style in page */
        .bootstrap-select
        {
            background-color: #84ba3f !important;
            color: #fff  !important;
            outline: none !important;
        }
        .dropdown-toggle
        {
            background-color: #84ba3f!important;
            border-color: #84ba3f !important;
            color: #fff  !important;
            outline: none !important;
            padding: 0 !important;
            padding-left: 10px !important;
            padding-right: 4px !important;
        }
        /* selectbox of show/hide columns */

            .selectBox {
            position: relative;
            }

            /* selectbox style */
            .selectBox select
            {
                width: 100%;
                padding: 0 !important;
                padding-left: 4px;
                padding-right: 4px;
                color: #fff;
                border: 1px solid #84ba3f;
                background-color: #84ba3f;
                height: 39px !important;
            }

            .overSelect {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            }

            #checkboxes {
            display: none;
            border: 1px #dadada solid;
            height: 125px;
            overflow: auto;
            padding-top: 10px;
            /* text-align: end;  */
            }

            #checkboxes label {
            display: block;
            padding: 5px;

            }

            #checkboxes label:hover {
            background-color: #ddd;
            }
            #checkboxes label span
            {
                font-weight: normal;
            }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('Sections_trans.breadcrumbs_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('main_trans.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('Sections_trans.List_Sections') }}</li>
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
                {{-- *********** "Add Section" Button *********** --}}
                <!-- اضافة قسم جديد -->
                <div class="card-body">
                    <div class="row">
                        {{-- ====================== add_section ====================== --}}
                        <div class="col-md-2">
                            <a class="button x-small col-md-12" href="#" data-toggle="modal" data-target="#exampleModal">
                                {{ trans('Sections_trans.add_section') }}
                            </a>
                        </div>
                        {{-- ====================== Show/Hide Columns ====================== --}}
                        <div class="multiselect col-md-3">
                            <div class="selectBox" onclick="showCheckboxes()">
                                <select class="form-control form-control-lg">
                                    <option> @lang('main_trans.show_hide_columns') </option>
                                </select>
                                <div class="overSelect"></div>
                            </div>

                            <div id="checkboxes">
                                {{-- +++++++++++++++++ checkbox1 : Name_class +++++++++++++++++ --}}
                                <label for="col1_id">
                                    <input type="checkbox" id="col1_id" name="col1" checked="checked" />
                                    <span>@lang('Sections_trans.Name_Section')</span> &nbsp;
                                </label>
                                {{-- +++++++++++++++++ checkbox2 : Name_Grade +++++++++++++++++ --}}
                                <label for="col2_id">
                                    <input type="checkbox" id="col2_id" name="col2" checked="checked" />
                                    <span>@lang('Sections_trans.Name_Class')</span>
                                </label>
                                {{-- +++++++++++++++++ checkbox3 : Status +++++++++++++++++ --}}
                                <label for="col3_id">
                                    <input type="checkbox" id="col3_id" name="col3" checked="checked" />
                                    <span>@lang('Sections_trans.Status')</span>
                                </label>
                                {{-- +++++++++++++++++ checkbox4 : Processes +++++++++++++++++ --}}
                                <label for="col4_id">
                                    <input type="checkbox" id="col4_id" name="col4" checked="checked" />
                                    <span>@lang('Sections_trans.Processes')</span>
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- *********** Show All Validation Errors *********** --}}
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card card-statistics h-100">
                    {{-- *********** Show Sections Table *********** --}}
                    <div class="card-body">
                        <div class="accordion gray plus-icon round">
                            {{-- Show Grades --}}
                            @foreach ($Grades as $Grade)
                                <div class="acd-group">
                                    <a href="#" class="acd-heading">{{ $Grade->Name }}</a>
                                    <div class="acd-des">
                                        <div class="row">
                                            <div class="col-xl-12 mb-30">
                                                <div class="card card-statistics h-100">
                                                    <div class="card-body">
                                                        <div class="d-block d-md-flex justify-content-between">
                                                            <div class="d-block">
                                                            </div>
                                                        </div>
                                                        {{-- +++++++++++++++++++++ Show Table +++++++++++++++++++++ --}}
                                                        <div class="table-responsive mt-15">

                                                            <table class="table center-aligned-table mb-0">
                                                                <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th class="col1">{{ trans('Sections_trans.Name_Section') }}</th>
                                                                    <th class="col2">{{ trans('Sections_trans.Name_Class') }}</th>
                                                                    <th class="col3">{{ trans('Sections_trans.Status') }}</th>
                                                                    <th class="col4">{{ trans('Sections_trans.Processes') }}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $i = 0; ?>
                                                                    @foreach ($Grade->Sections as $list_Sections)
                                                                        <tr>
                                                                            <?php $i++; ?>
                                                                            <td>{{ $i }}</td>
                                                                            <td class="col1">{{ $list_Sections->Name_Section }}</td>
                                                                            <td class="col2">{{ $list_Sections->My_classs->Name_Class }}
                                                                            </td>
                                                                            {{-- "Status" column --}}
                                                                            <td class="col3">
                                                                                @if ($list_Sections->Status === 1)
                                                                                    <label
                                                                                        class="badge badge-success">{{ trans('Sections_trans.Status_Section_AC') }}</label>
                                                                                @else
                                                                                    <label
                                                                                        class="badge badge-danger">{{ trans('Sections_trans.Status_Section_No') }}</label>
                                                                                @endif
                                                                            </td>
                                                                            <td class="col4">
                                                                                {{-- //////// Edit Button //////// --}}
                                                                                <a  href="#" class="btn btn-outline-info btn-sm" data-toggle="modal"
                                                                                    data-target="#edit{{ $list_Sections->id }}">
                                                                                    {{ trans('Sections_trans.Edit') }}
                                                                                </a>
                                                                                {{-- //////// Delete Button //////// --}}
                                                                                <a  href="#" class="btn btn-outline-danger btn-sm"
                                                                                    data-toggle="modal" data-target="#delete{{ $list_Sections->id }}">
                                                                                    {{ trans('Sections_trans.Delete') }}
                                                                                </a>
                                                                            </td>
                                                                        </tr>

                                                                        {{-- ++++++++++++++++++++++++++++++++++ Edit Modal ++++++++++++++++++++++++++++++++++ --}}
                                                                        <!--تعديل قسم جديد -->
                                                                        <div class="modal fade"
                                                                            id="edit{{ $list_Sections->id }}"
                                                                            tabindex="-1" role="dialog"
                                                                            aria-labelledby="exampleModalLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title"
                                                                                            style="font-family: 'Cairo', sans-serif;"
                                                                                            id="exampleModalLabel">
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
                                                                                        <form
                                                                                            action="{{ route('Sections.update', 'test') }}"
                                                                                            method="POST">
                                                                                            {{ method_field('patch') }}
                                                                                            {{ csrf_field() }}
                                                                                            <div class="row">
                                                                                                {{-- "Section_Name" in "Arabic" inputField --}}
                                                                                                <div class="col">
                                                                                                    <input type="text"
                                                                                                        name="Name_Section_Ar"
                                                                                                        class="form-control"
                                                                                                        value="{{ $list_Sections->getTranslation('Name_Section', 'ar') }}">
                                                                                                </div>
                                                                                                {{-- "Section_Name" in "English" inputField --}}
                                                                                                <div class="col">
                                                                                                    <input type="text"
                                                                                                        name="Name_Section_En"
                                                                                                        class="form-control"
                                                                                                        value="{{ $list_Sections->getTranslation('Name_Section', 'en') }}">
                                                                                                    {{-- "Section_id" Hidden inputField --}}
                                                                                                    <input id="id"
                                                                                                        type="hidden"
                                                                                                        name="id"
                                                                                                        class="form-control"
                                                                                                        value="{{ $list_Sections->id }}">
                                                                                                </div>

                                                                                            </div>
                                                                                            <br>

                                                                                            {{-- /////////////////////// "Grade Name" Selectbox /////////////////////// --}}
                                                                                            <div class="col">
                                                                                                <label for="inputName" class="control-label">
                                                                                                    {{ trans('Sections_trans.Name_Grade') }}
                                                                                                </label>
                                                                                                <select name="Grade_id"
                                                                                                        class="custom-select"
                                                                                                        onclick="console.log($(this).val())">
                                                                                                    <!--placeholder-->
                                                                                                    <option
                                                                                                        value="{{ $Grade->id }}">
                                                                                                        {{ $Grade->Name }}
                                                                                                    </option>
                                                                                                    @foreach ($list_Grades as $list_Grade)
                                                                                                        <option
                                                                                                            value="{{ $list_Grade->id }}">
                                                                                                            {{ $list_Grade->Name }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                            <br>
                                                                                            {{-- /////////////////////// Classrooms Selectbox /////////////////////// --}}
                                                                                            <div class="col">
                                                                                                <label for="inputName"
                                                                                                    class="control-label">{{ trans('Sections_trans.Name_Class') }}</label>
                                                                                                <select name="Class_id" class="custom-select">
                                                                                                    <option value="{{ $list_Sections->My_classs->id }}">
                                                                                                        {{ $list_Sections->My_classs->Name_Class }}
                                                                                                    </option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <br>
                                                                                            {{-- /////////////////////// Checkbox : Status /////////////////////// --}}
                                                                                            <div class="col">
                                                                                                <div class="form-check">
                                                                                                    {{-- "status" is "Active" --}}
                                                                                                    @if ($list_Sections->Status === 1)
                                                                                                        <input
                                                                                                            type="checkbox"
                                                                                                            checked
                                                                                                            class="form-check-input"
                                                                                                            name="Status"
                                                                                                            id="exampleCheck1">
                                                                                                    {{-- "status" is "dis-active" --}}
                                                                                                    @else
                                                                                                        <input
                                                                                                            type="checkbox"
                                                                                                            class="form-check-input"
                                                                                                            name="Status"
                                                                                                            id="exampleCheck1">
                                                                                                    @endif
                                                                                                    <label class="form-check-label" for="exampleCheck1">
                                                                                                        {{ trans('Sections_trans.Status') }}
                                                                                                    </label>
                                                                                                    <br>
                                                                                                    {{-- /////////////////////// teacher Selectbox /////////////////////// --}}
                                                                                                    <div class="col">
                                                                                                        <label for="inputName" class="control-label">{{ trans('Sections_trans.Name_Teacher') }}</label>
                                                                                                        <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                                                                                            {{-- Appear "All Teachers" of "Edited Section" --}}
                                                                                                            @foreach($list_Sections->teachers as $teacher)
                                                                                                                <option selected value="{{$teacher['id']}}">{{$teacher['Name']}}</option>
                                                                                                            @endforeach
                                                                                                            {{-- Appear "All Teachers" --}}
                                                                                                            @foreach($teachers as $teacher)
                                                                                                                <option value="{{$teacher->id}}">{{$teacher->Name}}</option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    {{-- /////////////////////// Modal Footer : "Save" , "Cancel" Button ///////////////////////--}}
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                                class="btn btn-secondary"
                                                                                                data-dismiss="modal">{{ trans('Sections_trans.Close') }}</button>
                                                                                        <button type="submit"
                                                                                                class="btn btn-danger">{{ trans('Sections_trans.submit') }}</button>
                                                                                    </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        {{-- ++++++++++++++++++++++++++++++++++ Delete Modal ++++++++++++++++++++++++++++++++++ --}}
                                                                        <!-- delete_modal_Section -->
                                                                        <div class="modal fade"
                                                                            id="delete{{ $list_Sections->id }}"
                                                                            tabindex="-1" role="dialog"
                                                                            aria-labelledby="exampleModalLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                                                            {{ trans('Sections_trans.delete_Section') }}
                                                                                        </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    {{-- Delete Form --}}
                                                                                    <div class="modal-body">
                                                                                        <form
                                                                                            action="{{ route('Sections.destroy', 'test') }}"
                                                                                            method="post">
                                                                                            {{ method_field('Delete') }}
                                                                                            @csrf
                                                                                            {{ trans('Sections_trans.Warning_Section') }}
                                                                                            {{-- "section_id" hidden inputField --}}
                                                                                            <input id="id" type="hidden"
                                                                                                name="id"
                                                                                                class="form-control"
                                                                                                value="{{ $list_Sections->id }}">
                                                                                            {{-- "Section_Name" inputField --}}
                                                                                            <input id="id" type="text" name="id" class="form-control" value="{{ $list_Sections->Name_Section }}" disabled>
                                                                                            {{-- +++++++++++++++++++++ "Submit" , "Close" Button +++++++++++++++++++++ --}}
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Sections_trans.Close') }}</button>
                                                                                                <button type="submit" class="btn btn-danger">{{ trans('Sections_trans.submit') }}</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

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
                            @endforeach
                        </div>
                    </div>
                    {{-- ++++++++++++++++++++++++++++++++++ Add Modal ++++++++++++++++++++++++++++++++++ --}}
                    <!-- اضافة قسم جديد -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                                        id="exampleModalLabel">
                                        {{ trans('Sections_trans.add_section') }}</h5>
                                    {{-- //////// "close" button //////// --}}
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                {{-- //////// "Store Section" Form //////// --}}
                                <div class="modal-body">
                                    <form action="{{ route('Sections.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            {{-- "Name_Section_Ar" inputField --}}
                                            <div class="col">
                                                <input type="text" name="Name_Section_Ar" class="form-control"
                                                       placeholder="{{ trans('Sections_trans.Section_name_ar') }}">
                                            </div>
                                            {{-- "Name_Section_En" inputField --}}
                                            <div class="col">
                                                <input type="text" name="Name_Section_En" class="form-control"
                                                       placeholder="{{ trans('Sections_trans.Section_name_en') }}">
                                            </div>

                                        </div>
                                        <br>

                                        {{-- ++++++++++++++++ Grades Selectbox ++++++++++++++++ --}}
                                        <div class="col">
                                            <label for="inputName"
                                                   class="control-label">{{ trans('Sections_trans.Name_Grade') }}</label>
                                            <select name="Grade_id" class="custom-select"
                                                    onchange="console.log($(this).val())">
                                                <!--placeholder-->
                                                <option value="" selected
                                                        disabled>{{ trans('Sections_trans.Select_Grade') }}
                                                </option>
                                                @foreach ($list_Grades as $list_Grade)
                                                    <option value="{{ $list_Grade->id }}">{{ $list_Grade->Name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>
                                        {{-- ++++++++++++++++ Selectbox : Sections ++++++++++++++++ --}}
                                        <div class="col">
                                            <label for="inputName"
                                                   class="control-label">{{ trans('Sections_trans.Name_Class') }}</label>
                                            <select name="Class_id" class="custom-select">

                                            </select>
                                        </div><br>
                                        {{-- +++++++++++++++++++++ Selectbox : All Teachers +++++++++++++++++++++ --}}
                                        <div class="col">
                                            <label for="inputName" class="control-label">{{ trans('Sections_trans.Name_Teacher') }}</label>
                                            <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                                @foreach($teachers as $teacher)
                                                    <option value="{{$teacher->id}}">{{$teacher->Name}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                </div>
                                {{-- //////// Submit , Close Button //////// --}}
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ trans('Sections_trans.Close') }}</button>
                                    <button type="submit"
                                            class="btn btn-danger">{{ trans('Sections_trans.submit') }}</button>
                                </div>
                                </form>
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
    {{-- ++++++++++++++++++++ Classrooms Selectbox ++++++++++++++++++++ --}}
    <script>
        $(document).ready(function () {
            // ====================================== start ==========================================
            // ++++++++++++ getclasses() : Get "all classes" According to selected "grade" selectbox ++++++++++++
            // on change on "selectbox with name='Grade_id' " , Execute The following function
            $('select[name="Grade_id"]').on('change', function () {
                // Get "grade_id" of "selected option" from "selectbox" ==> ["value" of "selected option" == "grade_id"]
                var Grade_id = $(this).val();
                // if "Grade_id" of "selected option" has value , Go to url = "/classes/Grade_id"
                if (Grade_id)
                {
                    $.ajax({
                        url: "/classes/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data)
                        {
                            console.log(data);
                            $('select[name="Class_id"]').empty();
                            // Put "All classes" on "Class Selectbox"
                            $.each(data, function (key, value) {
                                $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }
                else
                {
                    console.log('AJAX load did not work');
                }
            });
        });
        // ====================================== end ==========================================
        // ===================================== start ============================================
        // +++++++ Checkboxs and label inside selectbox +++++++
        $("input:checkbox:not(:checked)").each(function() {
                var column = "table ." + $(this).attr("name");
                $(column).hide();
            });

            $("input:checkbox").click(function(){
                var column = "table ." + $(this).attr("name");
                $(column).toggle();
            });
            // +++++++++++++++++ Checkboxs and label inside selectbox : showCheckboxes() method ++++++++++++++
            var expanded = false;
            function showCheckboxes()
            {
                var checkboxes = document.getElementById("checkboxes");
                if (!expanded) {
                    checkboxes.style.display = "block";
                    expanded = true;
                } else {
                    checkboxes.style.display = "none";
                    expanded = false;
                }
            }
        // ===================================== end ============================================
    </script>
@endsection
