@extends('admin.layout.master')
@section('activeMateri', 'active')

@section('contentAdmin')
<section class="content-header">
    <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
        Materi Master
        <small>
            <script type='text/javascript'>
                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                var date = new Date();
                var day = date.getDate();
                var month = date.getMonth();
                var thisDay = date.getDay(),
                    thisDay = myDays[thisDay];
                var yy = date.getYear();
                var year = (yy < 1000) ? yy + 1900 : yy;
                document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                //
            </script>
        </small>
    </h1>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="{{ url('tambah-materi/store') }}" method="POST" class="database_operation" enctype="multipart/form-data">
                    <div class="card">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-header">
                                    <h3>Tambah Materi</h3>
                                </div>
                            </div>
                                <div class="col-6">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="">Judul Materi</label>
                                                    {{ csrf_field()}}
                                                    <input type="text" required="required" name="title" placeholder="Masukkan Judul Materi" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="">Deskripsi Materi</label>
                                                    <input type="text" required="required" name="deskripsi" placeholder="Masukkan Deskripsi Materi"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="">Select category</label>
                                                    <select class="form-control" required="required" name="kategori">
                                                        <option value="">Select</option>
                                                        @foreach ($category as $cat)
                                                        <option value="{{ $cat['id']}}">{{ $cat['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="">Sampul Materi</label>
                                                    <input type="file" required="required" name="sampul" accept="image/*" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="">Akses</label>
                                                    <select class="form-control" required="required" name="akses" onchange="showHideKelas(this.value)">
                                                        <option value="">Select</option>
                                                        <option value="umum">Umum</option>
                                                        <option value="privat">Privat</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12" id="kelasDiv" style="display:none;">
                                                <div class="form-group">
                                                    <label for="">Kelas</label>
                                                    <input type="text" name="kelas" placeholder="Masukkan Kode Kelas" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="">Upload Materi</label>
                                                    <input type="file" required="required" name="filemateri" accept="application/pdf"  class="form-control" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                                </div>
                                                <div class="mt-3"><iframe src="" frameborder="0" id="output" allow="autoplay" width="750" height="450"></iframe></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card-footer">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" style="width: 100%;">
                                        </div>

                                    </div>
                                </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function showHideKelas(value) {
        var kelasDiv = document.getElementById("kelasDiv");
        if (value === "privat") {
            kelasDiv.style.display = "block";
        } else {
            kelasDiv.style.display = "none";
        }
    }
</script>
@endpush

