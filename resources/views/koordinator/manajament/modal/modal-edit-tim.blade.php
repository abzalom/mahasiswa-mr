<!-- Modal -->
<div class="modal fade" id="editTimModal" tabindex="-1" aria-labelledby="editTimModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-info">
                <h5 class="modal-title" id="editTimModalLabel">Edit Panitia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('koordinator.atur.peserta') }}" method="post">
                <div class="modal-body">
                    @csrf
                    @method('post')
                    <input type="hidden" name="pesertaid" id="edit-user-id">
                    <div class="form-group">
                        <label for="edit-user-panitia">Pilih Panitia</label>
                        <select name="userid[]" class="form-control select2bs4" id="edit-user-panitia" data-placeholder="Pilih..." multiple="multiple">
                            <option value=""></option>
                            @foreach ($panitias as $panitia)
                                <option value="{{ $panitia->id }}">{{ $panitia->name }}</option>
                            @endforeach
                        </select>
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
