@extends('admin.layout.master')
@section('activeDashboard', 'active')

@section('contentAdmin')
<section class="content-header">
    <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
        Dashboard
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

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-info">
                    <div class="inner">
                    <h3>1</h3>

                    <p>Anggota</p>
                    </div>
                    <div class="icon">
                    <i class="fa-solid fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-success">
                    <div class="inner">
                    <h3>2</h3>

                    <p>Buku</p>
                    </div>
                    <div class="icon">
                    <i class="fa-solid fa-book-open"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3" >
                <div class="small-box bg-warning" >
                    <div class="inner">
                    <h3 style="color: white">3</h3>

                    <p style="color: white">Peminjaman</p>
                    </div>
                    <div class="icon">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    </div>
                    <a href="#" class="small-box-footer" >
                    <span style="color: white">More info</span> <i class="fas fa-arrow-circle-right" style="color: white"></i>
                    </a>
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-danger">
                    <div class="inner text-white">
                    <h3>3</h3>

                    <p>Pengembalian</p>
                    </div>
                    <div class="icon">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


    </div><!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection
