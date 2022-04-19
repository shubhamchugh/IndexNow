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
</div>
<div class="row">
    <div class="col-12 p-4">
        <h4 class="mb-2">Layout Blank</h4>

        @include('partials.message')



        <form action="{{ route('checklist.import.upload') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <div class="form-group {{ $errors->has('checklistscsv') ? 'is-invalid' : '' }}">
                    <label for="first-name-vertical">checklists File</label>
                    <input type="file" id="first-name-vertical" class="form-control" name="checklistscsv"
                        placeholder="CheckList Csv File" required
                        value="{{ old('checklistscsv', $domain->checklistscsv ?? null)}}" required />
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please enter Title</div>

                    @if($errors->has('checklistscsv'))
                    <span class="help-block text-warning">{{ $errors->first('checklistscsv') }}</span>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-outline-secondary mr-1">Upload</button>

        </form>

    </div>
</div>

@endsection