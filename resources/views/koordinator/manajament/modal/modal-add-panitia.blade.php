<!-- Modal -->
<div class="modal fade" id="addPanitiaModal" tabindex="-1" aria-labelledby="addPanitiaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-green">
                <h5 class="modal-title" id="addPanitiaModalLabel">Tambah Panitia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('koordinator.set.panitia') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="add-name">Nama</label>
                        <input type="text" name="name" class="form-control"add- id="name" aria-describedby="nameHelp" placeholder="Nama Lengkap">
                        @error('name')
                            <small id="nameHelp" class="form-text text-muted">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="add-username">Username</label>
                        <input type="text" name="username" class="form-control" id="add-username" aria-describedby="usernameHelp" placeholder="Username">
                        @error('username')
                            <small id="usernameHelp" class="form-text text-muted">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="add-phone">Telepon</label>
                        <input type="text" name="phone" class="form-control" id="add-phone" aria-describedby="phoneHelp" placeholder="0812XXXXXXXX">
                        @error('phone')
                            <small id="phoneHelp" class="form-text text-muted">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="add-email">Email address</label>
                        <input type="email" name="email" class="form-control" id="add-email" aria-describedby="emailHelp" placeholder="nama@phone.com">
                        @error('email')
                            <small id="emailHelp" class="form-text text-muted">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="add-password">Password</label>
                        <input type="password" name="password" class="form-control" id="add-password" placeholder="Password">
                        @error('password')
                            <small id="passwordHelp" class="form-text text-muted">{{ $message }}</small>
                        @enderror
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
