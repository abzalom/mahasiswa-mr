@error('jenispt')
    <small class="text-danger text-bold">{{ $message }}</small>
@enderror
<form action="{{ $editjenispt ? '/admin/update/components' : '/admin/config/components' }}" method="post">
    @csrf
    <div class="input-group mb-3">
        <input type="hidden" name="component" value="jenispt">
        @if ($editjenispt)
            <input type="hidden" name="idjenispt" value="{{ $editjenispt->id }}">
        @endif
        <input type="text" name="jenispt" value="{{ $editjenispt ? $editjenispt->nama : old('jenispt') }}" class="form-control" placeholder="Jenis Perguruan Tinggi" aria-describedby="button-jenis-pt">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="button-jenis-pt"><i class="fa fa-save"></i></button>
        </div>
    </div>
</form>
<table class="table table-sm table-bordered datatable-component">
    <thead>
        <tr>
            <th>#</th>
            <th>Jenis Perguruan Tinggi</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php
            $nojenispt = 1;
        @endphp
        @foreach ($jenispts as $jenispt)
            <tr>
                <td>{{ $nojenispt++ }}</td>
                <td>{{ $jenispt->nama }}</td>
                <td class="text-center">
                    @if ($jenispt->deleted_at)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="/admin/restore/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="jenispt">
                                <input type="hidden" name="idjenispt" value="{{ $jenispt->id }}">
                                <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-lock-open"></i></button>
                            </form>
                        </div>
                    @else
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="?jenispt={{ $jenispt->id }}#jenisptcard" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></a>
                            <form action="/admin/destroy/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="jenispt">
                                <input type="hidden" name="idjenispt" value="{{ $jenispt->id }}">
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-lock"></i></button>
                            </form>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
