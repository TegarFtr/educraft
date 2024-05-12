@extends('layout.master')
@section('title', 'OneLearn | Kuis')
@section('activeKuis', 'active')

@section('content')
<section class="content">
    <div class="container-fluid" style="margin-top: 75px">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <div class="card">

            <div class="card-body">
               <div class="row">
                   <div class="col-sm-4">
                      <h3 class="text-center">Time : {{ $exam->exam_duration}} min</h3>
                   </div>
                   <div class="col-sm-4">
                       <h3><b>Timer</b> :  <span class="js-timeout" id="timer">{{ $exam['exam_duration']}}:00</span></h3>
                   </div>

                    <div class="col-sm-4">
                        <h3 class="text-right"><b>Status</b> :Running</h3>
                    </div>
               </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card mt-4">

            <div class="card-body">

              <form action="{{url('kuis/submitkuis')}}" method="POST">
                <input type="hidden" name="exam_id" value="{{ Request::segment(3)}}">
                {{ csrf_field()}}
               <div class="row">

                    @foreach ($question as $key=>$q)
                        <div class="col-sm-12 mt-4">
                          <p>{{$key+1}}. {{ $q->questions}}</p>
                          <?php
                                $options = json_decode(json_decode(json_encode($q->options)),true);
                          ?>
                          <input type="hidden" name="question{{$key+1}}" value="{{$q['id']}}">
                          <ul class="question_options">
                              <li><input type="radio" value="{{ $options['option1']}}" name="ans{{$key+1}}"> {{ $options['option1']}}</li>
                              <li><input type="radio" value="{{ $options['option2']}}" name="ans{{$key+1}}"> {{ $options['option2']}}</li>
                              <li><input type="radio" value="{{ $options['option3']}}" name="ans{{$key+1}}"> {{ $options['option3']}}</li>
                              <li><input type="radio" value="{{ $options['option4']}}" name="ans{{$key+1}}"> {{ $options['option4']}}</li>

                              <li style="display: none;"><input value="0" type="radio" checked="checked" name="ans{{$key+1}}"> {{ $options['option4']}}</li>
                          </ul>
                        </div>
                    @endforeach



                      <div class="col-sm-12">
                        <input type="hidden" name="index" value="{{ $key+1}}">
                          <button type="submit" class="btn btn-primary" id="myCheck">Submit</button>
                      </div>
               </div>
              </form>

            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('scripts')

<script>
    // Ambil elemen span dengan class js-timeout
    var timerElement = document.getElementById('timer');

    // Ambil waktu awal dalam detik dari elemen span
    var timer = parseInt(timerElement.innerHTML.split(':')[0]) * 60 + parseInt(timerElement.innerHTML.split(':')[1]);

    // Fungsi untuk mengupdate timer setiap detik
    var countdown = setInterval(function() {
        // Kurangi timer satu detik
        timer--;

        // Hitung jam, menit, dan detik baru
        var hours = Math.floor(timer / 3600);
        var minutes = Math.floor((timer % 3600) / 60);
        var seconds = timer % 60;

        // Tampilkan waktu baru
        timerElement.innerHTML = hours + ":" + (minutes < 10 ? '0' : '') + minutes + ":" + (seconds < 10 ? '0' : '') + seconds;

        // Jika timer habis, hentikan countdown
        if (timer <= 0) {
            clearInterval(countdown);
            timerElement.innerHTML = "Waktu Habis";
            // Tambahkan kode di sini untuk menangani ketika waktu habis
        }
    }, 1000); // Setiap 1 detik (1000 milidetik)
</script>
@endpush
