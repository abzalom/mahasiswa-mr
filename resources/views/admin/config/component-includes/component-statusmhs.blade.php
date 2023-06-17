@error('statusmhs')
    <small class="text-danger text-bold">{{ $message }}</small>
@enderror
<form action="{{ $editstatusmhs ? '/admin/update/components' : '/admin/config/components' }}" method="post">
    @csrf
    <div class="input-group mb-3">
        <input type="hidden" name="component" value="statusmhs">
        @if ($editstatusmhs)
            <input type="hidden" name="idstatusmhs" value="{{ $editstatusmhs->id }}">
        @endif
        <input type="text" name="statusmhs" value="{{ $editstatusmhs ? $editstatusmhs->nama : old('statusmhs') }}" class="form-control" placeholder="Status Mahasiswa" aria-describedby="button-statusmhs">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="button-statusmhs"><i class="fa fa-save"></i></button>
        </div>
    </div>
</form>
<table class="table table-sm table-bordered datatable-component">
    <thead>
        <tr>
            <th>#</th>
            <th>Status Mahasiswa</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php
            $nostatusmhs = 1;
        @endphp
        @foreach ($statusmhss as $statusmhs)
            <tr>
                <td>{{ $nostatusmhs++ }}</td>
                <td>{{ $statusmhs->nama }}</td>
                <td class="text-center">
                    @if ($statusmhs->deleted_at)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="/admin/restore/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="statusmhs">
                                <input type="hidden" name="idstatusmhs" value="{{ $statusmhs->id }}">
                                <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-lock-open"></i></button>
                            </form>
                        </div>
                    @else
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="?statusmhs={{ $statusmhs->id }}#statusmhscard" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></a>
                            <form action="/admin/destroy/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="statusmhs">
                                <input type="hidden" name="idstatusmhs" value="{{ $statusmhs->id }}">
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-lock"></i></button>
                            </form>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
