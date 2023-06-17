@error('pekerjaan')
    <small class="text-danger text-bold">{{ $message }}</small>
@enderror
<form action="{{ $editpekerjaan ? '/admin/update/components' : '/admin/config/components' }}" method="post">
    @csrf
    <div class="input-group mb-3">
        <input type="hidden" name="component" value="pekerjaan">
        @if ($editpekerjaan)
            <input type="hidden" name="idpekerjaan" value="{{ $editpekerjaan->id }}">
        @endif
        <input type="text" name="pekerjaan" value="{{ $editpekerjaan ? $editpekerjaan->nama : old('pekerjaan') }}" class="form-control" placeholder="Pekerjaan" aria-describedby="button-pekerjaan">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="button-pekerjaan"><i class="fa fa-save"></i></button>
        </div>
    </div>
</form>
<table class="table table-sm table-bordered datatable-component">
    <thead>
        <tr>
            <th>#</th>
            <th>Pekerjaan</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php
            $nopekerjaan = 1;
        @endphp
        @foreach ($pekerjaans as $pekerjaan)
            <tr>
                <td>{{ $nopekerjaan++ }}</td>
                <td>{{ $pekerjaan->nama }}</td>
                <td class="text-center">
                    @if ($pekerjaan->deleted_at)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="/admin/restore/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="pekerjaan">
                                <input type="hidden" name="idpekerjaan" value="{{ $pekerjaan->id }}">
                                <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-lock-open"></i></button>
                            </form>
                        </div>
                    @else
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="?pekerjaan={{ $pekerjaan->id }}#pekerjaancard" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></a>
                            <form action="/admin/destroy/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="pekerjaan">
                                <input type="hidden" name="idpekerjaan" value="{{ $pekerjaan->id }}">
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-lock"></i></button>
                            </form>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
