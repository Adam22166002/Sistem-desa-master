@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Pelaku Umkm Desa
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-animate">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Pelaku Umkm Desa</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('admin_desa.pelaku-umkm-desa.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('admin_desa.pelaku-umkm-desa.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
