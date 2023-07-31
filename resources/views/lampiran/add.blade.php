@extends('layout.navigate')

@section('title', 'input dokumen lampiran')

@section('content')
<style>
    .form-control{
        position: relative;
        overflow: hidden;
        padding-right: 120px;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .input-file {
        opacity: 0;
    }
    .button {
        cursor: pointer;
        right: -1px;
    }
</style>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <img src="{{ asset('/') }}assets/images/gatra-mapan-logo.png" class="p-2 bg-white rounded-sm img-fluid" alt="">
                    </div>
                    <!-- card-header -->
                    <div class="card-body">


                        <form action="{{ route('lampiran.store', ['id'=>$id]) }}" method="POST" class="card-body p-2 col-10" enctype="multipart/form-data">
                            @csrf
                            <div class="heading d-flex justify-content-between align-items-center border-bottom mb-4">
                                <h5><strong>INPUT DATA LAMPIRAN KARYAWAN</strong></h5>
                            </div>
                            <div class="data-diri d-flex flex-column justify-content-center flex-md-row row pt-1">

                                    <div class="col-6 mb-3">
                                        <label for="foto_karyawan" class="required">Foto Karyawan</label>
                                        <label for="" class="form-input form-control position-relative">
                                            <span class="button top-0 bottom-0 py-1 px-4 bg-secondary d-inline position-absolute">Upload gambar</span>
                                            <span  class="text-input py-1 font-weight-normal">Cari gambar</span>
                                            <input type="file" name="foto_karyawan" accept="image/*" onchange="changeLabel(event, '.text-input')" class="input-file position-absolute top-0 end-0">
                                        </label>
                                        {{-- <input class="yearpicker form-control bg-gray-light" type="file" accept="image/png, image/gif, image/jpeg"  name="foto_karyawan"  value=""> --}}
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="foto_karyawan" class="required">Kartu Tanda Pengenal</label>
                                        <label for="" class="form-input form-control position-relative">
                                            <span class="button top-0 bottom-0 py-1 px-4 bg-secondary d-inline position-absolute">Upload gambar</span>
                                            <span  class="text-ktp py-1 font-weight-normal">Cari gambar</span>
                                            <input type="file" name="ktp" accept="image/*" onchange="changeLabel(event, '.text-ktp')" class="input-file position-absolute top-0 end-0">
                                        </label>
                                        {{-- <input class="yearpicker form-control bg-gray-light" type="file" name="ktp"  value=""> --}}
                                    </div>


                                    <div class="col-6 mb-3">
                                        <label for="foto_karyawan" class="required">kartu Jaminan Sosila Tenaga Kerja (Jamsostek)</label>
                                        <label for="" class="form-input form-control position-relative">
                                            <span class="button top-0 bottom-0 py-1 px-4 bg-secondary d-inline position-absolute">Upload gambar</span>
                                            <span  class="text-jamsostek py-1 font-weight-normal">Cari gambar</span>
                                            <input type="file" name="jamsostek" accept="image/*" onchange="changeLabel(event, '.text-jamsostek')" class="input-file position-absolute top-0 end-0">
                                        </label>
                                        {{-- <input class="yearpicker form-control bg-gray-light" type="file" name="jamsostek"  value=""> --}}
                                    </div>


                                    <div class="col-6 mb-3">
                                        <label for="foto_karyawan" class="required">Kartu JPK (boleh BPJS)</label>
                                        <label for="" class="form-input form-control position-relative">
                                            <span class="button top-0 bottom-0 py-1 px-4 bg-secondary d-inline position-absolute">Upload gambar</span>
                                            <span  class="text-jpk py-1 font-weight-normal">Cari gambar</span>
                                            <input type="file" name="jpk" accept="image/*" onchange="changeLabel(event, '.text-jpk')" class="input-file position-absolute top-0 end-0">
                                        </label>
                                        {{-- <input class="yearpicker form-control bg-gray-light" type="file" name="jpk"  value=""> --}}
                                    </div>


                                    <div class="col-6 mb-3">
                                        <label for="foto_karyawan" class="required">Id Card Karyawan</label>
                                        <label for="" class="form-input form-control position-relative">
                                            <span class="button top-0 bottom-0 py-1 px-4 bg-secondary d-inline position-absolute">Upload gambar</span>
                                            <span  class="textid_card py-1 font-weight-normal">Cari gambar</span>
                                            <input type="file" name="id_card" accept="image/*" onchange="changeLabel(event, '.textid_card')" class="input-file position-absolute top-0 end-0">
                                        </label>
                                        {{-- <input class="yearpicker form-control bg-gray-light" type="file" name="id_card"  value=""> --}}
                                    </div>


                                    <div class="col-6 mb-3">
                                        <label for="foto_karyawan" class="required">Kartu Keluarga</label>
                                        <label for="" class="form-input form-control position-relative">
                                            <span class="button top-0 bottom-0 py-1 px-4 bg-secondary d-inline position-absolute">Upload gambar</span>
                                            <span  class="text-kk py-1 font-weight-normal">Cari gambar</span>
                                            <input type="file" name="kk" accept="image/*" onchange="changeLabel(event, '.text-kk')" class="input-file position-absolute top-0 end-0">
                                        </label>
                                        {{-- <input class="yearpicker form-control bg-gray-light" type="file" name="kk"  value=""> --}}
                                    </div>


                            </div>
                            <div class="row px-3">
                                <div class="form-group d-flex justify-content-start">
                                    <button class="btn btn-primary px-5 p-3 font-weight-bold">Submit</button>
                                </div>
                            </div>
                        </form>
                          <!-- ./col-md -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
<!-- /.container-fluid -->
</section>
@endsection

@section('script')
<script>
    function changeLabel(event, classtarget ) {
        var value = event.target.value;
        // console.log(value);
        document.querySelector(classtarget).textContent = value.replace('C:\\fakepath\\', '');
    }
</script>

@endsection
