<x-admin.admin-layout :web="$web">


    @if ($errors->any())
        <div class="row">
            <div class="col-12">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header bg-gradient-primary">
                    <h3 class="card-title">Confi Role and Permission</h3>
                </div>
                <div class="card-body">

                    <div class="row mb-4">
                        @csrf
                        <div class="form-group">
                            <label for="role">Role Name</label>
                            <input name="role" type="role" class="form-control" id="role" aria-describedby="roleHelp" placeholder="Role Name">
                            @error('role')
                                <small id="roleHelp" class="form-text text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-sm">
                            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#addPanitiaModal"><i class="fas fa-user-plus"></i></button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped datatable">
                            <thead class="table-info">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Guard</th>
                                    <th>Permision</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->guard_name }}</td>
                                        <td style="width: 20%">
                                            @foreach ($role->permissions as $permission)
                                                <span class="badge badge-primary">{{ $permission->name }}</span>
                                            @endforeach
                                        </td>
                                        <td style="width: 10%">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-secondary"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </div>
    </div>


    {{-- @include('admin.config.modal.modal-config-roles') --}}

</x-admin.admin-layout>
