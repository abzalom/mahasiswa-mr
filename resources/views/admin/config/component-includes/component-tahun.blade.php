@error('tahun')
    <small class="text-danger text-bold">{{ $message }}</small>
@enderror
<form action="{{ $edittahun ? '/admin/update/components' : '/admin/config/components' }}" method="post">
    @csrf
    <div class="input-group mb-3">
        <input type="hidden" name="component" value="tahun">
        @if ($edittahun)
            <input type="hidden" name="idtahun" value="{{ $edittahun->id }}">
        @endif
        <input type="number" name="tahun" value="{{ $edittahun ? $edittahun->nama : old('tahun') }}" class="form-control" placeholder="Tahun" aria-describedby="button-tahun">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="button-tahun"><i class="fa fa-save"></i></button>
        </div>
    </div>
</form>
<table class="table table-sm table-bordered datatable-component">
    <thead>
        <tr>
            <th>#</th>
            <th>Tahun</th>
            <th>Aktif</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php
            $notahun = 1;
        @endphp
        @foreach ($tahuns as $tahun)
            <tr>
                <td>{{ $notahun++ }}</td>
                <td>{{ $tahun->tahun }}</td>
                <td class="text-center">
                    @if ($tahun->active)
                        <i class="far fa-check-circle fa-lg" style="color: #3d84ff;"></i>
                    @else
                        <i class="far fa-times-circle fa-lg" style="color: #f03838;"></i>
                    @endif
                </td>
                <td class="text-center">
                    @if ($tahun->deleted_at)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="/admin/restore/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="tahun">
                                <input type="hidden" name="idtahun" value="{{ $tahun->id }}">
                                <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-lock-open"></i></button>
                            </form>
                        </div>
                    @else
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="?tahun={{ $tahun->id }}#tahuncard" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></a>
                            <form action="/admin/destroy/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="tahun">
                                <input type="hidden" name="idtahun" value="{{ $tahun->id }}">
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-lock"></i></button>
                            </form>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
