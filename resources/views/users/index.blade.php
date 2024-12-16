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
            <x-message></x-message>
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <th>Serial</th>
                    <th>User Name</th>
                    <th>Role Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @php
                    $serial = ($users->currentPage() - 1) * $users->perPage() + 1;
                    @endphp
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $serial++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            @if($user->roles->isEmpty())
                                <span>No Role Assigned</span>
                            @else
                                @foreach ($user->roles as $role)
                                    <span class="badge bg-success ">{{ $role->name }}</span>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <div class="flex justify-inline justify-center">
                                <div class="edit mr-2">
                                    <form action="{{ route('users.edit',$user->id) }}" method="get">
                                        <button class="btn btn-sm btn-success">Assign Role</button>
                                    </form>
                                </div>

                                {{-- <div class="delete">
                                    <form action="{{ route('users.destroy',$user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                                --}}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>
