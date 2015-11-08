@extends('layout')

@section('content')
    <script id="comment-child-template" type="text/x-handlebars-template">
        <div class="comment-child">
            <b>@{{name}} (@{{city}}):</b><br/> @{{comment}}
        </div>
    </script>
    <!-- Modal -->
    <div class="modal fade" id="comment-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" id="modal-close" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Komentar</h4>
                </div>
                <form method="post" id="comment" action="{{url('comment')}}">
                    <div class="modal-body" id="comment-body">
                        <div class="alert alert-danger" style="display: none;" id="error-box">
                            <button type="button" class="close">&times;</button>
                            <div id="error-message"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Nama Lengkap" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="city" placeholder="Kota" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="comment" placeholder="Apa pendapatmu tentang privatisasi 'Mendoan' oleh Fudji Wong?" class="form-control" rows="3"></textarea>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="send-button">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 col-md-offset-3 container-box">
            <div class="row">
                <div class="col-md-12" align="right">
                    <a href="#" class="btn btn-xs btn-default">Tentang Website Ini</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 title-box">
                    <img src="{{url('assets/img/logo.png')}}" width="100%">
                </div>
            </div>
            <div class="row content">
                <div class="col-md-12 col-xs-12 index-1">
                    <div class="col-md-6 col-xs-6">
                        <p><b>Apa Itu Mendoan?</b><br/>Kata mendoan dianggap berasal dari bahasa Banyumasan, mendo yang berarti setengah matang atau lembek. Mendoan berarti memasak dengan minyak panas yang banyak dengan cepat sehingga masakan tidak matang benar. (Wikipedia)</p>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <img src="{{url('assets/img/mendoan.jpg')}}" width="100%">
                        <span class="caption">Sumber: resepkecilku.com</span>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 index-2">
                    <div class="col-md-6 col-xs-6">
                        <img src="{{url('assets/img/fudji.jpg')}}" width="100%">
                        <span class="caption">Sumber: detik.com</span>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <p style="text-align:right;"><b>Ada Apa?</b><br/>Fudji Wong mengantongi merek 'mendoan' dengan nomor IDM000237714 yang terdaftar pada 23 Februari 2010 dan berlaku hingga 15 Mei 2018 atas nama Fudji Wong.</p>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 desc">
                    <p style="font-size:18px;">Mendoan milik kita semua. Bukan milik perseorangan. Sudah seharusnya Kemenkum HAM mengkaji ulang pemberian sertifikat merek "Mendoan" untuk Fudji Wong. Luangkan waktumu untuk bergabung dengan {{$count}} orang lainnya mendukung petisi ini dengan cara klik tombol di bawah.</p>
                </div>
                @if(! $exist)
                <div class="col-md-12 col-xs-12 count-box">
                    <span class="counter-text-info">Sejak Jumat (6/11) pukul 18:00 WIB hingga sekarang,</span><br/>
                    <span class="counter" id="counter">{{$total}}</span><br/>
                    <span class="counter-text" id="counter-text">Orang telah mendukung</span>
                </div>
                <div class="col-md-12 col-xs-12 support-box">
                    <form method="post" id="support">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary" id="support-button">DUKUNG SEKARANG!</button>
                    </form>
                    Atau
                </div>
                <div class="col-md-12 col-xs-12" align="center">
                    <button type="submit" class="btn btn-default" id="comment-button" data-toggle="modal" data-target="#comment-modal">Berikan Komentar</button>
                </div>
                <div class="col-md-12 col-xs-12 share-box" style="display: none;">
                    <hr/>
                    <p class="thanks">Terima kasih telah meluangkan waktunya.<br/>Sebarkan agar teman-teman kamu ikut mendukung:</p>
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
                    <span class="counter-text-info">Sejak Jumat (6/11) pukul 18:00 WIB hingga sekarang,</span><br/>
                    <span class="counter" id="counter">{{$total}}</span><br/>
                    <span class="counter-text" id="counter-text">Orang telah mendukung termasuk kamu</span>
                </div>
                <div class="col-md-12 col-xs-12" align="center">
                    <button type="submit" class="btn btn-default" id="comment-button" data-toggle="modal" data-target="#comment-modal">Berikan Komentar</button>
                </div>
                <div class="col-md-12 col-xs-12 share-box">
                    <hr/>
                    <p class="thanks">Terima kasih telah meluangkan waktunya.<br/>Sebarkan agar teman-teman kamu ikut mendukung:</p>
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
           <!--  <div class="row">
                 <div class="col-md-12 col-xs-12 copyright">
                    Aplikasi Ini Dibuat &amp; Dikembangkan oleh <a href="http://www.gedrix.com" target="_blank">gedrixCreative</a>.
                 </div>
            </div> -->
            <div class="row">
                <div class="col-md-12 col-xs-12 comment-box-content">
                    <h4>{{$commentCount}} Pendapat Masyarakat Tentang Privatisasi "Mendoan"</h4>
                    <div  class="comment-child-box">
                        @foreach($comments as $row)
                            <div class="comment-child">
                                <b>{{$row->name}} ({{$row->city}}):</b><br/> {{$row->comment}}
                            </div>
                        @endforeach
                    </div>
                    <div id="loadMoreText" style="text-align:center; display: none;">
                        <span class="bg-primary" style="padding:10px;">Memuat Komentar Sebelumnya...</span>
                    </div>
                </div>
            </div>
            <div id="triggerLoadMore"></div>
        </div>
    </div>
@endsection

@section('js')
<script>
$(document).ready(function() {
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

    // For commentar form
    $('#comment').submit(function(event) {
        $('#send-button').attr('disabled','disabled').html('Mohon Tunggu...');
        $.ajax({
            type: "POST",
            url: "{{url('comment')}}",
            data: $('#comment').serialize(),
            success: function(data)
            {
                var error = '';
                if(data.status == 'error') {
                    $('#send-button').removeAttr('disabled').html('Kirim');
                    $('#error-box').show();
                    for (val of data.error) {
                        error += val+'<br/>';
                    }
                    $('#error-message').empty().html(error);
                } else {
                    $('#send-button').hide();
                    $('#comment-body').empty().html('Komentar kamu berhasil terkirim. Terima kasih atas kontribusinya.');
                }
            }
        });
        event.preventDefault();
    });
    
    $('#modal-close').click(function() {
        $('#status_info').hide();
    });


    // Load more comments
    var counter = 2;
    $(function() {
        $(window).scroll(function(){
            var distanceTop = $('#triggerLoadMore').offset().top - $(window).height();

            if ($(window).scrollTop() > distanceTop) {
                console.log('Load More!');
                $('#loadMoreText').show();
                url = "{{url('comment?page=')}}"+counter;
                var source = $("#comment-child-template").html();
                var template = Handlebars.compile(source);
                var rsPlaceHolder = $('.comment-child-box');
                
                $.getJSON( url, function( data ) {
                    var comments = [];
                    $.each( data, function( key, val ) {
                        comment = template(val);
                        comments.push(comment);
                    });
                    
                    $( "<div/>", {
                        html: comments.join( "" )
                    }).appendTo(".comment-child-box");
                    $('#loadMoreText').hide();
                });
                counter++;
            }
        });
    });
});
</script>

@endsection