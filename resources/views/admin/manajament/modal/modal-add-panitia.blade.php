<!-- Modal -->
<div class="modal fade" id="addPanitiaModal" tabindex="-1" aria-labelledby="addPanitiaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-gradient-green">
                <h5 class="modal-title" id="addPanitiaModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.store.panitia') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Nama Lengkap">
                            @error('name')
                                <small id="nameHelp" class="form-text text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="Username">
                            @error('username')
                                <small id="usernameHelp" class="form-text text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- <div class="form-group col-12">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="nama@email.com">
                            @error('email')
                                <small id="emailHelp" class="form-text text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            @error('password')
                                <small id="passwordHelp" class="form-text text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="role">Role</label>
                            <select name="role" class="form-control" id="role">
                                <option value="">Pilih...</option>
                                <option value="koordinator">Koordinator</option>
                                <option value="verifikator">Verifikator</option>
                            </select>
                            @error('role')
                                <small id="passwordHelp" class="form-text text-muted">{{ $message }}</small>
                            @enderror
                        </div> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
