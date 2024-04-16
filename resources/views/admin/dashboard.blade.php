@extends('admin.master')

@section('content')
    <div class="app-content main-content">
        <div class="side-app">

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title mb-0 text-primary">Welcome, &nbsp;<span
                            class="fs-5 text-danger">{{ auth()->user()->name }}</span></h4>

                </div>

            </div>
            <!--End Page header-->

            <!-- Row-1 -->
            <div class="row">

                <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                    <a href="{{ route('jsons.index')}}">
                        <div class="card overflow-hidden dash1-card border-0 dash3">
                            <div class="card-body total">

                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <div class="">
                                            <span class="fs-14">Total Json </span>

                                            <h3 class="mb-2 number-font carn1 font-weight-bold">{{ $count }}
                                                <span class="ms-1 fs-6">File</span>
                                            </h3>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
