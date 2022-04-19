@extends('layouts/fullLayoutMaster')

@section('title', 'Layout Blank')

@section('content')
<form method="POST" action="{{ route('checklist.update', $checklist->id)}}" id="post-form"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!-- Basic Vertical form layout section start -->
    @include('backend.checklist.form')
    <!-- Basic Vertical form layout section end -->
</form>
@endsection