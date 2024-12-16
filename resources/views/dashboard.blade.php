<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 d-flex justify-between">
                <div class="col-4">
                    <div class="card dashboard-card">
                        <div class="card-header text-center">
                            <h3>Users</h3>
                        </div>
                        <div class="card-body">
                            <div class="user-list dashboard-card-body">
                                <a href="{{ route('users.index') }}">Users List</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card dashboard-card">
                        <div class="card-header text-center">
                            <h3>Permissions</h3>
                        </div>
                        <div class="card-body">
                            <div class="user-list dashboard-card-body mb-2">
                                <a href="{{ route('permissions.index') }}">Permission List</a>
                            </div>
                            <div class="user-list dashboard-card-body">
                                <a href="{{ route('permissions.create') }}">Add Permission</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card dashboard-card">
                        <div class="card-header text-center">
                            <h3>Roles</h3>
                        </div>
                        <div class="card-body">
                            <div class="user-list dashboard-card-body mb-2">
                                <a href="{{ route('roles.index') }}">Role List</a>
                            </div>
                            <div class="user-list dashboard-card-body">
                                <a href="{{ route('roles.create') }}">Add Role</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
