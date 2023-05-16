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
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header bg-gradient-primary">
                    <h3 class="card-title">Component App</h3>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>


    {{-- @include('admin.config.modal.modal-config-roles') --}}

</x-admin.admin-layout>
