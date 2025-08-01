@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Industri Penghasil Limbah Desa
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Industri Penghasil Limbah Desa</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST"
                            action="{{ route('admin_desa.industri-penghasil-limbah-desa.update', $industriPenghasilLimbahDesa->id) }}"
                            role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin_desa.industri-penghasil-limbah-desa.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
