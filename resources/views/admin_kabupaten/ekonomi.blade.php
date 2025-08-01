@extends('layouts.app')

@section('template_title')
    Ekonomis
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @include('layouts.messages')
                <div class="card card-animate">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ekonomis') }}
                            </span>

                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Desa</th>
                                        <th>Tahun</th>
                                        <th>Jenis</th>
                                        <th>Nama</th>
                                        <th>Pemilik</th>
                                        <th>Created By</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($ekonomis as $ekonomi)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $ekonomi->desa_id }}</td>
                                            <td>{{ $ekonomi->tahun }}</td>
                                            <td>{{ $ekonomi->jenis }}</td>
                                            <td>{{ $ekonomi->nama }}</td>
                                            <td>{{ $ekonomi->pemilik }}</td>
                                            <td>{{ $ekonomi->created_by }}</td>
                                            <td>{{ $ekonomi->status }}</td>
                                            <x-action-buttons :item="$balitaDesa" route-prefix="admin_desa.balita-desa"
                                                :ajukan-route="true" status-field="status" />
                                        </tr>
                                        @include('layouts.partials.modal.modal_ekonomi')
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Belum Ada Data Yang Diajukan.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @include('layouts.pagination', ['paginator' => $ekonomis])

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
