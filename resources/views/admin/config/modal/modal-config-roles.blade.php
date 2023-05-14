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
                    <div class="form-group">
                        <label for="role">Role Name</label>
                        <input name="role" type="role" class="form-control" id="role" aria-describedby="roleHelp" placeholder="Role Name">
                        @error('role')
                            <small id="roleHelp" class="form-text text-muted">{{ $message }}</small>
                        @enderror
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
