<div class="card-body">
    <div class="demo-spacing-0">
        @include('partials.message')
    </div>
</div>

<section id="basic-vertical-layouts">
    <div class="row">
        <a class="btn btn-primary " href="{{ route('domain.index') }}">
            All domains list
        </a>
        <div class="col-md-7 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $domain->exists ? 'Edit domain Details' : 'Add domain Detail'
                        }}</h4>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group {{ $errors->has('domain') ? 'is-invalid' : '' }}">
                                <label for="first-name-vertical">Domain</label>
                                <input type="text" id="first-name-vertical" class="form-control" name="domain"
                                    placeholder="domain" required value="{{ old('domain', $domain->domain ?? null)}}"
                                    required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter Title</div>

                                @if($errors->has('domain'))
                                <span class="help-block text-warning">{{ $errors->first('domain') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group {{ $errors->has('google_json') ? 'is-invalid' : '' }}">
                                <label for="first-name-vertical">Google Json File</label>
                                <input type="file" id="first-name-vertical" class="form-control" name="google_json"
                                    placeholder="Google Json file name" required
                                    value="{{ old('google_json', $domain->google_json ?? null)}}" required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter Title</div>

                                @if($errors->has('google_json'))
                                <span class="help-block text-warning">{{ $errors->first('google_json') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group {{ $errors->has('bing_api') ? 'is-invalid' : '' }}">
                                <label for="first-name-vertical">Bing Api</label>
                                <input type="text" id="first-name-vertical" class="form-control" name="bing_api"
                                    placeholder="Bing Api" required
                                    value="{{ old('bing_api', $domain->bing_api ?? null)}}" required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter Title</div>

                                @if($errors->has('bing_api'))
                                <span class="help-block text-warning">{{ $errors->first('bing_api') }}</span>
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
                            <button type="submit" class="btn btn-primary mr-1">{{ $domain->exists ? 'Update' :
                                'Publish'
                                }}</button>
                            <button type="reset" class="btn btn-outline-secondary mr-1">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>