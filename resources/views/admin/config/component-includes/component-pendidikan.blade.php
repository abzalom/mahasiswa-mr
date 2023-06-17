@error('pendidikan')
    <small class="text-danger text-bold">{{ $message }}</small>
@enderror
<form action="{{ $editpendidikan ? '/admin/update/components' : '/admin/config/components' }}" method="post">
    @csrf
    <div class="input-group mb-3">
        <input type="hidden" name="component" value="pendidikan">
        @if ($editpendidikan)
            <input type="hidden" name="idpendidikan" value="{{ $editpendidikan->id }}">
        @endif
        <input type="text" name="pendidikan" value="{{ $editpendidikan ? $editpendidikan->nama : old('pendidikan') }}" class="form-control" placeholder="pendidikan" aria-describedby="button-pendidikan">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="button-pendidikan"><i class="fa fa-save"></i></button>
        </div>
    </div>
</form>
<table class="table table-sm table-bordered datatable-component">
    <thead>
        <tr>
            <th>#</th>
            <th>Pendidikan</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php
            $nopendidikan = 1;
        @endphp
        @foreach ($pendidikans as $pendidikan)
            <tr>
                <td>{{ $nopendidikan++ }}</td>
                <td>{{ $pendidikan->nama }}</td>
                <td class="text-center">
                    @if ($pendidikan->deleted_at)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="/admin/restore/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="pendidikan">
                                <input type="hidden" name="idpendidikan" value="{{ $pendidikan->id }}">
                                <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-lock-open"></i></button>
                            </form>
                        </div>
                    @else
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="?pendidikan={{ $pendidikan->id }}#pendidikancard" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></a>
                            <form action="/admin/destroy/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="pendidikan">
                                <input type="hidden" name="idpendidikan" value="{{ $pendidikan->id }}">
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-lock"></i></button>
                            </form>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
