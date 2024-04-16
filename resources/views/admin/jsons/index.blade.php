@extends('admin.master')

@section('content')
    <div class="app-content main-content">
        <div class="side-app">

            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title mb-0 text-primary">Json Files</h4>
                </div>
                <div class="page-rightheader">
                    <div class="btn-list">

                        <a href="{{ route('jsons.create') }}" class="btn btn-primary btn-pill">
                            Add Json</a>

                    </div>
                </div>
            </div>

            <!-- Row -->
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Jsons</div>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="table-responsive">
                                    <table id="example" class="table table-bordered text-nowrap key-buttons">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">S No</th>
                                                <th class="border-bottom-0">Name</th>
                                                <th class="border-bottom-0">File</th>
                                                <th class="border-bottom-0">Export</th>
                                                <th class="border-bottom-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($jsons->count()>0)
                                                @foreach ($jsons as $index => $json)
                                                    <tr>
                                                        <td>{{ $index + 1}}</td>
                                                        <td>{{ $json->name }}</td>
                                                        <td><a href="{{asset($json->file)}} " target="_blank"><strong class="text-success">Preview</strong> </td>
                                                        <td>Export</td>
                                                        
                                                        <td class="d-flex" > 

                                                            <a href="{{ route('jsons.edit',$json->id) }}">
                                                                <button class="btn btn-success btn-sm">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                                                      </svg>
                                                                </button>
                                                            </a> &nbsp;&nbsp;

                                                            <form method="POST" action="{{ route('upload.json',$json->id)}}">
                                                                @csrf
                                                                <button class="btn btn-success btn-sm" type="submit" data-toggle="tooltip" data-placement="top" title="Export To Excel">
                                                                    
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
                                                                        <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
                                                                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                                                                      </svg>
                                                                </button>
                                                            </form>
                                                            
                                                                &nbsp;&nbsp;
                                            
                                                                <form method="POST" action="{{ route('jsons.destroy',$json->id)}}">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <a href="javascript:void();" class="btn btn-danger btn-sm  delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                                      </svg> </a>
                                                                </form>
                                                            
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                            <tr>
                                                <td colspan="4">No Json File Available</td>
                                            </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/div-->




                </div>
            </div>
            <!-- /Row -->


        </div>
    </div>
@endsection

