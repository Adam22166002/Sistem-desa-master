@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Desa
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-animate">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Desa</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('superadmin.desas.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('superadmin.desa.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
