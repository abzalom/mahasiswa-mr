@error('ketortu')
    <small class="text-danger text-bold">{{ $message }}</small>
@enderror
<form action="{{ $editketortu ? '/admin/update/components' : '/admin/config/components' }}" method="post">
    @csrf
    <div class="input-group mb-3">
        <input type="hidden" name="component" value="ketortu">
        @if ($editketortu)
            <input type="hidden" name="idketortu" value="{{ $editketortu->id }}">
        @endif
        <input type="text" name="ketortu" value="{{ $editketortu ? $editketortu->nama : old('ketortu') }}" class="form-control" placeholder="Keterangan Status" aria-describedby="button-ketortu">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="button-ketortu"><i class="fa fa-save"></i></button>
        </div>
    </div>
</form>
<table class="table table-sm table-bordered datatable-component">
    <thead>
        <tr>
            <th>#</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php
            $noketortu = 1;
        @endphp
        @foreach ($ketortus as $ketortu)
            <tr>
                <td>{{ $noketortu++ }}</td>
                <td>{{ $ketortu->nama }}</td>
                <td class="text-center">
                    @if ($ketortu->deleted_at)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="/admin/restore/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="ketortu">
                                <input type="hidden" name="idketortu" value="{{ $ketortu->id }}">
                                <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-lock-open"></i></button>
                            </form>
                        </div>
                    @else
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="?ketortu={{ $ketortu->id }}#ketortucard" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></a>
                            <form action="/admin/destroy/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="ketortu">
                                <input type="hidden" name="idketortu" value="{{ $ketortu->id }}">
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-lock"></i></button>
                            </form>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
