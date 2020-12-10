@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">{{ __('Create new post') }}
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('/article') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="user_name" class="col-form-label text-md-right">Create article</label>
                                <div class="col-md-12">
                                    <textarea class="form-control " name="text" autocomplete="Create Article"></textarea>
                                </div>
                            </div>
                            <div class="input-group row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
