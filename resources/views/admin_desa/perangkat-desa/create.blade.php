@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Perangkat Desa
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Perangkat Desa</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('admin_desa.perangkat-desa.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('admin_desa.perangkat-desa.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
