@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Sarana Ibadah Desa
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Sarana Ibadah Desa</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('superadmin.sarana-ibadah-desa.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('superadmin.sarana-ibadah-desa.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
