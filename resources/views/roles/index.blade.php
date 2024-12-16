<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="permission-title font-semibold">
                Roles List
            </h2>
            <a href="{{ route('roles.create') }}" class="bg-emerald-400 rounded-lg text-black px-4 py-2 hover:bg-emerald-300">Add Roles</a>
        </div>
    </x-slot>
    <div class="container mt-5">
        <div class="row">
            <x-message></x-message>
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <th>Serial</th>
                    <th>Role Name</th>
                    <th>Permissions Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @php
                    $serial = ($roles->currentPage() - 1) * $roles->perPage() + 1;
                    @endphp
                    @foreach ($roles as $role)
                    <tr>
                        <td>{{ $serial++ }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            @if($role->permissions->isEmpty())
                                <span>No Permissions Assigned</span>
                            @else
                                @foreach ($role->permissions as $permission)
                                    <span class="badge bg-success">{{ $permission->name }}</span>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <div class="flex justify-inline justify-center">
                                <div class="edit mr-2">
                                    <form action="{{ route('roles.edit',$role->id) }}" method="get">
                                        @csrf
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                    </form>
                                </div>

                                <div class="delete">
                                    <form action="{{ route('roles.destroy',$role->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $roles->links() }}
        </div>
    </div>
</x-app-layout>
