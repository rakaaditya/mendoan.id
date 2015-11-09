@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1 container-box">
            <div class="row">
                <div class="col-md-12 title-box">
                    <img src="{{url('assets/img/logo.png')}}" width="100%">
                </div>
            </div>
            <div class="row content">
                <div class="col-md-8 col-xs-12 about">
                    <p>Aplikasi ini dibuat awalnya hanya untuk keisengan semata. Bukan serius membuat petisi untuk menggugat. Hal ini sebagai klarifikasi atas pemberitaan media yang berkembang sekarang. Dan sama sekali tidak ada maksud untuk membuat suasana semakin panas.</p>
                    <p>Beberapa hari yang lalu, ketika mulai ramai tentang masalah privatisasi "Mendoan", saya dan seorang senior saya, Mas <a href="http://soep.web.id/" target="_blank">Soep</a>, yang juga pegiat Gerakan Desa Membangun secara singkat mengeluarkan ide untuk membeli domain <a href="http://www.mendoan.id">mendoan.id</a>. Setelah domain di tangan kami, barulah terpikir mau diapakan domain ini. Akhirnya saya mencoba membuat sebuah aplikasi kecil yang sangat sederhana dengan sebuat tombol untuk menyatakan mendukung menolak privatisasi mendoan. Saya sampaikan ide saya ke Mas Soep dan aplikasi siap digunakan pada hari Jumat (6/11) lalu tepatnya sekitar pukul 18.00.</p>
                	<p>Tidak disangka, dengan bantuan dari komunitas, akun twitter @iniPurwokerto, Mas <a href="https://twitter.com/sigitwid/" target="_blank">Sigit Widodo</a>, serta teman-teman lainnya yang begitu antusias menyebarkan website ini, dalam 2 jam sudah ada 800-an orang yang mendukung dengan mengeklik sebuah tombol kecil di yang saya buat hanya dalam hitungan menit sambil ngemil kuaci di kantor.</p>
                	<p>Selang beberapa jam, angka terus bertambah. Hingga mendekati jam 11 malam, counter menembus angka 1000. Saat itu saya mulai memikirkan antisipasi jumlah pengunjung yang semakin melonjak. Aplikasi yang tadinya saya buat sambil duduk santai, mulai saya perhatikan serius. Mulai dari optimalisasi cache, sampai modifikasi css yang tadinya hanya menggunakan bootstrap dengan tambahan 1 line untuk ukuran font judul. Karena saya terlalu lemah dalam urusan desain, saya meminta bantuan dibuatkan logo ke <a href="https://twitter.com/uungferi/" target="_blank">Mas Uung</a> agar terlihat lebih serius</p>
                	<p>Sampai pada hari kedua, Mas Uung "Request" ke saya untuk menambah kolom komentar untuk mengukur pendapat orang-orang. Ditambah dengan Mas Soep yang ikut berpendapat untuk ditambah kolom nama. Semakin besar nih aplikasi. Saya langsung buatkan malam itu juga. Dan baru beberapa jam dibuat, sebuah kolom di paling bawah tempat menampung komentar langsung penuh dengan komentar-komentar masyarakat. Mulai dari yang pro sampai yang kontra. Mulai dari yang berbahasa halus, sampai yang rasis. Saya sempat merasa bersalah membuat kolom komentar ini. Tapi ini pendapat masyarakat. Tidak ada fitur moderasi di komentar ini. Biarkan suara mereka mengalir di sebuah <i>timeline</i> kolom komentar ini.</p>
                	<p>Sekali lagi, saya membuat aplikasi ini bukan untuk membuat suasana semakin panas. Sekarang aplikasi ini menjadi fasilitas masyarakat untuk menyampaikan pendapatnya tentang privatisasi "Mendoan".</p>
                	<p><br/><br/><br/></p>
                	<p align="right">Warm Regards,<br/><br/><a href="http://www.rakaaditya.com/" target="_blank">Raka Aditya</a><br/>Developer</p>
                </div>
                <div class="col-md-4 col-xs-12 about">
                        <p><b>Mendoan.id dikelola (bukan dimiliki) bersama berkat kolaborasi dari:</b></p>
                        <b>Publikasi:</b>
                        <ul>
                            <li><a href="https://twitter.com/sigitwid/" target="_blank">Sigit Widodo</a></li>
                            <li><a href="https://twitter.com/iniPurwokerto/" target="_blank">@iniPurwokerto</a></li>
                        </ul>
                        <b>Teknis:</b>
                        <ul>
                            <li><a href="https://twitter.com/rakaadityaa/" target="_blank">Raka Aditya</a> (Web Developer)</li>
                            <li><a href="https://twitter.com/so3p/" target="_blank">Supriyanto</a> (Domain Registrant)</li>
                            <li><a href="http://www.krisfajar.net" target="_blank">Kris Fajar</a> (Server Provider)</li>
                            <li><a href="https://twitter.com/uungferi/" target="_blank">Uung Feri</a> (Desain Logo)</li>
                            <li><a href="https://twitter.com/aryakulo/" target="_blank">Arya Rizki</a> (Desain Grafis)</li>
                        </ul>
                </div>
            </div>
            <div class="row content">
                <hr/>
                <div class="col-md-12 about">
                    <p><b>Update 9 November 16:00 WIB:</b></p>
                    <p>Karena semakin banyaknya komentar-komentar yang mengandung rasialis dan kata-kata tidak sopan, dengan terpaksa teman-teman meminta untuk ditambahkan moderasi. Maka saat ini komentar yang tidak lolos moderasi tidak ditampilkan dan tetap kami simpan untuk arsip kami.</p>
                </div>
            </div>
        </div>
    </div>
@endsection