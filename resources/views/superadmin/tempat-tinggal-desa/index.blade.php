@extends('layouts.app')

@section('template_title')
    Tempat Tinggal Desa
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @include('layouts.messages')
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tempat Tinggal Desa') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('superadmin.tempat-tinggal-desa.create') }}"
                                    class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Desa</th>
                                        <th>RT/RW</th>
                                        <th>Tahun</th>
                                        <th>Jenis Tempat Tinggal</th>
                                        <th><strong>Jumlah</strong></th>
                                        <th>Created By</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tempatTinggalDesas as $tempatTinggalDesa)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $tempatTinggalDesa->desa->nama_desa }}</td>
                                            <td>{{ $tempatTinggalDesa->rtRwDesa->rt }}/{{ $tempatTinggalDesa->rtRwDesa->rw }}
                                            </td>
                                            <td>{{ $tempatTinggalDesa->tahun }}</td>
                                            <td>{{ $tempatTinggalDesa->jenis_tempat_tinggal }}</td>
                                            <td>{{ $tempatTinggalDesa->jumlah }}</td>
                                            <td>{{ $tempatTinggalDesa->created_by }}</td>

                                            <td>
                                                <form
                                                    action="{{ route('superadmin.tempat-tinggal-desa.destroy', $tempatTinggalDesa->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('superadmin.tempat-tinggal-desa.show', $tempatTinggalDesa->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('superadmin.tempat-tinggal-desa.edit', $tempatTinggalDesa->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @include('layouts.pagination', ['paginator' => $tempatTinggalDesas])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
