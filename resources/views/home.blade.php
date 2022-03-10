<x-layout>

    <div class="container py-5 h-100">
        
        @if(Session::has('status'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{Session::get('status')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a href="{{route('tasks.create')}}" class="btn btn-primary mb-4">New Task</a>
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Date</th>
                    <th>User</th>
                    <th>Logs</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                <tr>
                    <td>{{$task->description}}</td>
                    {{-- <td>
                        {{$task->execution_date}}
                    </td> --}}

                    @if (\Carbon\Carbon::createFromTimeStamp(strtotime($task->execution_date))->isBefore(\Carbon\Carbon::now()))
                    <td class="bg-danger">
                        {{\Carbon\Carbon::createFromTimeStamp(strtotime($task->execution_date))->diffForHumans()}}
                    </td>
                    @else
                    <td>
                        {{\Carbon\Carbon::createFromTimeStamp(strtotime($task->execution_date))->diffForHumans()}}
                    </td>
                    @endif
                    
                    <td>{{$task->user->name}}</td>
                    <td>{{$task->logs->count()}}</td>
                    <td>
                        @if ($user->id == $task->user_id)
                        <a href="{{route('tasks.show', $task->id)}}" class="btn btn-success mb-2">
                            Add log
                        </a>
                        <form action="{{route('tasks.destroy', $task->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                        @else
                        <p class="btn btn-warning">Denied</p>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>Empty!</tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-layout>