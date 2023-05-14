<x-koordinator.koordinator-layout :web="$web">

    @if (session()->has('pesan'))
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="alert alert-default-success">{{ session()->get('pesan') }}</div>
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
                                    <th>Peserta</th>
                                    <th>Sync</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($panitias as $panitia)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
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
                                        <td>{{ $panitia->verifikator->count() }} Peserta</td>
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
                                            <form action="{{ route('koordinator.define.peserta') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $panitia->id }}">
                                                <button class="btn btn-primary sm"><i class="fas fa-sync-alt"></i></button>
                                            </form>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-secondary btn-sm edit-panitia-button" value="{{ $panitia->id }}" data-toggle="modal" data-target="#editPanitiaModal"><i class="far fa-edit"></i></button>
                                                <button type="button" class="btn btn-warning btn-sm"><i class="fas fa-lock"></i></button>
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
                    Table User Panitia
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </div>
    </div>


    @include('koordinator.manajament.modal.modal-add-panitia')
    @include('koordinator.manajament.modal.modal-edit-panitia')

</x-koordinator.koordinator-layout>
