@extends('layouts.master')
@section('css')
    @section('title')
        {{ __('main_trans.Grades_List') }}
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
            <h4 class="mb-0"> {{ __('Grades_trans.breadcrumbs_title') }}</h4><br/>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('main_trans.Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.Grades_List') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    {{-- ========= Show All Errors of Validation ========= --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ trans($error) }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="col-xl-12 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
            <div class="row">
                {{-- ////////////// "Add Class" Button ////////////// --}}
                <div class="col-md-2">
                    <button type="button" class="button x-small col-md-12" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus"></i> {{ trans('Grades_trans.add_Grade') }}
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
                            <span>@lang('Grades_trans.Name')</span> &nbsp;
                        </label>
                        {{-- +++++++++++++++++ checkbox2 : Name_Grade +++++++++++++++++ --}}
                        <label for="col2_id">
                            <input type="checkbox" id="col2_id" name="col2" checked="checked" />
                            <span>@lang('Grades_trans.Notes')</span>
                        </label>
                        {{-- +++++++++++++++++ checkbox3 : Processes +++++++++++++++++ --}}
                        <label for="col3_id">
                            <input type="checkbox" id="col3_id" name="col3" checked="checked" />
                            <span>@lang('Grades_trans.Processes')</span>
                        </label>
                    </div>
                </div>
            </div>

            <br><br>
            {{-- ================================== Table ================================== --}}
            <div class="table-responsive">
                {{-- ====================== Show/Hide Columns ====================== --}}

                <br/><br/>
                <table id="datatable" class="table table-striped table-bordered hideShowTable p-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="col1">{{ trans('Grades_trans.Name') }}</th>
                            <th class="col2">{{ trans('Grades_trans.Notes') }}</th>
                            <th class="col3">{{ trans('Grades_trans.Processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 0 ; @endphp
                        @foreach ( $Grades as $Grade )
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="col1">{{ $Grade->Name }}</td>
                                <td class="col2">{{ $Grade->Notes }}</td>
                                <td class="col3">
                                    {{-- +++++++++++++++ Edit Button +++++++++++++++ --}}
                                    <button type="button" class="btn btn-info btn-sm"
                                            data-toggle="modal" data-target="#edit{{ $Grade->id }}"
                                                title="{{ trans('Grades_trans.Edit') }}">
                                            <i class="fa fa-edit"></i>
                                    </button>
                                    {{-- +++++++++++++++ Delete Button +++++++++++++++ --}}
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $Grade->id }}"
                                        title="{{ trans('Grades_trans.Delete') }}"><i
                                            class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            {{-- +++++++++++++++++++++++++ Edit Modal +++++++++++++++++++++++++ --}}
                            <div class="modal fade" id="edit{{ $Grade->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('Grades_trans.edit_Grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit form -->
                                            <form action="{{ route('Grades.update', 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        {{-- Arabic "Name" Label --}}
                                                        <label for="Name" class="mr-sm-2">
                                                            {{ trans('Grades_trans.stage_name_ar') }}:
                                                        </label>
                                                        {{-- Arabic "Name" InputField --}}
                                                        <input id="Name" type="text" name="Name"
                                                            class="form-control"
                                                            value="{{ $Grade->getTranslation('Name', 'ar') }}"
                                                            required>
                                                        {{-- "id" of "grade" --}}
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $Grade->id }}">
                                                    </div>
                                                    <div class="col">
                                                        {{-- English "Name" Label --}}
                                                        <label for="Name_en" class="mr-sm-2">
                                                            {{ trans('Grades_trans.stage_name_en') }}:
                                                        </label>
                                                        {{-- English "Name" InputField --}}
                                                        <input  type="text" class="form-control"
                                                                value="{{ $Grade->getTranslation('Name', 'en') }}"
                                                                name="Name_en" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1">{{ trans('Grades_trans.Notes') }}
                                                        :</label>
                                                    <textarea class="form-control" name="Notes"
                                                        id="exampleFormControlTextarea1"
                                                        rows="3">{{ $Grade->Notes }}</textarea>
                                                </div>
                                                <br><br>

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
                            {{-- +++++++++++++++++++++++++ Delete Modal +++++++++++++++++++++++++ --}}
                            <div class="modal fade" id="delete{{ $Grade->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('Grades_trans.delete_Grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('Grades.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('Grades_trans.Warning_Grade') }}
                                                {{-- "id" of "grade" --}}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $Grade->id }}">
                                                {{-- "Name" of "grade" --}}
                                                <input id="id" type="text" name="id" disabled class="form-control"
                                                    value="{{ $Grade->Name }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ trans('Grades_trans.submit') }}</button>
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
    {{-- ++++++++++++++++++++++++++++ Add Modal +++++++++++++++++++++ --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('Grades_trans.add_Grade') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('Grades.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name" class="mr-sm-2">{{ trans('Grades_trans.stage_name_ar') }}
                                    :</label>
                                <input id="Name" type="text" name="Name" class="form-control">
                            </div>
                            <div class="col">
                                <label for="Name_en" class="mr-sm-2">{{ trans('Grades_trans.stage_name_en') }}
                                    :</label>
                                <input type="text" class="form-control" name="Name_en">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{ trans('Grades_trans.Notes') }}
                                :</label>
                            <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                                rows="3"></textarea>
                        </div>
                        <br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                    <button type="submit" class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                </div>
                </form>

            </div>
        </div>
    </div>
  </div>
<!-- row closed -->
@endsection
@section('js')
  <script>
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
@endsection
