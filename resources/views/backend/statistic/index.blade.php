@extends('backend.inc.master')
@section('title' , ' All Blog ')
@section('content')
@extends('backend.inc.master')

@section('title', 'User Task Statistics')

@section('content')
<section id="statistics-list">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">User Task Statistics</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Tasks Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($statistics as $stat)
                                    <tr>
                                        <td>{{ $stat->user->name }}</td>
                                        <td>{{ $stat->tasks_count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@endsection
