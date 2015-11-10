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
                    <a href="{{url('tentang')}}" class="btn btn-xs btn-default">Tentang Website Ini</a>
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
                <div class="col-md-12 col-xs-12 count-box">
                    <span class="counter-text-info">Sejak Jumat (6/11) pukul 18:00 WIB hingga Selasa (10/11),</span><br/>
                    <span class="counter" id="counter">{{$total}}</span><br/>
                    <span class="counter-text" id="counter-text">Orang telah mendukung</span><br/>
                    <span class="counter-text" id="counter-text">Dan @{{$commentCount}} orang telah menyampaikan pendapatnya</span>
                </div>
                <div class="col-md-12 col-xs-12 desc" style="border:solid 2px #ebebeb;">
                    <h1>Update 10 November 2015</h1>
                    <p style="font-size:14px;"> Polemik terkait hak eksklusif mendoan yang dilakukan Fudji Wong, akhirnya berakhir dengan diserahkannya mendoan kepada Pemkab Banyumas. <b>Berita selengkapnya di <a href="http://www.radarbanyumas.co.id/fudji-wong-lepas-hak-eksklusif-mendoan-2/">sini</a></b></p>
                    <hr>
                    <p style="font-size:14px;">Dengan penuh rasa hormat, kami ucapkan terima kasih kepada saudara Fudji Wong dan Pemerintah Kabupaten Banyumas yang telah mencapai kesepakatan untuk mengembalikan "Mendoan" kepada masyarakat.</p>
                    <p style="font-size:14px;">Juga tidak lupa kami ucapkan terima kasih kepada seluruh masyarakat yang telah mendukung penuh agar dikembalikannya "Mendoan" kepada kita semua.</p>
                    <p style="font-size:14px;">Seluruh dukungan dan pendapat masyarakat yang telah kami terima di website ini akan kami sampaikan kepada Pemerintah Kabupaten Banyumas sebagai bentuk aspirasi masyarakat terhadap masalah ini dan agar masalah seperti ini tidak terulang kembali.</p>
                    <p style="font-size:14px;">Kami juga memohon maaf yang sebesar-besarnya apabila ada pihak yang kurang berkenan atau merasa dirugikan dengan adanya website ini.</p>
                    <br/>
                    <p style="font-size:14px;" align="right">Salam,<br/><br/><b>Seluruh Tim yang Tergabung Mengelola Website Ini</b></p>
                </div>
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