@extends('layouts.master')
@section('css')

    {{-- Toastr.js Nofitifcation Package --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/toastr/toastr.min.css') }}" /> --}}

    @section('title')
        {{ __('main_trans.Grades_List') }}
    @stop
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
            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> {{ trans('Grades_trans.add_Grade') }}
            </button>
            <br><br>
            {{-- ================= Table ================= --}}
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered p-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('Grades_trans.Name') }}</th>
                            <th>{{ trans('Grades_trans.Notes') }}</th>
                            <th>{{ trans('Grades_trans.Processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 0 ; @endphp
                        @foreach ( $Grades as $Grade )
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $Grade->Name }}</td>
                                <td>{{ $Grade->Notes }}</td>
                                <td>
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

@endsection
