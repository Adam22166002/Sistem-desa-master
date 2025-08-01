<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2">
            <label for="id_kategori" class="form-label">{{ __('Kategori') }}</label>
            <select name="id_kategori" id="id_kategori" class="form-control select2 @error('id_kategori') is-invalid @enderror">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id }}"
                    {{ old('id_kategori', $saranaKesehatanDesa?->id_kategori) == $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->nama }}
                </option>
                @endforeach
            </select>
            {!! $errors->first('id_kategori', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="desa_id" class="form-label">{{ __('Desa') }}</label>
            <select name="desa_id" id="desa_id" class="form-control select2 @error('desa_id') is-invalid @enderror">
                <option value="">-- Pilih Desa --</option>
                @foreach ($desas as $item)
                <option value="{{ $item->id }}"
                    {{ old('desa_id', $saranaKesehatanDesa?->desa_id) == $item->id ? 'selected' : '' }}>
                    {{ $item->nama_desa }}
                </option>
                @endforeach
            </select>
            {!! $errors->first('desa_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="rt_rw_desa_id">RT/RW</label>
            <select name="rt_rw_desa_id" id="rt_rw_desa_id" class="form-control" required>
                <option value="">-- Pilih RT/RW --</option>
            </select>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tahun" class="form-label">{{ __('Tahun') }}</label>
            <input type="number" name="tahun" class="form-control @error('tahun') is-invalid @enderror"
                value="{{ old('tahun', $saranaKesehatanDesa?->tahun) }}" id="tahun" placeholder="Contoh: 2025" min="1900" max="{{ date('Y') + 5 }}">
            {!! $errors->first('tahun', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="jenis_sarana" class="form-label">{{ __('Jenis Sarana') }}</label>
            <select name="jenis_sarana" class="form-control @error('jenis_sarana') is-invalid @enderror"
                id="jenis_sarana">
                <option value="">-- Pilih Jenis Lansia --</option>
                <option value="Puskesmas"
                    {{ old('jenis_sarana', $saranaKesehatanDesa?->jenis_sarana) == 'Puskesmas' ? 'selected' : '' }}>
                    Puskesmas
                </option>
                <option value="Pustu"
                    {{ old('jenis_sarana', $saranaKesehatanDesa?->jenis_sarana) == 'Pustu' ? 'selected' : '' }}>
                    Pustu
                </option>
                <option value="Polindes"
                    {{ old('jenis_sarana', $saranaKesehatanDesa?->jenis_sarana) == 'Polindes' ? 'selected' : '' }}>
                    Polindes
                </option>
                <option value="Posyandu"
                    {{ old('jenis_sarana', $saranaKesehatanDesa?->jenis_sarana) == 'Posyandu' ? 'selected' : '' }}>
                    Posyandu
                </option>
                <option value="Posyandu Lansia"
                    {{ old('jenis_sarana', $saranaKesehatanDesa?->jenis_sarana) == 'Posyandu Lansia' ? 'selected' : '' }}>
                    Posyandu Lansia
                </option>
                <option value="Pos Kesehatan Desa"
                    {{ old('jenis_sarana', $saranaKesehatanDesa?->jenis_sarana) == 'Pos Kesehatan Desa' ? 'selected' : '' }}>
                    Pos Kesehatan Desa
                </option>
                <option value="Rumah Sakit"
                    {{ old('jenis_sarana', $saranaKesehatanDesa?->jenis_sarana) == 'Rumah Sakit' ? 'selected' : '' }}>
                    Rumah Sakit
                </option>
            </select>
            {!! $errors->first('jenis_sarana', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <input type="hidden" name="created_by" value="{{ Auth::user()->name }}">
        <input type="hidden" name="updated_by" class="form-control" value="{{ $kelembagaanDesa->updated_by ?? '-' }}">
        <input type="hidden" name="status" class="form-control" value="Arsip" id="status" placeholder="Status">

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
