@error('jalurmasuk')
    <small class="text-danger text-bold">{{ $message }}</small>
@enderror
<form action="{{ $editjalur ? '/admin/update/components' : '/admin/config/components' }}" method="post">
    @csrf
    <div class="input-group mb-3">
        <input type="hidden" name="component" value="jalurmasuk">
        @if ($editjalur)
            <input type="hidden" name="idjalur" value="{{ $editjalur->id }}">
        @endif
        <input type="text" name="jalurmasuk" value="{{ $editjalur ? $editjalur->nama : old('jalurmasuk') }}" class="form-control" placeholder="Jalur masuk" aria-describedby="button-jalur-masuk">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="button-jalur-masuk"><i class="fa fa-save"></i></button>
        </div>
    </div>
</form>
<table class="table table-sm table-bordered datatable-component">
    <thead>
        <tr>
            <th>#</th>
            <th>Jalur Masuk</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php
            $nojalur = 1;
        @endphp
        @foreach ($jalurmasuks as $jalur)
            <tr>
                <td>{{ $nojalur++ }}</td>
                <td>{{ $jalur->nama }}</td>
                <td class="text-center">
                    @if ($jalur->deleted_at)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="/admin/restore/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="jalurmasuk">
                                <input type="hidden" name="idjalur" value="{{ $jalur->id }}">
                                <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-lock-open"></i></button>
                            </form>
                        </div>
                    @else
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="?jalur={{ $jalur->id }}#jalurmasukcard" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></a>
                            <form action="/admin/destroy/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="jalurmasuk">
                                <input type="hidden" name="idjalur" value="{{ $jalur->id }}">
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-lock"></i></button>
                            </form>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
