<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Diverifikasi Oleh {{ str(auth()->user()->name)->title() }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('verification.peserta') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="peserta_id" value="{{ $peserta->id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <div class="form-group">
                        <label for="textStatus">Status Verifikasi</label>
                        <select name="status" class="form-control" id="textStatus">
                            <option value="">--Pilih--</option>
                            <option value="1">Lengkap</option>
                            <option value="2">Tidak Lengkap</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="textKet">Keterangan <small>wajib di isi oleh verifikator!</small></label>
                        <textarea name="keterangan" class="form-control summernote" id="textKet" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
