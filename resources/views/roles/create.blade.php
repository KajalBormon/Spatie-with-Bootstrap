<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="permission-title font-semibold">
                Role Create
            </h2>
            <a href="{{ route('roles.index') }}" class="bg-emerald-400 rounded-lg text-black px-4 py-2 hover:bg-emerald-300">Back</a>
        </div>
    </x-slot>
    <div class="container mt-5">
        <div class="row">
            <div class="position">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Add Role</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('roles.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="mb-2">Role Name</label>
                                <input type="text" name="name" id="name" placeholder="Enter role Name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="permission" class="mb-2">Assign Permissions</label> <br>
                                <select name="permissions[]" id="permission" multiple class="form-control">
                                    @foreach ($permissions as $permission)
                                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <button type="submit" class="btn btn-success">Add role</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
