<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="permission-title font-semibold">
                Users List
            </h2>
        </div>
    </x-slot>
    <div class="container mt-5">
        <div class="row">
            <div class="position">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Assign Role</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update',$user->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="name" class="mb-2">User Name</label>
                                <input type="text" name="name" id="name" placeholder="Enter role Name" class="form-control" value="{{ $user->name }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="mb-2">Assign Role</label> <br>
                                <select name="roles[]" id="role" multiple class="form-control">
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" {{ $user->roles->pluck('name')->contains($role->name) ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Assign role</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
