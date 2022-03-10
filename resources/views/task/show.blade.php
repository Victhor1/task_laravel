<x-layout>
    
    <div class="container py-5 h-100">
        
        @if(Session::has('status'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{Session::get('status')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{route('logs.store')}}" method="POST" class="d-flex justify-content-between align-items-center bg-dark text-white p-4 mb-4 bd-highlight">
            @csrf
            <div class="form-outline form-white w-100 bd-highlight me-4">
                <textarea name="comment" rows="2" class="form-control form-control-lg" placeholder="Comment" autofocus></textarea>
                <span class="text-danger">
                    @error('comment') {{$message}} @enderror
                </span>
            </div>
            <input type="hidden" name="task" value="{{$task->id}}">
            <button class="btn btn-primary flex-shrink-1 bd-highlight" type="submit">
                Save log
            </button>
        </form>

        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>Comment</th>
                    <th>Date</th>
                    <th>By user</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($task->logs as $log)
                <tr>
                    <td>{{$log->comment}}</td>
                    <td>{{\Carbon\Carbon::createFromTimeStamp(strtotime($log->created_at))->diffForHumans()}}</td>
                    <td>{{$log->user->name}}</td>
                </tr>
                @empty
                <tr>Empty!</tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-layout>