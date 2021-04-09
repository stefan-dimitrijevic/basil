@extends('layouts.admin')

@section('content')
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title">User Activities</h2>
        </div>
    </div>
    <div class="content">
        <div class="row admin-content">
            <div class="col-sm-7 col-md-5 col-lg-7 col-xl-5 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <form action="{{ route('logs') }}">
                            <div class="form-group row">
                                <div class="col-8">
                                    <input class="form-control input-date" id="example-date-input" type="date" name="date"
                                           value="{{ $date ? $date->format('Y-m-d') : today()->format('Y-m-d') }}">
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary">Find</button>
                                </div>
                            </div>
                        </form>
                        @if(empty($logs['file']))
                            <div>
                                <h5>No logs found</h5>
                            </div>
                        @else
                            <div>
                                <h5>Updated on: <b>{{ $logs['lastModified']->format('Y-m-d h:i a') }}</b></h5>
                            </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Activity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $niz = explode('[', $logs['file']);
                                @endphp
                                @for($i = 1; $i < count($niz); $i++)
                                    <tr class="text-center">
                                        <td>{{ $i }}</td>
                                        <td>{{ substr($niz[$i], 0, 19) }}</td>
                                        <td>{{ substr($niz[$i], 33) }}</td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
