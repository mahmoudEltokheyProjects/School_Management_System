@extends('layouts.master')
@section('css')
@section('title')
    {{ trans('main_trans.Add_Parent') }}
@stop
@endsection
@section('page-header')
    {{ trans('main_trans.Add_Parent') }}
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Add New Parent </h4>
        </div>
        <div class="col-sm-6">

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
                {{-- include "add-parent.blade.php" page --}}
                @livewire('add-parent')
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    {{-- livewire script --}}
    @livewireScripts
@endsection
