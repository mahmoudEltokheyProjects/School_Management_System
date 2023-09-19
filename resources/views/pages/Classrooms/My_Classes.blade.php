@extends('layouts.master')
@section('css')
{{-- ////////// bootstrap-selectbox : css cdn ////////// --}}
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css"
      integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    @section('title')
        {{ trans('My_Classes_trans.title_page') }}
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
                <h4 class="mb-0"> {{ __('My_Classes_trans.breadcrumbs_title') }}</h4><br/>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('main_trans.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('My_Classes_trans.List_classes') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                {{-- ////////////// Validation Error ////////////// --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    {{-- ////////////// "Add Class" Button ////////////// --}}
                    <div class="col-md-3">
                        <button type="button" class="button x-small col-md-12" data-toggle="modal" data-target="#exampleModal">
                            {{ trans('My_Classes_trans.add_class') }}
                        </button>
                    </div>
                    <div class="col-md-3">
                        {{-- ////////////// "Delete_Selected_Checkbox" Button ////////////// --}}
                        <button type="button" class="button x-small col-md-12" id="btn_delete_all">
                            {{ trans('My_Classes_trans.delete_checkbox') }}
                        </button>
                    </div>
                    {{-- ====================== Show/Hide Columns ====================== --}}
                    <div class="multiselect col-md-3">
                        <div class="selectBox" onclick="showCheckboxes()">
                            <select class="form-select form-control form-control-lg">
                                <option> @lang('main_trans.show_hide_columns') </option>
                            </select>
                            <div class="overSelect"></div>
                        </div>

                        <div id="checkboxes">
                            {{-- +++++++++++++++++ checkbox1 : Name_class +++++++++++++++++ --}}
                            <label for="col1_id">
                                <input type="checkbox" id="col1_id" name="col1" checked="checked" />
                                <span>@lang('My_Classes_trans.Name_class')</span> &nbsp;
                            </label>
                            {{-- +++++++++++++++++ checkbox2 : Name_Grade +++++++++++++++++ --}}
                            <label for="col2_id">
                                <input type="checkbox" id="col2_id" name="col2" checked="checked" />
                                <span>@lang('My_Classes_trans.Name_Grade')</span>
                            </label>
                            {{-- +++++++++++++++++ checkbox3 : Processes +++++++++++++++++ --}}
                            <label for="col3_id">
                                <input type="checkbox" id="col3_id" name="col3" checked="checked" />
                                <span>@lang('My_Classes_trans.Processes')</span>
                            </label>
                        </div>
                    </div>
                    {{-- ====================== Search Selecbox ====================== --}}
                    <div class="col-md-3">
                        <form action="{{ route('Filter_Classes') }}" method="POST">
                            {{ csrf_field() }}
                            <select class="selectpicker form-control py-2" name="Grade_id" required
                                    {{-- Execute "form" When Click on "Selectbox"  --}}
                                    onchange="this.form.submit()">
                                <option value="" selected disabled>
                                    {{ trans('My_Classes_trans.Search_By_Grade') }}
                                </option>
                                @foreach ($Grades as $Grade)
                                    <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>

                <br><br>
                {{-- ++++++++++++++++++++++++++++++++++ Show "All Classes" Table ++++++++++++++++++++++++++++++++++ --}}
                <div class="table-responsive">
                    <table id="datatable" class="table table-hover table-sm table-bordered hideShowTable p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                {{-- Column 1 : Checkbox --}}
                                <th>
                                    {{-- onclick="CheckAll('box1', this)" : When Click on "checkbox" , Select "All Checkboxes" --}}
                                    <input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" />
                                </th>
                                {{-- Column 2 : ترقيم --}}
                                <th>#</th>
                                {{-- Column 3 : ClassName --}}
                                <th class="col1">{{ trans('My_Classes_trans.Name_class') }}</th>
                                {{-- Column 3 : GradeName --}}
                                <th class="col2">{{ trans('My_Classes_trans.Name_Grade') }}</th>
                                {{-- Column 4 : Processes --}}
                                <th class="col3">{{ trans('My_Classes_trans.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- ++++++++++++++++ Show "All Classes" And "Grades" in Table ++++++++++++++++ --}}
                            {{-- if Click on Search Filter : Return "Grades" And "All Classrooms" Related to "selected grade" --}}
                            @if ( isset($details) )
                                <?php $List_Classes = $details; ?>
                            @else
                            {{-- if No Click on Search Filter : Return "Grades" And "All Classrooms" --}}
                                <?php $List_Classes = $My_Classes; ?>
                            @endif

                            <?php $i = 0; ?>

                            @foreach ($List_Classes as $My_Class)
                                <tr>
                                    <?php $i++; ?>
                                    {{-- Column 1 : Checkbox --}}
                                    <td>
                                        <input type="checkbox" value="{{ $My_Class->id }}" class="box1">
                                    </td>
                                    {{-- Column 2 : ترقيم --}}
                                    <td>{{ $i }}</td>
                                    {{-- Column 3 : ClassName --}}
                                    <td class="col1">{{ $My_Class->Name_Class }}</td>
                                    {{-- Column 3 : GradeName --}}
                                    <td class="col2">{{ $My_Class->Grades->Name }}</td>
                                    {{-- Column 4 : Processes --}}
                                    <td class="col3">
                                        {{-- +++++++++++++++ Edit Button +++++++++++++++ --}}
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $My_Class->id }}"
                                            title="{{ trans('Grades_trans.Edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        {{-- +++++++++++++++ Delete Button +++++++++++++++ --}}
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $My_Class->id }}"
                                            title="{{ trans('Grades_trans.Delete') }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                {{-- ////////////// "Edit Class" Modal ////////////// --}}
                                <div class="modal fade" id="edit{{ $My_Class->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('My_Classes_trans.edit_class') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- edit_form -->
                                                <form action="{{ route('Classrooms.update', 'test') }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        {{-- ++++++++++ Arabic "class name" ++++++++++ --}}
                                                        <div class="col">
                                                            <label for="Name" class="mr-sm-2">{{ trans('My_Classes_trans.Name_class') }}:</label>
                                                            <input id="Name" type="text" name="Name"
                                                                class="form-control"
                                                                value="{{ $My_Class->getTranslation('Name_Class', 'ar') }}"
                                                                required>
                                                            {{-- Hidden InputField : "Class Id" --}}
                                                            <input id="id" type="hidden" name="id" class="form-control" value="{{ $My_Class->id }}">
                                                        </div>
                                                        {{-- ++++++++++ English "class name" ++++++++++ --}}
                                                        <div class="col">
                                                            <label for="Name_en"
                                                                class="mr-sm-2">{{ trans('My_Classes_trans.Name_class_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $My_Class->getTranslation('Name_Class', 'en') }}"
                                                                name="Name_en" required>
                                                        </div>
                                                    </div><br>
                                                    {{-- ******* "Grades" Selectbox ******* --}}
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">{{ trans('My_Classes_trans.Name_Grade') }} :</label>
                                                        <select class="form-control form-control-lg"
                                                            id="exampleFormControlSelect1" name="Grade_id">
                                                            {{-- Get "selected Grade" of "class" --}}
                                                            <option value="{{ $My_Class->Grades->id }}">
                                                                {{ $My_Class->Grades->Name }}
                                                            </option>
                                                            {{-- Show "All Grades" --}}
                                                            @foreach ($Grades as $Grade)
                                                                @if ( $Grade->Name !== $My_Class->Grades->Name)
                                                                    <option value="{{ $Grade->id }}">
                                                                        {{ $Grade->Name }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <br><br>
                                                    {{-- ******* "Modal Footer" : "Close" And "Submit" Button ******* --}}
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- ////////////// "Delete Class" Modal ////////////// --}}
                                <div class="modal fade" id="delete{{ $My_Class->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('My_Classes_trans.delete_class') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('Classrooms.destroy', 'test') }}"
                                                    method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    {{ trans('My_Classes_trans.Deleting_Process') }}
                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $My_Class->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-danger">{{ trans('My_Classes_trans.submit') }}</button>
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

    {{-- ++++++++++++++++++++++++++++++++++ "Add Class" Modal ++++++++++++++++++++++++++++++++++ --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('My_Classes_trans.add_class') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class=" row mb-30" action="{{ route('Classrooms.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="List_Classes">
                                    <div data-repeater-item>
                                        <div class="row">

                                            <div class="col">
                                                <label for="Name"
                                                    class="mr-sm-2">{{ trans('My_Classes_trans.Name_class') }}
                                                    :</label>
                                                <input class="form-control" type="text" name="Name" />
                                            </div>


                                            <div class="col">
                                                <label for="Name"
                                                    class="mr-sm-2">{{ trans('My_Classes_trans.Name_class_en') }}
                                                    :</label>
                                                <input class="form-control" type="text" name="Name_class_en" />
                                            </div>


                                            <div class="col">
                                                <label for="Name_en"
                                                    class="mr-sm-2">{{ trans('My_Classes_trans.Name_Grade') }}
                                                    :</label>

                                                <div class="box">
                                                    <select class="fancyselect" name="Grade_id">
                                                        @foreach ($Grades as $Grade)
                                                            <option value="{{ $Grade->id }}">{{ $Grade->Name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col">
                                                <label for="Name_en"
                                                    class="mr-sm-2">{{ trans('My_Classes_trans.Processes') }}
                                                    :</label>
                                                <input class="btn btn-danger btn-block" data-repeater-delete
                                                    type="button"
                                                    value="{{ trans('My_Classes_trans.delete_row') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="button" data-repeater-create type="button"
                                            value="{{ trans('My_Classes_trans.add_row') }}" />
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                    <button type="submit"
                                        class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>


            </div>

        </div>

    </div>
</div>


{{-- ++++++++++++++++++++++++++++++++++ "delete_all" Modal Form ++++++++++++++++++++++++++++++++++ --}}
<!-- حذف مجموعة صفوف -->
<div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('My_Classes_trans.delete_class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- "Deleted_Selected_Checkboxes" Form --}}
            <form action="{{ route('delete_all') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    {{ trans('My_Classes_trans.Deleting_Process') }}
                    <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ trans('My_Classes_trans.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

<script type="text/javascript">
    // +++++++++++++++++ Delete All Selected +++++++++++++++++
    $(function() {
        /* When Click on "deleted Selected" button , Select "All checkboxes"
         1- make "empty array" called "selected" ,
         2- Get "All selected_checkboxes from dataTable" And Loop on them And Store "checkedbox value" on Array ,
         3- if length of "selected array" > 0 [ There are selected_checkboxes] Then "Show delete_all_modal" ,
         4- Store "selected array" values in "hidden inputField" in "Form"

        */
        $("#btn_delete_all").click(function() {
            var selected = new Array();
            $("#datatable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });

            if (selected.length > 0) {
                $('#delete_all').modal('show')
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });
    // +++++++++++++++++ Checkboxs and label inside selectbox ++++++++++++++
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
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"
        integrity="sha512-yDlE7vpGDP7o2eftkCiPZ+yuUyEcaBwoJoIhdXv71KZWugFqEphIS3PU60lEkFaz8RxaVsMpSvQxMBaKVwA5xg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>



@endsection
