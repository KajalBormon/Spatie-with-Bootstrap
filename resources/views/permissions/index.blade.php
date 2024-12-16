<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="permission-title font-semibold">
                Permission List
            </h2>
            <a href="{{ route('permissions.create') }}" class="bg-emerald-400 rounded-lg text-black px-4 py-2 hover:bg-emerald-300">Add Permission</a>
        </div>
    </x-slot>
    <div class="container mt-5">
        <div class="row">
            <x-message></x-message>
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <th>Serial</th>
                    <th>Permission Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @php
                    $serial = ($permissions->currentPage() - 1) * $permissions->perPage() + 1;
                    @endphp

                    @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $serial++ }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <div class="flex justify-inline justify-center">
                                <div class="edit mr-2">
                                    <form action="{{ route('permissions.edit',$permission->id) }}" method="get">
                                        @csrf
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                    </form>
                                </div>

                                <div class="delete">
                                    <form action="{{ route('permissions.destroy',$permission->id) }}" method="post">
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
            {{ $permissions->links() }}
        </div>
    </div>
</x-app-layout>
