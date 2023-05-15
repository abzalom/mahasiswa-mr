<x-admin.admin-layout :web="$web">


    @if (session()->has('pesan'))
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="alert alert-default-info">
                    {{ session()->get('pesan') }}
                </div>
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

                    <form action="{{ $edit ? route('admin.edit.panitia') : route('admin.store.panitia') }}" method="post">
                        @csrf
                        <div class="row mb-4">
                            <div class="form-group col-sm-3">
                                <label for="panitiaName">Nama Lengkap</label>
                                <input type="text" name="panitiaName" class="form-control" id="panitiaName" aria-describedby="NameHelp" value="{{ old('panitiaName') ? old('panitiaName') : $editPanitia['name'] }}" placeholder="Nama Lengkap">
                                @error('panitiaName')
                                    <small id="NameHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="panitiaUsername">Username</label>
                                <input type="text" name="panitiaUsername" class="form-control" id="panitiaUsername" aria-describedby="UsernameHelp" value="{{ old('username') ? old('username') : $editPanitia['username'] }}" placeholder="Username">
                                @error('panitiaUsername')
                                    <small id="UsernameHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            @if ($edit)
                                <input type="hidden" name="id" value="{{ $editPanitia->id }}">
                                <div class="form-group col-sm-3">
                                    <label for="panitiaEmail">Email</label>
                                    <input type="text" name="panitiaEmail" class="form-control" id="panitiaEmail" aria-describedby="EmailHelp" value="{{ old('email') ? old('email') : $editPanitia['email'] }}" placeholder="email">
                                    @error('panitiaEmail')
                                        <small id="EmailHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="panitiaPhone">Phone</label>
                                    <input type="text" name="panitiaPhone" class="form-control" id="panitiaPhone" aria-describedby="PhoneHelp" value="{{ old('phone') ? old('phone') : $editPanitia['phone'] }}" placeholder="value">
                                    @error('panitiaPhone')
                                        <small id="PhoneHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            @endif
                            <div class="col-sm-12">
                                <button class="btn btn-outline-primary">Simpan</button>
                                {{-- <button class="btn btn-outline-primary" data-toggle="modal" data-target="#addPanitiaModal"><i class="fas fa-user-plus"></i></button> --}}
                            </div>
                        </div>
                    </form>

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
                                    <tr class="{{ $panitia->deleted_at ? 'alert-default-danger' : '' }}">
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
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                @if (!$panitia->deleted_at)
                                                    <form action="{{ route('admin.set.panitia') }}" method="get">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $panitia->id }}">
                                                        <button type="submit" class="btn btn-secondary btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                                                    </form>
                                                    <form action="{{ route('admin.lock.panitia') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $panitia->id }}">
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Kunci"><i class="fa fa-lock"></i></button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('admin.unlock.panitia') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $panitia->id }}">
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Kunci"><i class="fa fa-lock"></i></button>
                                                    </form>
                                                @endif
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


    @include('admin.manajament.modal.modal-add-panitia')

</x-admin.admin-layout>
