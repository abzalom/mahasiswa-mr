<x-admin.admin-layout :web="$web">

    @if (session()->has('pesan'))
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="alert alert-default-info">
                    {{ session()->get('pesan') }}
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.profile') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h4 class="text-uppercase text-center mb-4">Edit Profile {{ auth()->user()->username }}</h4>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="adminName">Nama Lengkap</label>
                                <input type="text" name="adminName" class="form-control" id="adminName" aria-describedby="NameHelp" value="{{ auth()->user()->name }}">
                                @error('adminName')
                                    <small id="NameHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="adminUsername">Username</label>
                                <input type="text" name="adminUsername" class="form-control" id="adminUsername" aria-describedby="UsernameHelp" value="{{ auth()->user()->username }}">
                                @error('adminUsername')
                                    <small id="UsernameHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="adminEmail">Email</label>
                                <input type="text" name="adminEmail" class="form-control" id="adminEmail" aria-describedby="EmailHelp" value="{{ auth()->user()->email }}">
                                @error('adminEmail')
                                    <small id="EmailHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="adminPhone">Phone</label>
                                <input type="text" name="adminPhone" class="form-control" id="adminPhone" aria-describedby="PhoneHelp" value="{{ auth()->user()->phone }}">
                                @error('adminPhone')
                                    <small id="PhoneHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="adminImage">Image</label>
                                <br>
                                <input type="file" name="adminImage" id="adminImage" aria-describedby="ImageHelp">
                                <br>
                                @error('adminImage')
                                    <small id="ImageHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-admin.admin-layout>
