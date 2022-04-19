@extends('layouts/fullLayoutMaster')

@section('title', 'Layout Blank')

@section('content')
<!-- users list start -->
<section class="app-user-list">
    <!-- list section start -->
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

        @include('partials.message')

        @if (! $checklists->count())
        <section id="alerts-closable">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="demo-spacing-0">
                                <div class="alert alert-primary" role="alert">
                                    <div class="alert-body">
                                        No Record Found
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @else
        <section id="basic-datatable">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        @include('backend.checklist.table')
                    </div>
                </div>
            </div>
    </div>
</section>
<div class="d-flex">
    <div class="mx-auto">
        {{ $checklists->links() }}
    </div>
</div>
@endif
@endsection