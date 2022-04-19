@extends('layouts/fullLayoutMaster')

@section('title', 'Layout Blank')

@section('content')
<form method="POST" action="{{ route('domain.store') }}" id="post-form" enctype="multipart/form-data">
    @csrf

    <!-- Basic Vertical form layout section start -->
    @include('backend.domains.form')
    <!-- Basic Vertical form layout section end -->
</form>
@endsection