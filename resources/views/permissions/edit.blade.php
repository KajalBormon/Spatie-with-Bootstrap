<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="permission-title font-semibold">
                Permission Update
            </h2>
            <a href="{{ route('permissions.index') }}" class="bg-emerald-400 rounded-lg text-black px-4 py-2 hover:bg-emerald-300">Back</a>
        </div>
    </x-slot>
    <div class="container mt-5">
        <div class="row">
            <div class="position">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Update Permission</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('permissions.update',$permission->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="name" class="mb-2">Permission Name</label>
                                <input type="text" name="name" id="name" placeholder="Enter Permission Name" class="form-control" value="{{ old('name', $permission->name) }}">
                            </div>
                            <button type="submit" class="btn btn-success">Update Permission</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>