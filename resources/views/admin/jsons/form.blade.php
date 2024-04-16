@extends('admin.master')

@section('content')
@extends('admin.master')

@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">

                    <h4 class="page-title mb-0 text-primary">{{ isset($json) ? 'Update' : 'Create' }} Json File</h4>
                </div>
                <div class="page-rightheader">
                    <a href="{{ route('home') }}" class="">
                        Home / </a>
                    <a href="{{ route('jsons.index') }}" class="">
                        Json Files</a>

                </div>
            </div>
        </div>
        <!--End Page header-->

        <!--Row-->
        <div class="row justify-content-center">


            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ isset($json) ? 'Update' : 'Add' }} Json</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST"
                            action="{{ isset($json) ? route('jsons.update', $json->id) : route('jsons.store') }}"
                            enctype="multipart/form-data" class="row g-3">
                            
                            @if (isset($json))
                                @method('PUT')
                            @endif
                            @csrf

                            <div class="col-md-12">
                                <label for="name" class="form-label">json Name <span class="required"> *</label>
                                <input type="name" name="name" class="form-control" id="name"
                                    value="{{ isset($json) ? $json->name : old('name') }}" required />

                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="file" class="form-label">json File @if (!isset($json))<span class="required"> *</label>@endif
                                <input type="file" name="file" class="form-control" id="file"
                                    value="{{ isset($json) ? $json->file : old('file') }}" @if (!isset($json)) required @endif/>

                                @error('file')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">
                                    {{ isset($json) ? 'Update' : 'Add' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!--/Row-->
        <!-- Row -->

        <!-- /Row -->
    </div>
    </div>
@endsection

@section('js')
@endsection

@endsection