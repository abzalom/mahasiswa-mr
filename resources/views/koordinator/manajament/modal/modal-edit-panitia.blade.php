<!-- Modal -->
<div class="modal fade" id="editPanitiaModal" tabindex="-1" aria-labelledby="editPanitiaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-warning">
                <h5 class="modal-title" id="editPanitiaModalLabel">Edit Panitia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('koordinator.edit.panitia') }}" method="post">
                <div class="modal-body">
                    @csrf
                    @method('post')
                    <input type="hidden" name="id" id="edit-id">
                    <div class="form-group">
                        <label for="edit-name">Nama</label>
                        <input type="text" name="name" class="form-control" id="edit-name" aria-describedby="nameHelp" placeholder="Nama Lengkap">
                        @error('name')
                            <small id="nameHelp" class="form-text text-muted">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="edit-username">Username</label>
                        <input type="text" name="username" class="form-control" id="edit-username" aria-describedby="usernameHelp" placeholder="Username">
                        @error('username')
                            <small id="usernameHelp" class="form-text text-muted">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="edit-phone">Telepon</label>
                        <input type="text" name="phone" class="form-control" id="edit-phone" aria-describedby="phoneHelp" placeholder="0812XXXXXXXX">
                        @error('phone')
                            <small id="phoneHelp" class="form-text text-muted">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="edit-email">Email address</label>
                        <input type="email" name="email" class="form-control" id="edit-email" aria-describedby="emailHelp" placeholder="nama@phone.com">
                        @error('email')
                            <small id="emailHelp" class="form-text text-muted">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="edit-password">Password</label>
                        <small id="passwordHelp" class="form-text text-muted">Abaikan Password jika tidak ingin di ubah!</small>
                        <input type="password" name="password" class="form-control" id="edit-password" placeholder="Password">
                        @error('password')
                            <small id="passwordHelp" class="form-text text-muted">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
