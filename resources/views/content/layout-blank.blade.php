@extends('layouts/fullLayoutMaster')

@section('title', 'Layout Blank')

@section('content')

<div class="card">
  <div class="card-header">
    <a class="btn btn-primary " href="{{ route('domain.index') }}">
      All domains list
    </a>
    <a class="btn btn-primary" href="{{ route('checklist.index') }}">
      All slug list
    </a>
    <a class="btn btn-primary" href="{{ route('domain.create') }}">
      Add Domain
    </a>
    <a class="btn btn-primary" href="{{ route('checklist.create') }}">
      Add Single Slug
    </a>
    <a class="btn btn-primary" href="{{ route('checklist.import') }}">
      Import Slug
    </a>
  </div>
  <div class="row">
    <div class="col-12 p-4">
      <h4 class="mb-2">Layout Blank</h4>
      <div class="alert alert-primary" role="alert">
        <div class="alert-body">
          <strong>Info:</strong> This layout is used in Authentication & Miscellaneous page. Please check the&nbsp;<a
            class="text-primary"
            href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation/documentation-layouts.html#layout-blank"
            target="_blank">Layout blank documentation</a>&nbsp; for more details.
        </div>
      </div>
    </div>
  </div>
  @endsection