@extends('layouts.mahasiswa')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Pengajuan Beasiswa</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <form action="{{ route('mahasiswa.pengajuan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- Status DTKS --}}
                            <div class="form-group">
                                <label class="form-label" style="color: black; font-weight: bold">Status DTKS</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_dtks" value="5">
                                    <label class="form-check-label">Terdata</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_dtks" value="1">
                                    <label class="form-check-label">Tidak Terdata</label>
                                </div>

                                {{-- Upload File --}}
                                <label class="mt-2">Upload File Bukti DTKS</label>
                                <input type="file" class="form-control" name="file_status_dtks"
                                    accept=".jpg,.png,.pdf,.doc,.docx"
                                    onchange="previewFile('file_status_dtks', 'preview_status_dtks')">
                                <div class="mt-2">
                                    <a id="preview_status_dtks" target="_blank" style="display: none;">Lihat File</a>
                                </div>
                            </div>

                            {{-- Status P3KE --}}
                            <div class="form-group">
                                <label class="form-label" style="color: black; font-weight: bold">Status P3KE</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_p3ke" id="desil1"
                                        value="5">
                                    <label class="form-check-label" for="desil1">
                                        Desil 1
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_p3ke" id="desil2"
                                        value="4">
                                    <label class="form-check-label" for="desil2">
                                        Desil 2
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_p3ke" id="desil3"
                                        value="3">
                                    <label class="form-check-label" for="desil3">
                                        Desil 3
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_p3ke" id="desil4"
                                        value="2">
                                    <label class="form-check-label" for="desil4">
                                        Desil 4
                                    </label>
                                </div>

                                {{-- Upload File --}}
                                <label class="mt-2">Upload File Bukti P3KE</label>
                                <input type="file" class="form-control" name="file_status_p3ke"
                                    accept=".jpg,.png,.pdf,.doc,.docx"
                                    onchange="previewFile('file_status_p3ke', 'preview_status_p3ke')">
                                <div class="mt-2">
                                    <a id="preview_status_p3ke" target="_blank" style="display: none;">Lihat File</a>
                                </div>
                            </div>

                            {{-- Nomor KIP --}}
                            <div class="form-group">
                                <label class="form-label" style="color: black; font-weight: bold">Nomor KIP</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nomor_kip" value="5">
                                    <label class="form-check-label">Terdata</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nomor_kip" value="1">
                                    <label class="form-check-label">Tidak Ada</label>
                                </div>

                                {{-- Upload File --}}
                                <label class="mt-2">Upload File Bukti KIP</label>
                                <input type="file" class="form-control" name="file_nomor_kip"
                                    accept=".jpg,.png,.pdf,.doc,.docx"
                                    onchange="previewFile('file_nomor_kip', 'preview_nomor_kip')">
                                <div class="mt-2">
                                    <a id="preview_nomor_kip" target="_blank" style="display: none;">Lihat File</a>
                                </div>
                            </div>

                            {{-- Nomor KKS --}}
                            <div class="form-group">
                                <label class="form-label" style="color: black; font-weight: bold">Nomor KKS</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nomor_kks" value="5">
                                    <label class="form-check-label">Terdata</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nomor_kks" value="1">
                                    <label class="form-check-label">Tidak Ada</label>
                                </div>

                                {{-- Upload File --}}
                                <label class="mt-2">Upload File Bukti KKS</label>
                                <input type="file" class="form-control" name="file_nomor_kks"
                                    accept=".jpg,.png,.pdf,.doc,.docx"
                                    onchange="previewFile('file_nomor_kks', 'preview_nomor_kks')">
                                <div class="mt-2">
                                    <a id="preview_nomor_kks" target="_blank" style="display: none;">Lihat File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama_ayah" class="form-label" style="color: black; font-weight: bold">Nama
                                    Ayah</label>
                                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah">
                            </div>
                            <div class="form-group">
                                <label for="status_ayah" class="form-label"
                                    style="color: black; font-weight: bold">Status Ayah</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_ayah" id="wafat"
                                        value="5">
                                    <label class="form-check-label" for="wafat">
                                        Wafat
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_ayah" id="hidup"
                                        value="3">
                                    <label class="form-check-label" for="hidup">
                                        Hidup
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan_ayah" class="form-label"
                                    style="color: black; font-weight: bold">Pekerjaan Ayah</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaan_ayah"
                                        id="tidak_bekerja" value="5">
                                    <label class="form-check-label" for="tidak_bekerja">
                                        Tidak bekerja
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaan_ayah" id="nelayan"
                                        value="4">
                                    <label class="form-check-label" for="nelayan">
                                        Nelayan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaan_ayah" id="petani"
                                        value="3">
                                    <label class="form-check-label" for="petani">
                                        Petani
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaan_ayah" id="lainnya"
                                        value="2">
                                    <label class="form-check-label" for="lainnya">
                                        Kewirausahaan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaan_ayah"
                                        id="pns_tni_polri" value="1">
                                    <label class="form-check-label" for="pns_tni_polri">
                                        Lainnya
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_ibu" class="form-label" style="color: black; font-weight: bold">Nama
                                    Ibu</label>
                                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu">
                            </div>
                            <div class="form-group">
                                <label for="status_ibu" class="form-label" style="color: black; font-weight: bold">Status
                                    Ibu</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_ibu" id="wafat"
                                        value="5">
                                    <label class="form-check-label" for="wafat">
                                        Wafat
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_ibu" id="hidup"
                                        value="3">
                                    <label class="form-check-label" for="hidup">
                                        Hidup
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan_ibu" class="form-label"
                                    style="color: black; font-weight: bold">Pekerjaan Ibu</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaan_ibu"
                                        id="tidak_bekerja" value="5">
                                    <label class="form-check-label" for="tidak_bekerja">
                                        Tidak bekerja
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaan_ibu" id="nelayan"
                                        value="4">
                                    <label class="form-check-label" for="nelayan">
                                        Nelayan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaan_ibu" id="petani"
                                        value="3">
                                    <label class="form-check-label" for="petani">
                                        Petani
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaan_ibu" id="lainnya"
                                        value="2">
                                    <label class="form-check-label" for="lainnya">
                                        Kewirausahaan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaan_ibu"
                                        id="pns_tni_polri" value="1">
                                    <label class="form-check-label" for="pns_tni_polri">
                                        Lainnya
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jumlah_tanggungan" class="form-label"
                                    style="color: black; font-weight: bold">Jumlah Tanggungan</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jumlah_tanggungan"
                                        id="lebih_5_orang" value="5">
                                    <label class="form-check-label" for="lebih_5_orang">
                                        > 5 Orang
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jumlah_tanggungan"
                                        id="3_5_orang" value="4">
                                    <label class="form-check-label" for="3_5_orang">
                                        3 - 5 Orang
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jumlah_tanggungan"
                                        id="kurang_3_orang" value="3">
                                    <label class="form-check-label" for="kurang_3_orang">
                                        < 3 Orang </label>
                                </div>
                            </div>
                            <button class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Script untuk Preview File --}}
    <script>
        function previewFile(inputName, previewId) {
            let input = document.querySelector(`input[name="${inputName}"]`);
            let preview = document.getElementById(previewId);

            if (input.files && input.files[0]) {
                let file = input.files[0];
                let fileType = file.type;

                if (fileType.startsWith("image/")) {
                    // Untuk gambar, tampilkan dengan ukuran tetap
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        preview.href = e.target.result; // Set href untuk melihat gambar dalam ukuran penuh
                        preview.innerHTML =
                            `<img src="${e.target.result}" alt="Preview" 
                        style="max-width: 40px; height: auto; display: block; margin-top: 10px; border-radius: 8px; box-shadow: 0px 2px 5px rgba(0,0,0,0.2);">`;
                        preview.style.display = "block";
                    };
                    reader.readAsDataURL(file); // Baca file sebagai base64 URL
                } else {
                    // Untuk file selain gambar, tampilkan hanya tautan
                    preview.href = URL.createObjectURL(file);
                    preview.innerHTML = "📂 Lihat File";
                    preview.style.display = "inline-block";
                    preview.style.marginTop = "10px";
                    preview.style.fontWeight = "bold";
                    preview.style.color = "#007bff";
                }
            } else {
                // Jika tidak ada file yang diupload, sembunyikan preview
                preview.style.display = "none";
                preview.innerHTML = "";
            }
        }
    </script>
@endsection
