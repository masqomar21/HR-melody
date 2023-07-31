@extends('layout.navigate')

@section('title', 'edit tanggungan karyawan')


@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <img src="{{ asset('/') }}assest/images/gatra-mapan-logo.png" class="p-2 bg-white rounded-sm img-fluid" alt="">
                    </div>
                    <!-- card-header -->
                    <div class="card-body">
                        <div class="col-md-10">
                            <div class="heading d-flex justify-content-between align-items-center border-bottom mb-4">
                                <h5><strong>EDIT TANGGUNGAN KARYAWAN</strong></h5>
                            </div>
                            <div class="table-responsive">
                              <table class="table table-bordered table-striped mb-4">
                                <thead>
                                  <tr>
                                    <th class="text-center">No.</th>
                                    <th>Nama</th>
                                    <th>Hubungan</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Pendidikan Terakhir</th>
                                    <th>Pekerjaan</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        {{$item->pekerjaan}}
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->hubungan == 'istri' ? ($item->gender == 'L' ? 'Suami' : 'Istri') :'Anak' }}</td>
                                            <td>{{$item->tempat_lahir}}, {{$item->tanggal_lahir}}</td>
                                            <td>{{$item->gender == 'L' ? 'Laki-laki' : 'Perempuan'}}</td>
                                            <td>{{$item->pendidikan}}</td>
                                            <td>{{$item->Pekerjaan}}</td>
                                            <td class="d-flex w-auto flex-wrap justify-content-center ">
                                                <form action="{{ route('tanggungan.destroy', [ 'id'=> $id, 'tanggungan' => $item->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-sm bg-danger mx-2 m-sm-2 border-0" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                              </table>
                            </div>
                            <div class="form-group d-flex justify-content-start">
                                <a href="{{ route('karyawan.show', ['karyawan'=>$id])}}" class="btn btn-success px-5 p-3 font-weight-bold">Simpan</a>
                            </div>

                        <form action="{{ route('tanggungan.store', ['id'=>$id]) }}" method="POST" class="card-body p-2">
                            @csrf
                            <div class="heading d-flex justify-content-between align-items-center border-bottom mb-4">
                                <h5><strong>TAMBAH TANGGUNGAN KARYAWAN</strong></h5>
                            </div>
                                <div class="data-diri d-flex flex-column flex-md-row row pt-1">
                                <div class="col-6 mb-3">
                                    <label for="nama" class="required">Nama<span class="text-danger">*</span></label>
                                    <input type="text" id="form6Example3" class="form-control rounded-4 p-3 bg-gray-light"
                                    placeholder="Ex : User1" name="nama"
                                    required />
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="hubungan" class="required">Hubungan<span class="text-danger">*</span></label>
                                    <select class="form-control bg-gray-light" name="hubungan" required>
                                        {{-- <option value="Suami">Suami</option> --}}
                                        <option value="Istri">Suami/Istri</option>
                                        <option value="Anak">Anak</option>
                                    </select>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="tempatlahir" class="required">Tempat Lahir<span class="text-danger">*</span></label>
                                    <input type="text" id="form6Example3" class="form-control rounded-4 p-3 bg-gray-light"
                                    placeholder="Ex : Malang" name="tempat_lahir"
                                    required />
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="nik" class="required">Tanggal Lahir<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="date" class="form-control bg-gray-light" id="reservationtime"
                                        placeholder="01/01/2000" name="tanggal_lahir" required>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="nama" class="required">Jenis Kelamin<span class="text-danger">*</span></label>
                                    <div class="input-group mx-2">
                                        <div>
                                            <input type="radio" id="genderlaki" name="gender" value="L" required>
                                            <label for="genderlaki" class="font-weight-normal">Laki-laki</label>
                                        </div>
                                    </div>
                                    <div class="input-group mx-2">
                                        <div>
                                            <input type="radio" id="gender" name="gender" value="P" required>
                                            <label for="gender" class="font-weight-normal">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="pendidikan">Pendidikan Terakhir</label>
                                    <input type="text" id="form6Example3" class="form-control rounded-4 p-3 bg-gray-light"
                                    placeholder="Ex : SMK" name="pendidikan"/>
                                </div>
                                <div class="col-6 mb-5">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" id="form6Example3" class="form-control rounded-4 p-3 bg-gray-light"
                                    placeholder="Ex : Karyawan" name="pekerjaan"/>
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary px-5 p-3 font-weight-bold">Tambah</button>
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

@section("script")
 <script>

 </script>
@endsection
