@extends('backend.inc.master')

@section('title', 'Create New Task')

@section('content')
<section id="task-form">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add New Task</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form row" action="{{ route('tasks.store') }}" method="post">
                            @csrf

                            <div class="form-group col-md-12 mb-2">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title" class="form-control" placeholder="Task Title" name="title" >
                            </div>

                            <div class="form-group col-md-12 mb-2">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" class="form-control" placeholder="Task Description" name="description" rows="4" ></textarea>
                            </div>

                            <div class="form-group col-md-6 mb-2">
                                <label for="assigned_to_id" class="form-label">Assigned To</label>
                                <select class="form-control" name="assigned_to_id" id="assigned_to_id" required>
                                    <option value="">Select User</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6 mb-2">
                                <label for="assigned_by_id" class="form-label">Assigned By</label>
                                <select class="form-control" name="assigned_by_id" id="assigned_by_id" required>
                                    <option value="">Select Admin</option>
                                    @foreach($admins as $admin)
                                        <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-actions right p-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check-square-o"></i> Save
                                </button>
                                <a href="{{ route('tasks.index') }}" class="btn btn-warning mr-1">
                                    <i class="feather icon-x"></i> Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
