@error('semester')
    <small class="text-danger text-bold">{{ $message }}</small>
@enderror
<form action="{{ $editsemester ? '/admin/update/components' : '/admin/config/components' }}" method="post">
    @csrf
    <div class="input-group mb-3">
        <input type="hidden" name="component" value="semester">
        @if ($editsemester)
            <input type="hidden" name="idsemester" value="{{ $editsemester->id }}">
        @endif
        <input type="text" name="semester" value="{{ $editsemester ? $editsemester->nama : old('semester') }}" class="form-control" placeholder="Semester" aria-describedby="button-semester">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="button-semester"><i class="fa fa-save"></i></button>
        </div>
    </div>
</form>
<table class="table table-sm table-bordered datatable-component">
    <thead>
        <tr>
            <th>#</th>
            <th>Semester</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php
            $nosemester = 1;
        @endphp
        @foreach ($semesters as $semester)
            <tr>
                <td>{{ $nosemester++ }}</td>
                <td>{{ $semester->nama }}</td>
                <td class="text-center">
                    @if ($semester->deleted_at)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="/admin/restore/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="semester">
                                <input type="hidden" name="idsemester" value="{{ $semester->id }}">
                                <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-lock-open"></i></button>
                            </form>
                        </div>
                    @else
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="?semester={{ $semester->id }}#semestercard" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></a>
                            <form action="/admin/destroy/components" method="post">
                                @csrf
                                <input type="hidden" name="component" value="semester">
                                <input type="hidden" name="idsemester" value="{{ $semester->id }}">
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-lock"></i></button>
                            </form>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
