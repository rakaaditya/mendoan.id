@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-5 col-md-offset-3 container-box">
            <div class="row">
                <div class="col-md-12 title-box">
                    <img src="{{url('assets/img/logo.png')}}" width="100%">
                </div>
            </div>
            <div class="row content">
                <div class="col-md-12 col-xs-12">
                    <div class="col-md-6 col-xs-6">
                        <p><b>Apa Itu Mendoan?</b><br/>Kata mendoan dianggap berasal dari bahasa Banyumasan, mendo yang berarti setengah matang atau lembek. Mendoan berarti memasak dengan minyak panas yang banyak dengan cepat sehingga masakan tidak matang benar. (Wikipedia)</p>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <img src="{{url('assets/img/mendoan.jpg')}}" width="100%">
                        <span class="caption">Sumber: resepkecilku.com</span>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="col-md-6 col-xs-6">
                        <img src="{{url('assets/img/fudji.jpg')}}" width="100%">
                        <span class="caption">Sumber: detik.com</span>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <p style="text-align:right;"><b>Ada Apa?</b><br/>Fudji Wong mengantongi merek 'mendoan' dengan nomor IDM000237714 yang terdaftar pada 23 Februari 2010 dan berlaku hingga 15 Mei 2018 atas nama Fudji Wong.</p>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <p style="font-size:18px;">Mendoan milik kita semua. Bukan milik perseorangan. Luangkan waktumu untuk bergabung dengan {{$count}} orang lainnya mendukung petisi ini dengan cara klik tombol di bawah.</p>
                </div>
                @if(! $exist)
                <div class="col-md-12 col-xs-12 count-box">
                    <span class="counter" id="counter">{{$total}}</span><br/>
                    <span class="counter-text" id="counter-text">Orang telah mendukung</span>
                </div>
                <div class="col-md-12 col-xs-12 support-box">
                    <form method="post" id="support">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary" id="support-button">DUKUNG SEKARANG!</button>
                    </post>
                </div>
                <div class="col-md-12 col-xs-12 share-box" style="display: none;">
                    <hr/>
                    <p>Terima kasih telah meluangkan waktunya untuk mendukung. Sebarkan agar teman-teman kamu ikut mendukung:</p>
                    <div class="sharepost">
                        <ul>
                            <li class="facebook">
                                <div class="icon"><a href="http://www.facebook.com/sharer/sharer.php?u={{url()}}" id="fbShare"><i class="fa fa-facebook"></i></a></div>
                            </li>
                            <li class="twitter">
                                <div class="icon"><a href="https://twitter.com/share?text={{urlencode('Mendoan milik kita semua. Bukan milik perseorangan. Gabung dukung petisi ini!  #SaveMendoan')}} &url={{urlencode(url())}}" id="twShare"><i class="fa fa-twitter"></i></a></div>
                            </li>
                            <li class="whatsapp">
                                <div class="icon"><a href="whatsapp://send?text={{urlencode('Mendoan milik kita semua. Bukan milik perseorangan. Gabung dukung petisi ini! '.url().' #SaveMendoan')}}"><i class="fa fa-whatsapp"></i></a></div>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
                @else
                <div class="col-md-12 col-xs-12 count-box">
                    <span class="counter" id="counter">{{$total}}</span><br/>
                    <span class="counter-text" id="counter-text">Orang telah mendukung termasuk kamu</span>
                </div>
                <div class="col-md-12 col-xs-12 share-box">
                    <hr/>
                    <p>Terima kasih telah meluangkan waktunya untuk mendukung. Sebarkan agar teman-teman kamu ikut mendukung:</p>
                    <div class="sharepost">
                        <ul>
                            <li class="facebook">
                                <div class="icon"><a href="http://www.facebook.com/sharer/sharer.php?u={{url()}}" id="fbShare"><i class="fa fa-facebook"></i></a></div>
                            </li>
                            <li class="twitter">
                                <div class="icon"><a href="https://twitter.com/share?text={{urlencode('Mendoan milik kita semua. Bukan milik perseorangan. Gabung dukung petisi ini!  #SaveMendoan')}} &url={{urlencode(url())}}" id="twShare"><i class="fa fa-twitter"></i></a></div>
                            </li>
                            <li class="whatsapp">
                                <div class="icon"><a href="whatsapp://send?text={{urlencode('Mendoan milik kita semua. Bukan milik perseorangan. Gabung dukung petisi ini! '.url().' #SaveMendoan')}}"><i class="fa fa-whatsapp"></i></a></div>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
$(document).ready(function() {
    var current = {{$total}};
    $('#support').submit(function(event) {
        $('#support-button').attr('disabled','disabled').html('Mohon Tunggu...');
        $.ajax({
            type: "POST",
            url: "{{url()}}",
            data: $('#support').serialize(),
            success: function(data)
            {
                $('.share-box').show();
                $('.support-box').hide();
                $('#counter').html(data);
                $('#counter-text').html('Orang telah mendukung termasuk kamu');
            }
        });
        event.preventDefault();
    });
});
</script>
@endsection