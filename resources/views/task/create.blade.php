<x-layout>

    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <form action="{{route('tasks.store')}}" method="POST" class="mt-2">
                            @csrf
                            <div class="mb-md-5 mt-md-4">
                                <h2 class="fw-bold mb-4 text-uppercase">New Task</h2>
                                <div class="form-outline form-white mb-4">
                                    <textarea name="description" rows="5" class="form-control form-control-lg" autofocus placeholder="Description"></textarea>
                                    <span class="text-danger">
                                        @error('description') {{$message}} @enderror
                                    </span>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="datetime-local" name="date" class="form-control form-control-lg">
                                    <span class="text-danger">
                                        @error('date') {{$message}} @enderror
                                    </span>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <select name="user" class="form-control form-control-lg">
                                        <option value="">Select a user</option>
                                        @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>    
                                        @endforeach
                                    </select>
                                    <span class="text-danger">
                                        @error('user') {{$message}} @enderror
                                    </span>
                                </div>
                                <button class="btn btn-outline-light btn-lg px-5" type="submit">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-layout>