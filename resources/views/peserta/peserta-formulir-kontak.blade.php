<x-peserta.peserta-layout :web="$web">

    @if (session()->has('pesan'))
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="alert alert-default-success h4">
                    {{ session()->get('pesan') }}
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-4 mx-auto">
            <div class="card">
                <div class="card-header bg-warning">
                    <h5 class="card-title text-bold">INFORMASI KONTAK</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('peserta.update.formulir.kontak') }}" method="post">
                        @csrf

                        <!-- Ayah -->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="adress">Alamat Domisi Sekarang (lengkap)</label>
                                    <textarea type="text" name="adress" value="{{ old('adress') ? old('adress') : $user->adress }}" class="form-control" id="adress" aria-describedby="alamatHelp" placeholder="Alamat domisili sekarang saat menempuh pendidikan" rows="3">{{ $user->adress }}</textarea>
                                    @error('adress')
                                        <small id="alamatHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="kab_kota_id">Kab / Kota</label>
                                    <select name="kab_kota_id" class="form-control select2bs4" id="kab_kota_id" aria-describedby="kab_kota_idHelp">
                                        <option value="">Pilih...</option>
                                        @foreach ($kabkotas as $kabkota)
                                            <option value="{{ $kabkota->id }}" {{ $user->kab_kota_id == $kabkota->id ? 'selected' : (old('kab_kota_id') == $kabkota->id ? 'selected' : '') }}>{{ str($kabkota->kab_kota . ' ' . $kabkota->nama)->title() }}</option>
                                        @endforeach
                                    </select>
                                    @error('kab_kota_id')
                                        <small id="kab_kota_idHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="kode_pos">Kode Pos</label>
                                    <input type="text" name="kode_pos" value="{{ old('kode_pos') ? old('kode_pos') : $user->kode_pos }}" class="form-control" id="kode_pos" aria-describedby="kode_posKKHelp" placeholder="Cari sendiri di google">
                                    @error('kode_pos')
                                        <small id="kode_posKKHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="phone">Nomor Telepon / WhatsApp</label>
                                    <input type="text" name="phone" value="{{ old('phone') ? old('phone') : $user->phone }}" class="form-control" id="phone" aria-describedby="phoneKKHelp" placeholder="Nomor telepon aktif">
                                    @error('phone')
                                        <small id="phoneKKHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <hr>

                            <button type="submit" class="btn btn-primary btn-block">Klik untuk update informasi kontak</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>

    </div>

</x-peserta.peserta-layout>
