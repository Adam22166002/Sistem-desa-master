@extends('layouts.appweb2')

@section('content')
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<!-- MarkerCluster CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.Default.css" />

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<!-- MarkerCluster JS -->
<script src="https://unpkg.com/leaflet.markercluster/dist/leaflet.markercluster.js"></script>

<div class="bg-white rounded-2xl shadow-xl p-6 mt-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Desa Dalam Peta</h2>

    <form method="GET" action="{{ route('peta.dinamik') }}" class="flex flex-wrap gap-4 items-end">
        <!-- KECAMATAN -->
        <select id="kecamatan" name="kecamatan" class="border rounded px-3 py-2">
            <option value="">Pilih Kecamatan</option>
            @foreach ($kecamatans as $kecamatan)
                <option value="{{ $kecamatan->id }}" {{ $selectedKecamatan == $kecamatan->id ? 'selected' : '' }}>
                    {{ $kecamatan->nama_kecamatan }}
                </option>
            @endforeach
        </select>

        <!-- DESA -->
        <div id="desa-wrapper">
            <select id="desa" name="desa" class="border rounded px-3 py-2">
                <option value="">Pilih Desa</option>
                @foreach ($desas as $desa)
                    <option value="{{ $desa->id }}"
                            data-kecamatan-id="{{ $desa->kecamatan_id }}"
                            {{ $selectedDesa == $desa->id ? 'selected' : '' }}>
                        {{ $desa->nama_desa }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- KATEGORI -->
        <select id="kategori" name="kategori" class="border rounded px-3 py-2">
            <option value="" disabled {{ !$selectedKategori ? 'selected' : '' }}>Pilih Kategori</option>
            @foreach ($kategoriPeta as $kategori)
                <option value="{{ $kategori->id }}" {{ $selectedKategori == $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->nama }}
                </option>
            @endforeach
        </select>

        <!-- SUBMIT -->
        <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow text-sm">
            Tampilkan Data
        </button>
    </form>

    <!-- Peta -->
    @if(request('kecamatan') && request('kategori'))
        <div class="relative w-full h-[600px] rounded-xl overflow-hidden border border-gray-200 shadow-inner mt-5">
            @if($viewPeta)
                @include($viewPeta)
            @endif
        </div>
    @else
        <div class="mt-6 text-gray-500 text-sm italic">
            Silakan pilih Kecamatan, Desa dan Kategori terlebih dahulu untuk menampilkan peta.
        </div>
    @endif
</div>

<!-- Script untuk filter desa dan sembunyikan dropdown desa -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const kecamatanSelect = document.getElementById('kecamatan');
        const desaSelect = document.getElementById('desa');
        const desaWrapper = document.getElementById('desa-wrapper');
        const kategoriSelect = document.getElementById('kategori');

        function filterDesa() {
            const selectedKecamatanId = kecamatanSelect.value;

            Array.from(desaSelect.options).forEach(option => {
                const kecamatanId = option.getAttribute('data-kecamatan-id');
                if (!kecamatanId || kecamatanId === selectedKecamatanId || option.value === '') {
                    option.hidden = false;
                } else {
                    option.hidden = true;
                }
            });

            if (desaSelect.selectedOptions.length > 0) {
                const selectedDesaOption = desaSelect.selectedOptions[0];
                if (selectedDesaOption.getAttribute('data-kecamatan-id') !== selectedKecamatanId) {
                    desaSelect.value = '';
                }
            }
        }

        function toggleDesaSelect() {
            const selectedKategoriId = parseInt(kategoriSelect.value);
            const hiddenKategori = [1, 2, 3, 4, 5];

            if (hiddenKategori.includes(selectedKategoriId)) {
                desaWrapper.style.display = 'none';
            } else {
                desaWrapper.style.display = 'inline-block';
            }
        }

        kecamatanSelect.addEventListener('change', filterDesa);
        kategoriSelect.addEventListener('change', toggleDesaSelect);

        // Inisialisasi saat halaman pertama kali dimuat
        filterDesa();
        toggleDesaSelect();
    });
</script>
@endsection
