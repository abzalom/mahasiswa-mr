@error('statusortu')
    <small class="text-danger text-bold">{{ $message }}</small>
@enderror
<form action="{{ $editstatusortu ? '/admin/update/components' : '/admin/config/components' }}" method="post">
    @csrf
    <div class="input-group mb-3">
        <input type="hidden" name="component" value="statusortu">
        @if ($editstatusortu)
            <input type="hidden" name="idstatusortu" value="{{ $editstatusortu->id }}">
        @endif
        <input type="text" name="statusortu" value="{{ $editstatusortu ? $editstatusortu->nama : old('statusortu') }}" class="form-control" placeholder="Hubungan Keluarga" aria-describedby="button-statusortu">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="button-statusortu"><i class="fa fa-save"></i></button>
        </div>
    </div>
</form>
<table class="table table-sm table-bordered datatable-component">
    <thead>
        <tr>
            <th>#</th>
            <th>Hubungan Keluarga</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php
            $nostatusortu = 1;
        @endphp
        @foreach ($statusortus as $statusortu)
            <tr>
                <td>{{ $nostatusortu++ }}</td>
                <td>{{ $statusortu->nama }}</td>
                <td class="text-center">
                    @if ($statusortu->deleted_at)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="/admin/restore/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="statusortu">
                                <input type="hidden" name="idstatusortu" value="{{ $statusortu->id }}">
                                <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-lock-open"></i></button>
                            </form>
                        </div>
                    @else
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="?statusortu={{ $statusortu->id }}#statusortucard" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></a>
                            <form action="/admin/destroy/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="statusortu">
                                <input type="hidden" name="idstatusortu" value="{{ $statusortu->id }}">
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-lock"></i></button>
                            </form>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
