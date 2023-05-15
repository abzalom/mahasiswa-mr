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
                    <h3 class="card-title">Confi Role and Permission</h3>
                </div>
                <div class="card-body">

                    <form action="{{ $edit ? route('admin.update.roles') : route('admin.config.roles') }}" method="post">
                        <div class="row mb-4">
                            @csrf
                            <div class="form-group col-sm-2">
                                <label for="roleName">Role Name</label>
                                @if ($users)
                                    <input type="hidden" name="name" value="{{ $getOneRole->name }}">
                                    <input type="hidden" name="guard" value="{{ $getOneRole->guard_name }}">
                                    <input name="roleName" type="text" class="form-control" id="roleName" aria-describedby="roleNameHelp" placeholder="Role Name" value="{{ $getOneRole ? $getOneRole->name : '' }}" {{ $users->count() ? 'readonly' : '' }}>
                                @else
                                    <input name="roleName" type="text" class="form-control" id="roleName" aria-describedby="roleNameHelp" placeholder="Role Name" value="{{ old('roleName') }}">
                                @endif
                                @error('roleName')
                                    <small id="roleNameHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="guardName">Guard</label>
                                <select name="guardName" class="form-control select2bs4" id="guardName" aria-describedby="guardNameHelp" data-placeholder="Permission">
                                    @if ($getOneRole)
                                        <option value="web" {{ $getOneRole->guard_name == 'web' ? 'selected' : '' }}>Web</option>
                                        <option value="peserta" {{ $getOneRole->guard_name == 'peserta' ? 'selected' : '' }}>Peserta</option>
                                    @else
                                        <option value="web">Web</option>
                                        <option value="peserta">Peserta</option>
                                    @endif
                                </select>
                                @error('guardName')
                                    <small id="guardNameHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="permissionName">Permission</label>
                                <select name="permissionName[]" class="form-control select2bs4Multiple" id="permissionName" aria-describedby="permissionNameHelp" data-placeholder="Permission" multiple="multiple">
                                    @foreach ($permissions as $permis)
                                        @php
                                            $selected = '';
                                        @endphp
                                        @if ($getOneRole)
                                            @foreach ($getOneRole->permissions()->pluck('name', 'guard_name') as $permisName)
                                                @if ($permis->name == $permisName)
                                                    @php
                                                        $selected = 'selected';
                                                    @endphp
                                                @endif
                                            @endforeach
                                            @if ($getOneRole->guard_name === $permis->guard_name)
                                                <option value="{{ $permis->name }}" {{ $selected }}>{{ str($permis->name)->title() }}</option>
                                            @endif
                                        @else
                                            <option value="{{ $permis->name }}" {{ $selected }}>{{ str($permis->name)->title() }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('permissionName')
                                    <small id="permissionNameHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#addPanitiaModal"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </form>

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
                                        <td style="width: 10%">{{ $no++ }}</td>
                                        <td style="width: 35%">{{ $role->name }}</td>
                                        <td style="width: 10%">{{ $role->guard_name }}</td>
                                        <td style="width: 30%">
                                            @foreach ($role->permissions as $permission)
                                                <span class="badge badge-primary">{{ $permission->name }}</span>
                                            @endforeach
                                        </td>
                                        <td style="width: 15%; text-align:center">
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                <form action="" method="get">
                                                    <input type="hidden" name="roleName" value="{{ $role->name }}">
                                                    <input type="hidden" name="guardName" value="{{ $role->guard_name }}">
                                                    <button type="submit" class="btn btn-secondary"><i class="fa fa-edit"></i></button>
                                                </form>
                                                <form action="{{ route('admin.destroy.roles') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="role" value="{{ $role->name }}">
                                                    <input type="hidden" name="guard" value="{{ $role->guard_name }}">
                                                    <button type="submit" onclick="return confirm('anda yakin ingin menghapus role ini?')" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
                                                </form>
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
