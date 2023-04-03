@extends('layouts.master')
@section('css')
@livewireStyles

@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    اضافة اباء
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
@livewire('add-parent')
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@livewireScripts
@endsection
<script>
function _(el) {
    return $("" + el + "");
  }

  _("#upload-field").focusout(function () {
    _("#upload-btn").addClass("focus-out");
    console.log("Hi!");
  });
  _("#upload-field").focusin(function () {
    _("#upload-btn").removeClass("focus-out");
  });
</script>
