<div id="showModal{{ $jalanKabupatenDesa->id }}" class="modal flip" tabindex="-1"
    aria-labelledby="showModalLabel{{ $jalanKabupatenDesa->id }}" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel{{ $jalanKabupatenDesa->id }}">
                    Detail Jembatan Desa {{ $jalanKabupatenDesa->desa->nama_desa }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Nama Desa</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $jalanKabupatenDesa->desa->nama_desa }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>RT/RW</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $jalanKabupatenDesa->rtRwDesa->rt }}/{{ $jalanKabupatenDesa->rtRwDesa->rw }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Nama Jalan</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $jalanKabupatenDesa->nama_jalan }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Panjang Jalan</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $jalanKabupatenDesa->panjang }} Meter
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Lebar Jalan</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $jalanKabupatenDesa->lebar }} Meter
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Kondisi Jalan</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $jalanKabupatenDesa->kondisi }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Jenis Jalan</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $jalanKabupatenDesa->jenis_jalan }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Lokasi Jalan</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $jalanKabupatenDesa->lokasi }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Status</strong>
                    </div>
                    <div class="col-sm-8">
                        @if ($jalanKabupatenDesa->status == 'Arsip')
                            <span class="badge bg-primary">{{ $jalanKabupatenDesa->status }}</span>
                        @elseif($jalanKabupatenDesa->status == 'Pending')
                            <span class="badge bg-warning">{{ $jalanKabupatenDesa->status }}</span>
                        @elseif ($jalanKabupatenDesa->status == 'Approved')
                            <span class="badge bg-success">{{ $jalanKabupatenDesa->status }}</span>
                        @elseif ($jalanKabupatenDesa->status == 'Rejected')
                            <span class="badge bg-danger">{{ $jalanKabupatenDesa->status }}</span>
                        @else
                            <span class="badge bg-secondary">{{ $jalanKabupatenDesa->status }}</span>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>created By</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $jalanKabupatenDesa->created_by }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Reject Reason</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $jalanKabupatenDesa->reject_reason ?? 'Tidak ada keterangan' }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Approved By</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $jalanKabupatenDesa->approved_by ?? 'Belum Di Approved' }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Approved At:</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $jalanKabupatenDesa->approved_at ?? 'Belum Di Approved' }}
                    </div>
                </div>
                {{-- Form Approval untuk Admin Kabupaten --}}
                @if (
                    (auth()->user()->hasRole('admin_kabupaten') || auth()->user()->hasRole('superadmin')) &&
                        $bumde->status == 'Pending')
                    <hr>

                    <div class="card-body">
                        {{-- PERBAIKAN ROUTE: tukar posisi table dan id --}}
                        <form
                            action="{{ route('approval', ['table' => 'jalan_kabupaten_desas', 'id' => $jalanKabupatenDesa->id]) }}"
                            method="POST" id="approvalForm{{ $jalanKabupatenDesa->id }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="approval_status{{ $jalanKabupatenDesa->id }}" class="form-label">
                                    <strong>Status Approval <span class="text-danger">*</span></strong>
                                </label>
                                <select class="form-select" id="approval_status{{ $jalanKabupatenDesa->id }}"
                                    name="status" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Approved">Approve</option>
                                    <option value="Rejected">Reject</option>
                                </select>
                            </div>

                            <div class="mb-3" id="reject_reason_container{{ $jalanKabupatenDesa->id }}"
                                style="display: none;">
                                <label for="reject_reason{{ $jalanKabupatenDesa->id }}" class="form-label">
                                    <strong>Alasan Penolakan <span class="text-danger">*</span></strong>
                                </label>
                                <textarea class="form-control" id="reject_reason{{ $jalanKabupatenDesa->id }}" name="reject_reason" rows="3"
                                    placeholder="Masukkan alasan penolakan..."></textarea>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success"
                                    onclick="return confirmApproval{{ $jalanKabupatenDesa->id }}()">
                                    <i class="fa fa-save"></i> Proses Approval
                                </button>
                            </div>
                        </form>
                    </div>


                    <script>
                        document.getElementById('approval_status{{ $jalanKabupatenDesa->id }}').addEventListener('change', function() {
                            const rejectContainer = document.getElementById(
                                'reject_reason_container{{ $jalanKabupatenDesa->id }}');
                            const rejectTextarea = document.getElementById('reject_reason{{ $jalanKabupatenDesa->id }}');

                            if (this.value === 'Rejected') {
                                rejectContainer.style.display = 'block';
                                rejectTextarea.required = true;
                            } else {
                                rejectContainer.style.display = 'none';
                                rejectTextarea.required = false;
                                rejectTextarea.value = '';
                            }
                        });

                        function confirmApproval {
                            {
                                $jalanKabupatenDesa - > id
                            }
                        }() {
                            const status = document.getElementById('approval_status{{ $jalanKabupatenDesa->id }}').value;
                            const message = status === 'Approved' ?
                                'Apakah Anda yakin ingin menyetujui data ini?' :
                                'Apakah Anda yakin ingin menolak data ini?';

                            return confirm(message);
                        }
                    </script>
                @endif
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
