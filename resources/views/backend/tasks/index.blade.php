@extends('backend.inc.master')

@section('title', 'All Tasks')

@section('content')
<section id="tasks-list">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Tasks</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <div class="mb-2">
                            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create New Task</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Assigned To</th>
                                        <th>Assigned By</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td>{{ $task->title }}</td>
                                            <td>{!! $task->description !!}</td>
                                            <td>{{ $task->assignedTo->name }}</td>
                                            <td>{{ $task->assignedBy->name }}</td>
                                            <td>
                                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                                <!-- Trigger the modal with a button -->
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $task->id }}">
                                                    Delete
                                                </button>

                                                <!-- Delete Confirmation Modal -->
                                                <div class="modal fade text-left" id="deleteModal{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $task->id }}" aria-hidden="true">
                                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-danger white">
                                                                    <h4 class="modal-title" id="deleteModalLabel{{ $task->id }}">Confirm Delete!</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h5>Are you sure you want to delete this task?</h5>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- End of Delete Confirmation Modal -->

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $tasks->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
