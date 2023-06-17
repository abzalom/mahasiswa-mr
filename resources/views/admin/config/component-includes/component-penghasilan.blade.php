@error('penghasilan')
    <small class="text-danger text-bold">{{ $message }}</small>
@enderror
<form action="{{ $editpenghasilan ? '/admin/update/components' : '/admin/config/components' }}" method="post">
    @csrf
    <div class="input-group mb-3">
        <input type="hidden" name="component" value="penghasilan">
        @if ($editpenghasilan)
            <input type="hidden" name="idpenghasilan" value="{{ $editpenghasilan->id }}">
        @endif
        <input type="text" name="penghasilan" value="{{ $editpenghasilan ? $editpenghasilan->jumlah : old('penghasilan') }}" class="form-control" placeholder="Penghasilan" aria-describedby="button-penghasilan">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="button-penghasilan"><i class="fa fa-save"></i></button>
        </div>
    </div>
</form>
<table class="table table-sm table-bordered datatable-component">
    <thead>
        <tr>
            <th>#</th>
            <th>Penghasilan</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php
            $nopenghasilan = 1;
        @endphp
        @foreach ($penghasilans as $penghasilan)
            <tr>
                <td>{{ $nopenghasilan++ }}</td>
                <td>{{ $penghasilan->jumlah }}</td>
                <td class="text-center">
                    @if ($penghasilan->deleted_at)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="/admin/restore/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="penghasilan">
                                <input type="hidden" name="idpenghasilan" value="{{ $penghasilan->id }}">
                                <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-lock-open"></i></button>
                            </form>
                        </div>
                    @else
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="?penghasilan={{ $penghasilan->id }}#penghasilancard" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></a>
                            <form action="/admin/destroy/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="penghasilan">
                                <input type="hidden" name="idpenghasilan" value="{{ $penghasilan->id }}">
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-lock"></i></button>
                            </form>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
