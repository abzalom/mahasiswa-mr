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
                    <h3 class="card-title">Manajemen Panitia</h3>
                </div>
                <div class="card-body">

                    <div class="row mb-4">
                        <div class="col-sm">
                            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#addPanitiaModal"><i class="fas fa-user-plus"></i></button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped datatable">
                            <thead class="table-info">
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>username</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Role</th>
                                    <th>Permision</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($panitias as $panitia)
                                    <tr>
                                        <td></td>
                                        <td>{{ $panitia->name }}</td>
                                        <td>{{ $panitia->username }}</td>
                                        <td>{{ $panitia->email }}</td>
                                        <td>{{ $panitia->phone }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($panitia->getRoleNames() as $role)
                                                    <li>
                                                        {{ $role }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <ul>
                                                @foreach ($panitia->getPermissionsViaRoles() as $permission)
                                                    <li>
                                                        {{ $permission->name }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
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


    @include('admin.manajament.modal.modal-add-panitia')

</x-admin.admin-layout>
