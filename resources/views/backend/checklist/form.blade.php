<div class="card-body">
    <div class="demo-spacing-0">
        @include('partials.message')
    </div>
</div>

<section id="basic-vertical-layouts">
    <div class="row">
        <a class="btn btn-primary " href="{{ route('checklist.index') }}">
            All slug list
        </a>
        <div class="col-md-7 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $checklist->exists ? 'Edit checklist Details' : 'Add checklist Detail'
                        }}</h4>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group {{ $errors->has('domain_id') ? 'is-invalid' : '' }}">
                                <label for="first-name-vertical">Domain ID</label>
                                <input type="text" id="first-name-vertical" class="form-control" name="domain_id"
                                    placeholder="domain_id" required {{ $checklist->exists ? 'disabled' : '' }}
                                value="{{ old('domain_id', $checklist->domain_id ?? null)}}" required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter Title</div>

                                @if($errors->has('domain_id'))
                                <span class="help-block text-warning">{{ $errors->first('domain') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group {{ $errors->has('slug') ? 'is-invalid' : '' }}">
                                <label for="first-name-vertical">Slug</label>
                                <input type="text" id="first-name-vertical" class="form-control" name="slug"
                                    placeholder="slug" required
                                    value="{{ old('google_json', $checklist->slug ?? null)}}" required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter Title</div>

                                @if($errors->has('google_json'))
                                <span class="help-block text-warning">{{ $errors->first('google_json') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group {{ $errors->has('_is_bing_indexed') ? 'is-invalid' : '' }}">
                                <label for="first-name-vertical">is Bing Index</label>
                                <input type="text" id="first-name-vertical" class="form-control" name="_is_bing_indexed"
                                    placeholder="is Bing Index" required
                                    value="{{ old('_is_bing_indexed', $checklist->_is_bing_indexed ?? null)}}"
                                    required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter Title</div>

                                @if($errors->has('_is_bing_indexed'))
                                <span class="help-block text-warning">{{ $errors->first('_is_bing_indexed') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group {{ $errors->has('_is_google_indexed') ? 'is-invalid' : '' }}">
                                <label for="first-name-vertical">Is Google Index</label>
                                <input type="text" id="first-name-vertical" class="form-control"
                                    name="_is_google_indexed" placeholder="is Google Index" required
                                    value="{{ old('_is_google_indexed', $checklist->_is_google_indexed ?? null)}}"
                                    required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter Title</div>

                                @if($errors->has('_is_google_indexed'))
                                <span class="help-block text-warning">{{ $errors->first('_is_google_indexed') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-5 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Publish</h4>
                </div>
                <div class="card-body">
                    <div class="col-12">
                        <div class="col-12 ">
                            <button type="submit" class="btn btn-primary mr-1">{{ $checklist->exists ? 'Update' :
                                'Publish'
                                }}</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>