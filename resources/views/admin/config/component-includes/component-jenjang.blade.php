<form action="{{ $editjenjang ? '/admin/update/components' : '/admin/config/components' }}" method="post">
    @csrf
    <input type="hidden" name="component" value="jenjang">
    @if ($editjenjang)
        <input type="hidden" name="idjenjang" value="{{ $editjenjang->id }}">
    @endif
    @error('jenjang')
        <small class="text-danger text-bold">{{ $message }}</small>
        <br>
    @enderror
    @error('jjgtitle')
        <small class="text-danger text-bold">{{ $message }}</small>
    @enderror
    <div class="input-group mb-3">
        <input type="text" name="jenjang" value="{{ $editjenjang ? $editjenjang->nama : old('jenjang') }}" class="form-control" style="width: 60%" placeholder="Jenjang" aria-describedby="button-jenjang">
        <input type="text" name="jjgtitle" value="{{ $editjenjang ? $editjenjang->singkat : old('jjgtitle') }}" class="form-control" style="width: 20%" placeholder="Title" aria-describedby="button-jjgtitle">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="button-jjgtitle"><i class="fa fa-save"></i></button>
        </div>
    </div>
</form>
<table class="table table-sm table-bordered datatable-component">
    <thead>
        <tr>
            <th>#</th>
            <th>Jenjang</th>
            <th>Title</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php
            $nojenjang = 1;
        @endphp
        @foreach ($jenjangs as $jenjang)
            <tr>
                <td>{{ $nojenjang++ }}</td>
                <td>{{ $jenjang->nama }}</td>
                <td>{{ $jenjang->singkat }}</td>
                <td class="text-center">
                    @if ($jenjang->deleted_at)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="/admin/restore/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="jenjang">
                                <input type="hidden" name="idjenjang" value="{{ $jenjang->id }}">
                                <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-lock-open"></i></button>
                            </form>
                        </div>
                    @else
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="?jenjang={{ $jenjang->id }}#jenjangcard" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></a>
                            <form action="/admin/destroy/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="jenjang">
                                <input type="hidden" name="idjenjang" value="{{ $jenjang->id }}">
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-lock"></i></button>
                            </form>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
