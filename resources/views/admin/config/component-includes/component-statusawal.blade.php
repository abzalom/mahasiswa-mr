@error('statusawalmhs')
    <small class="text-danger text-bold">{{ $message }}</small>
@enderror
<form action="{{ $editstatusawalmhs ? '/admin/update/components' : '/admin/config/components' }}" method="post">
    @csrf
    <div class="input-group mb-3">
        <input type="hidden" name="component" value="statusawalmhs">
        @if ($editstatusawalmhs)
            <input type="hidden" name="idstatusawalmhs" value="{{ $editstatusawalmhs->id }}">
        @endif
        <input type="text" name="statusawalmhs" value="{{ $editstatusawalmhs ? $editstatusawalmhs->nama : old('statusawalmhs') }}" class="form-control" placeholder="Status Awal" aria-describedby="button-statusawalmhs">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="button-statusawalmhs"><i class="fa fa-save"></i></button>
        </div>
    </div>
</form>
<table class="table table-sm table-bordered datatable-component">
    <thead>
        <tr>
            <th>#</th>
            <th>Status Awal Mahasiswa</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php
            $nostatusawalmhs = 1;
        @endphp
        @foreach ($statusawalmhss as $statusawalmhs)
            <tr>
                <td>{{ $nostatusawalmhs++ }}</td>
                <td>{{ $statusawalmhs->nama }}</td>
                <td class="text-center">
                    @if ($statusawalmhs->deleted_at)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="/admin/restore/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="statusawalmhs">
                                <input type="hidden" name="idstatusawalmhs" value="{{ $statusawalmhs->id }}">
                                <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-lock-open"></i></button>
                            </form>
                        </div>
                    @else
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="?statusawalmhs={{ $statusawalmhs->id }}#statusawalmhscard" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></a>
                            <form action="/admin/destroy/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="statusawalmhs">
                                <input type="hidden" name="idstatusawalmhs" value="{{ $statusawalmhs->id }}">
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-lock"></i></button>
                            </form>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
