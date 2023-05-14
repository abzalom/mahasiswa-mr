<x-koordinator.koordinator-layout :web="$web">

    @if (session()->has('pesan'))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-default-info">
                    {{ session()->get('pesan') }}
                </div>
            </div>
        </div>
    @endif



    <div class="row">
        <div class="col-3">
            @error('image')
                <div class="alert alert-default-danger">
                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Error: {{ $message }}
                </div>
            @enderror
            <div class="card">
                <form action="{{ route('koordinator.image') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image" id="image" onchange="this.form.submit()" hidden>
                    <a href="#" onclick="getElementById('image').click()">
                        @if (auth()->user()->image)
                            @if (File::exists('images/' . auth()->user()->image))
                                <img src="{{ asset('images/' . auth()->user()->image) }}" class="card-img-top" alt="{{ auth()->user()->username }}">
                            @else
                                <img src="/vendors/adminlte3/dist/img/user2-160x160.jpg" class="card-img-top" alt="{{ auth()->user()->username }}">
                            @endif
                        @else
                            <img src="/vendors/adminlte3/dist/img/user2-160x160.jpg" class="card-img-top" alt="{{ auth()->user()->username }}">
                        @endif
                    </a>
                </form>
                <div class="card-body">
                    <h3>{{ str(auth()->user()->name)->title() }}</h3>
                    <p class="card-text">Klik pada gambar untuk upload foto profile</p>
                </div>
            </div>
        </div>
        <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    {{-- {{ Hash::make('password') }} --}}
                    <form action="{{ route('koordinator.profile') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ auth()->user()->name ?? old('name') }}" aria-describedby="nameHelp" placeholder="Nama Lengkap">
                                @error('name')
                                    <small id="nameHelp" class="form-text text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="username">username <small class="text-muted font-italic">(gunakan untuk login)</small></label>
                                <input type="text" name="username" class="form-control" id="username" value="{{ auth()->user()->username ?? old('username') }}" aria-describedby="usernameHelp" placeholder="Username">
                                @error('username')
                                    <small id="usernameHelp" class="form-text text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ auth()->user()->email ?? old('email') }}" aria-describedby="emailHelp" placeholder="nama@email.com">
                                @error('email')
                                    <small id="emailHelp" class="form-text text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-6 mb-5">
                                <label for="phone">Telepon Aktif</label>
                                <input type="text" name="phone" class="form-control" id="phone" value="{{ auth()->user()->phone ?? old('phone') }}" aria-describedby="phoneHelp" placeholder="0812XXX">
                                @error('phone')
                                    <small id="phoneHelp" class="form-text text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <p>Abaikan field password, jika tidak ingin menganti password!</p>
                            <div class="form-group col-6">
                                <label for="password-lama">Password Lama</label>
                                <input type="password" name="password" class="form-control" id="password-lama" aria-describedby="passwordLamaHelp" placeholder="Password Lama">
                                @error('password')
                                    <small id="passwordLamaHelp" class="form-text text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="password-baru">Password Baru</label>
                                <input type="password" name="new_password" class="form-control" id="password-baru" aria-describedby="passwordBaruHelp" placeholder="Password Baru">
                                @error('password_baru')
                                    <small id="passwordBaruHelp" class="form-text text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>






</x-koordinator.koordinator-layout>
