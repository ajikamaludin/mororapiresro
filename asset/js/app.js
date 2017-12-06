//STAR OF ADMIN MEJA
//tambah meja baru
$(document).on('click','#simpanMeja',function(){
    var nomeja = $('#inputNoMeja').val();
    var kodemeja = $('#inputKodeMeja').val();
    if((nomeja && kodemeja) == ''){
        console.log('kod dan no kosong');
        $('#pesan').text("No Meja dan Kode Meja tidak boleh kosong");
        $('#pesan').show();
        setTimeout(function(){
            $('#pesan').hide();
        },3000);
    }else{
        $.ajax({
            beforeSend: function () {
                $('#simpanMeja').hide();
                $('#loadingSimpan').show();
            },
            method : "POST",
            url: "core.ajax.php",
            data : {
                aksi : 'tambah_meja',
                nomeja : nomeja,
                kodemeja : kodemeja
            },
            success : function(data){
                idmeja = data;
                if(data == "error"){
                    $('#pesan').text("Meja Gagal ditambahkan");
                    $('#pesan').show();
                    setTimeout(function () {
                        $('#pesan').hide();
                    }, 3000);
                }else{
                    $('#pesan2').text("Meja Berhasil ditambahkan");
                    $('#pesan2').show();
                    setTimeout(function () {
                        $('#pesan2').hide();
                    }, 3000);
                    $('#inputNoMeja').val('');
                    $('#inputKodeMeja').val('');
                    // ?
                    $('#tabelMeja').append('<tr id="meja_' + idmeja + '">' +
                        '<td><h1>' + nomeja + '</h1></td >' +
                        '<td>' + kodemeja + '</td>' +
                        '<td>' +
                            '<div style="float:left;margin-right:5px;margin-bottom:5px;" class="btnUbahMeja" data-id-meja="' + idmeja +
                            '" data-no-meja="' + nomeja + '" data-kode-meja="' + kodemeja + '">' +
                                '<button class="btn btn-secondary">Ubah</button>' +
                            '</div>' +
                            '<div class="btnHapusMeja" data-id-meja="' + idmeja + '">' +
                                '<button class="btn btn-danger">Hapus</button>' +
                            '</div>' +
                        '</td></tr >');
                }
            },
            error : function(){
                $('#pesan').text("Koneksi gagal, coba lagi");
                $('#pesan').show();
                setTimeout(function () {
                    $('#pesan').hide();
                }, 3000);
                $('#simpanMeja').show();
                $('#loadingSimpan').hide();
            },
            complete: function () {
                $('#simpanMeja').show();
                $('#loadingSimpan').hide();
            },
        });
    }
});

//klik ubah di meja
$(document).on('click', '.btnUbahMeja', function () {
    var idmeja = $(this).attr('data-id-meja');
    var nomeja = $(this).attr('data-no-meja');
    var kodemeja = $(this).attr('data-kode-meja');
    $('#modalUbah').modal('show');
    $('#inputUbahIdMeja').val(idmeja);
    $('#inputUbahNoMeja').val(nomeja);
    $('#inputUbahKodeMeja').val(kodemeja);
});

//menyimpan perubahan di meja
$(document).on('click', '#ubahMeja', function () {
    var idmeja = $('#inputUbahIdMeja').val();
    var nomeja = $('#inputUbahNoMeja').val();
    var kodemeja = $('#inputUbahKodeMeja').val();
    if ( idmeja == '' ){
        $('#pesanUbah').text("Terjadi Kesalahan di Sistem");
        $('#pesanUbah').show();
        setTimeout(function () {
            $('#pesanUbah').hide();
        }, 3000);
    } else {
        if ((nomeja == '') && (kodemeja == '')) {
            $('#pesanUbah').text("No Meja dan Kode Meja tidak boleh kosong");
            $('#pesanUbah').show();
            setTimeout(function () {
                $('#pesanUbah').hide();
            }, 3000);
        } else {
            $.ajax({
                beforeSend: function () {
                    $('#ubahMeja').hide();
                    $('#loadingSimpan2').show();
                },
                method: "POST",
                url: "core.ajax.php",
                data: {
                    aksi: 'ubah_meja',
                    idmeja: idmeja,
                    nomeja: nomeja,
                    kodemeja: kodemeja,
                },
                success: function (data) {
                    if (data == "1") {
                        $('#pesan2Ubah').text("Meja Berhasil diubah");
                        $('#pesan2Ubah').show();
                        setTimeout(function () {
                            $('#pesan2Ubah').hide();
                        }, 3000);
                        $('#meja_'+idmeja).remove();
                        $('#tabelMeja').append('<tr id="meja_' + idmeja + '">' +
                            '<td><h1>' + nomeja + '</h1></td >' +
                            '<td>' + kodemeja + '</td>' +
                            '<td>' +
                            '<div style="float:left;margin-right:5px;margin-bottom:5px;" class="btnUbahMeja" data-id-meja="' + idmeja +
                            '" data-no-meja="' + nomeja + '" data-kode-meja="' + kodemeja + '">' +
                                '<button class="btn btn-secondary">Ubah</button>' +
                            '</div>' +
                            '<div class="btnHapusMeja" data-id-meja="' + idmeja + '">' +
                                '<button class="btn btn-danger">Hapus</button>' +
                            '</div>' +
                            '</td></tr >');
                    } else if (data == "0") {
                        $('#pesanUbah').text("Meja Gagal diubah");
                        $('#pesanUbah').show();
                        setTimeout(function () {
                            $('#pesanUbah').hide();
                        }, 3000);

                    }
                },
                error: function () {
                    $('#pesanUbah').text("Koneksi gagal, coba lagi");
                    $('#pesanUbah').show();
                    setTimeout(function () {
                        $('#pesanUbah').hide();
                    }, 3000);
                    $('#ubahMeja').show();
                    $('#loadingSimpan2').hide();
                },
                complete: function () {
                    $('#ubahMeja').show();
                    $('#loadingSimpan2').hide();
                },
            });
        }
    }
});

//klik hapus di meja
$(document).on('click', '.btnHapusMeja', function () {
    var idmeja = $(this).attr('data-id-meja');
    ask = confirm("Anda yakin akan menghapus meja ?");
    if ((!idmeja == '') && (ask)){
        $.ajax({
            method: "POST",
            url: "core.ajax.php",
            data: {
                aksi: 'hapus_meja',
                idmeja: idmeja,
            },
            success: function (data) {
                if (data == "1") {
                    $('#pesan2Meja').text("Meja Berhasil dihapus");
                    $('#pesan2Meja').show();
                    setTimeout(function () {
                        $('#pesan2Meja').hide();
                    }, 3000);
                    $('#meja_' + idmeja).remove();
                } else if (data == "0") {
                    $('#pesanMeja').text("Meja Gagal dihapus");
                    $('#pesanMeja').show();
                    setTimeout(function () {
                        $('#pesanMeja').hide();
                    }, 3000);

                }
            },
            error: function () {
                $('#pesanMeja').text("Koneksi gagal, coba lagi");
                $('#pesanMeja').show();
                setTimeout(function () {
                    $('#pesanMeja').hide();
                }, 3000);
            },
        });
    }
});
//END OF ADMIN MEJA
// START OF ADMIN MENU MAKANAN
//tambah menu makanan baru
$(document).on('click','#simpanMakanan',function(){

    //Upload Gambar
    var gambar = new FormData;
    gambar.append('file',$('#fileGambar')[0].files[0]);
    var imgname = $('input[type=file]').val();
    var ext = imgname.substr((imgname.lastIndexOf('.') + 1));
    if(imgname == ''){
        $('#pesanMakanan').text("Gambar Harus Dimasukan");
        $('#pesanMakanan').show();
        setTimeout(function () {
            $('#pesanMakanan').hide();
        }, 3000);
    }else{
         var nama = $('#inputNamaMakanan').val();
         var harga = $('#inputHargaMakanan').val();
         var stok = $('#inputStokMakanan').val();
         if ((harga == '') && (stok == '') && (nama == '') ){
             $('#pesanMakanan').text("Nama,Harga dan Stok Harus Dimasukan");
             $('#pesanMakanan').show();
             setTimeout(function () {
                 $('#pesanMakanan').hide();
             }, 3000);
         }else{
            $.ajax({
                beforeSend: function(){
                    $('#simpanMakanan').hide();
                    $('#loadingSimpan').show();
                },
                method: "POST",
                url: "image.ajax.php",
                data: gambar,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                success: function (data) {
                    var namaGambar = data;
                    if(namaGambar == "0"){
                        $('#pesanMakanan').text("Maaf Makanan Gagal dimasukan");
                        $('#pesanMakanan').show();
                        setTimeout(function () {
                            $('#pesanMakanan').hide();
                        }, 3000);
                    }else{
                            //Memasukan Makanan Ke Database
                            $.ajax({
                                method: 'POST',
                                url: 'core.ajax.php',
                                data: {
                                    aksi : 'tambah_menu_makan',
                                    nama : nama,
                                    harga : harga,
                                    stok : stok,
                                    gambar : namaGambar,
                                    type : ext,
                                },
                                success: function(data){
                                    var id = data;
                                    if(data == 'error' || data == '0'){
                                        $('#pesanMakanan').text("Maaf Makanan Gagal dimasukan, gambar telah di kirim");
                                        $('#pesanMakanan').show();
                                        setTimeout(function () {
                                            $('#pesanMakanan').hide();
                                        }, 3000);
                                    }else{
                                        $('#inputNamaMakanan').val('');
                                        $('#inputHargaMakanan').val('');
                                        $('#inputStokMakanan').val('');
                                        $('#pesanMakanan2').text("Makanan Telah di tambahkan");
                                        $('#pesanMakanan2').show();
                                        setTimeout(function () {
                                            $('#pesanMakanan2').hide();
                                        }, 3000);
                                        $('#tabelMakanan').append('<tr id="makanan_'+ id +'">' + 
                                                '<th scope="row"><img class="card-img-top" style="width:10rem" src="'+ namaGambar +'" alt="'+ nama +'"></th>'+
                                                '<td>' + nama + '</td>' + 
                                                '<td>Rp. '+ harga +' / Porsi</td>' +
                                                '<td>'+ stok +'</td>' + 
                                                '<td>' +
                                                    '<div style="float:left;margin-right:5px;margin-bottom:5px;" class="btnUbahMakanan"' +
                                                    'data-id-makanan="'+ id +'"' +
                                                    'data-nama-makanan="'+ nama +'" ' +
                                                    'data-harga-makanan="' + harga + '" ' +
                                                    'data-stok-makanan="'+ stok +'" ' +
                                                    'data-gambar-makanan="' + namaGambar + '"' +
                                                    '>' +
                                                        '<button class="btn  btn-secondary">Ubah</button>' +
                                                    '</div>' +
                                                    '<div class="btnHapusMakanan" data-id-makanan="'+ id +'" >' +
                                                        '<button class="btn btn-danger">Hapus</button>' +
                                                    '</div></td></tr>');
                                    }
                                },
                                error: function(){
                                    $('#pesanMakanan').text("Koneksi Gagal, Coba Lagi");
                                    $('#pesanMakanan').show();
                                    setTimeout(function () {
                                        $('#pesanMakanan').hide();
                                    }, 3000);
                                }
                            });
                        }
                },
                error: function () {
                    $('#pesanMakanan').text("Koneksi Gagal, Coba Lagi");
                    $('#pesanMakanan').show();
                    setTimeout(function () {
                        $('#pesanMakanan').hide();
                    }, 3000);
                    $('#simpanMakanan').show();
                    $('#loadingSimpan').hide();
                },
                complete: function () {
                    $('#simpanMakanan').show();
                    $('#loadingSimpan').hide();
                },
            });
        }
    }
});
//Ubah Makanan Tringger Modal
$(document).on('click','.btnUbahMakanan',function(){
    var id = $(this).attr('data-id-makanan');
    var nama = $(this).attr('data-nama-makanan');
    var harga = $(this).attr('data-harga-makanan');
    var stok = $(this).attr('data-stok-makanan');
    var namaGambar = $(this).attr('data-gambar-makanan');
    $('#modalUbahMakanan').modal('show');
    $('#inputUbahIdMakanan').val(id);
    $('#inputUbahNamaMakanan').val(nama);
    $('#inputUbahHargaMakanan').val(harga);
    $('#inputUbahStokMakanan').val(stok);
    $('#inputUbahGambarMakanan').val(namaGambar);
});

//Simpan Perubahan Makanan
$(document).on('click','#ubahMakanan',function(){
    var id = $('#inputUbahIdMakanan').val();
    var nama = $('#inputUbahNamaMakanan').val();
    var harga = $('#inputUbahHargaMakanan').val();
    var stok = $('#inputUbahStokMakanan').val();
    var namaGambar = $('#inputUbahGambarMakanan').val();
    if (id == ''){
        $('#pesanUbahMakanan').text("Maaf terjadi kesalahan di sistem");
        $('#pesanUbahMakanan').show();
        setTimeout(function () {
            $('#pesanUbahMakanan').hide();
        }, 3000);
    }else{ 
        if((harga == '') && (stok == '') && (nama == '')) {
            $('#pesanUbahMakanan').text("Nama,Harga dan Stok Harus Dimasukan");
            $('#pesanUbahMakanan').show();
            setTimeout(function () {
                $('#pesanUbahMakanan').hide();
            }, 3000);
        } else {
            //Upload Gambar
            var gambar = new FormData;
            gambar.append('file', $('#ubahfileGambar')[0].files[0]);
            var imgname = $('#ubahfileGambar').val();
            var ext = imgname.substr((imgname.lastIndexOf('.') + 1));
            console.log(imgname);
            if (imgname == '') {
                 //Memasukan Perubahan Makanan Ke Database
                 $.ajax({
                     beforeSend: function(){
                        $('#ubahMakanan').hide();
                        $('#loadingSimpan2').show();
                     },
                     method: 'POST',
                     url: 'core.ajax.php',
                     data: {
                         aksi: 'ubah_menu_makan',
                         id : id,
                         nama: nama,
                         harga: harga,
                         stok: stok,
                     },
                     success: function (data) {
                         if (data == "0") {
                             $('#pesanUbahMakanan').text("Maaf Makanan Gagal diubah");
                             $('#pesanUbahMakanan').show();
                             setTimeout(function () {
                                 $('#pesanUbahMakanan').hide();
                             }, 3000);
                         } else {
                             $('#pesanUbahMakanan2').text("Makanan Telah di ubah");
                             $('#pesanUbahMakanan2').show();
                             setTimeout(function () {
                                 $('#pesanUbahMakanan2').hide();
                             }, 3000);
                             
                             $('#makanan_'+id).remove();
                             $('#tabelMakanan').append('<tr id="makanan_' + id + '">' +
                                 '<th scope="row"><img class="card-img-top" style="width:10rem" src="' + namaGambar + '" alt="' + nama + '"></th>' +
                                 '<td>' + nama + '</td>' +
                                 '<td>Rp. ' + harga + ' / Porsi</td>' +
                                 '<td>' + stok + '</td>' +
                                 '<td>' +
                                 '<div style="float:left;margin-right:5px;margin-bottom:5px;" class="btnUbahMakanan"' +
                                 'data-id-makanan="' + id + '"' +
                                 'data-nama-makanan="' + nama + '" ' +
                                 'data-harga-makanan="' + harga + '" ' +
                                 'data-stok-makanan="' + stok + '" ' +
                                 'data-gambar-makanan="' + namaGambar + '"' +
                                 '>' +
                                 '<button class="btn  btn-secondary">Ubah</button>' +
                                 '</div>' +
                                 '<div class="btnHapusMakanan" data-id-makanan="' + id + '" >' +
                                 '<button class="btn btn-danger">Hapus</button>' +
                                 '</div></td></tr>');
                         }
                     },
                     error: function () {
                         $('#pesanUbahMakanan').text("Koneksi Gagal, Coba Lagi");
                         $('#pesanUbahMakanan').show();
                         setTimeout(function () {
                             $('#pesanMakanan').hide();
                         }, 3000);
                         $('#ubahMakanan').show();
                         $('loadingSimpan2').hide();
                     },
                     complete: function () {
                         $('#ubahMakanan').show();
                         $('#loadingSimpan2').hide();
                     },
                 });
            }else{
                $.ajax({
                    beforeSend: function () {
                        $('#ubahMakanan').hide();
                        $('#loadingSimpan2').show();
                    },
                    method: "POST",
                    url: "image.ajax.php",
                    data: gambar,
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        var namaGambar = data;
                        if (namaGambar == "0") {
                            $('#pesanUbahMakanan').text("Maaf Makanan Gagal diubah");
                            $('#pesanUbahMakanan').show();
                            setTimeout(function () {
                                $('#pesanUbahMakanan').hide();
                            }, 3000);
                        } else {
                            //Memasukan Makanan Ke Database
                            console.log(namaGambar);
                            $.ajax({
                                method: 'POST',
                                url: 'core.ajax.php',
                                data: {
                                    aksi: 'ubah_menu_makan',
                                    id: id,
                                    nama: nama,
                                    harga: harga,
                                    stok: stok,
                                    gambar: namaGambar,
                                },
                                success: function (data) {
                                    if (data == "0") {
                                        $('#pesanUbahMakanan').text("Maaf Makanan Gagal diubah");
                                        $('#pesanUbahMakanan').show();
                                        setTimeout(function () {
                                            $('#pesanUbahMakanan').hide();
                                        }, 3000);
                                    } else {
                                        $('#pesanUbahMakanan2').text("Makanan Telah di ubah");
                                        $('#pesanUbahMakanan2').show();
                                        setTimeout(function () {
                                            $('#pesanUbahMakanan2').hide();
                                        }, 3000);
                                        // ? Remove and Add Element tabel here
                                        $('#makanan_' + id).remove();
                                        $('#tabelMakanan').append('<tr id="makanan_' + id + '">' +
                                            '<th scope="row"><img class="card-img-top" style="width:10rem" src="' + namaGambar + '" alt="' + nama + '"></th>' +
                                            '<td>' + nama + '</td>' +
                                            '<td>Rp. ' + harga + ' / Porsi</td>' +
                                            '<td>' + stok + '</td>' +
                                            '<td>' +
                                            '<div style="float:left;margin-right:5px;margin-bottom:5px;" class="btnUbahMakanan"' +
                                            'data-id-makanan="' + id + '"' +
                                            'data-nama-makanan="' + nama + '" ' +
                                            'data-harga-makanan="' + harga + '" ' +
                                            'data-stok-makanan="' + stok + '" ' +
                                            'data-gambar-makanan="' + namaGambar + '"' +
                                            '>' +
                                            '<button class="btn  btn-secondary">Ubah</button>' +
                                            '</div>' +
                                            '<div class="btnHapusMakanan" data-id-makanan="' + id + '" >' +
                                            '<button class="btn btn-danger">Hapus</button>' +
                                            '</div></td></tr>');
                                    }
                                },
                                error: function () {
                                    $('#pesanUbahMakanan').text("Koneksi Gagal, Coba Lagi");
                                    $('#pesanUbahMakanan').show();
                                    setTimeout(function () {
                                        $('#pesanMakanan').hide();
                                    }, 3000);
                                },
                            });
                        }
                    },
                    error: function () {
                        $('#pesanUbahMakanan').text("Koneksi Gagal, Coba Lagi");
                        $('#pesanUbahMakanan').show();
                        setTimeout(function () {
                            $('#pesanUbahMakanan').hide();
                        }, 3000);
                        $('#ubahMakanan').show();
                        $('#loadingSimpan2').hide();
                    },
                    complete: function () {
                        $('#ubahMakanan').show();
                        $('#loadingSimpan2').hide();
                    },
                });
            }
        }
    }
});

// Hapus Menu Makanan
$(document).on('click','.btnHapusMakanan',function(){
    var id = $(this).attr('data-id-makanan');
    ask = confirm('Anda Yakin akan menghapus menu ?');
    if(id == ''){
        $('#pesanMakananDash2').text("Maaf Terjadi Kesalahan di sistem");
        $('#pesanMakananDash2').show();
        setTimeout(function () {
            $('#pesanMakananDash2').hide();
        }, 3000);
    }else{
        if(ask){
             $.ajax({
                method: 'POST',
                url: 'core.ajax.php',
                data: {
                    aksi: 'hapus_menu_makan',
                    id: id
                },
                success: function (data) {
                    if(data == "0"){
                        $('#pesanMakananDash2').text("Makanan Gagal dihapus");
                        $('#pesanMakananDash2').show();
                        setTimeout(function () {
                            $('#pesanMakananDash2').hide();
                        }, 3000);
                    }else{
                        $('#pesanMakananDash').text("Makanan Berhasil dihapus");
                        $('#pesanMakananDash').show();
                        setTimeout(function () {
                            $('#pesanMakananDash').hide();
                        }, 3000);
                        $('#makanan_'+id).remove();
                    }
                },
                error: function(){
                        $('#pesanMakananDash2').text("Koneksi Gagal, Coba Lagi");
                        $('#pesanMakananDash2').show();
                        setTimeout(function () {
                            $('#pesanMakananDash2').hide();
                        }, 3000);
                }
            });
        }
    }
});
// END OF ADMIN MENU MAKANAN
// START OF ADMIN MENU MINUMAN
//tambah menu minuman baru
$(document).on('click', '#simpanMinuman', function () {

    //Upload Gambar
    var gambar = new FormData;
    gambar.append('file', $('#fileGambar')[0].files[0]);
    var imgname = $('input[type=file]').val();
    var ext = imgname.substr((imgname.lastIndexOf('.') + 1));
    if (imgname == '') {
        $('#pesanMinuman').text("Gambar Harus Dimasukan");
        $('#pesanMinuman').show();
        setTimeout(function () {
            $('#pesanMinuman').hide();
        }, 3000);
    } else {
        var nama = $('#inputNamaMinuman').val();
        var harga = $('#inputHargaMinuman').val();
        var stok = $('#inputStokMinuman').val();
        if ((harga == '') && (stok == '') && (nama == '')) {
            $('#pesanMinuman').text("Nama,Harga dan Stok Harus Dimasukan");
            $('#pesanMinuman').show();
            setTimeout(function () {
                $('#pesanMinuman').hide();
            }, 3000);
        } else {
            $.ajax({
                beforeSend: function(){
                    $('#simpanMinuman').hide();
                    $('#loadingSimpan').show();
                },
                method: "POST",
                url: "image.ajax.php",
                data: gambar,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                success: function (data) {
                    var namaGambar = data;
                    if (namaGambar == "0") {
                        $('#pesanMinuman').text("Maaf Minuman Gagal dimasukan");
                        $('#pesanMinuman').show();
                        setTimeout(function () {
                            $('#pesanMinuman').hide();
                        }, 3000);
                    } else {
                        //Memasukan Minuman Ke Database
                        $.ajax({
                            method: 'POST',
                            url: 'core.ajax.php',
                            data: {
                                aksi: 'tambah_menu_minum',
                                nama: nama,
                                harga: harga,
                                stok: stok,
                                gambar: namaGambar,
                                type: ext,
                            },
                            success: function (data) {
                                console.log(data);
                                var id = data;
                                if (data == 'error' || data == '0') {
                                    $('#pesanMinuman').text("Maaf Minuman Gagal dimasukan, gambar telah di kirim");
                                    $('#pesanMinuman').show();
                                    setTimeout(function () {
                                        $('#pesanMinuman').hide();
                                    }, 3000);
                                } else {
                                    $('#inputNamaMinuman').val('');
                                    $('#inputHargaMinuman').val('');
                                    $('#inputStokMinuman').val('');
                                    $('#pesanMinuman2').text("Minuman Telah di tambahkan");
                                    $('#pesanMinuman2').show();
                                    setTimeout(function () {
                                        $('#pesanMinuman2').hide();
                                    }, 3000);
                                    $('#tabelMinuman').append('<tr id="minuman_' + id + '">' +
                                        '<th scope="row"><img class="card-img-top" style="width:10rem" src="' + namaGambar + '" alt="' + nama + '"></th>' +
                                        '<td>' + nama + '</td>' +
                                        '<td>Rp. ' + harga + ' / Porsi</td>' +
                                        '<td>' + stok + '</td>' +
                                        '<td>' +
                                        '<div style="float:left;margin-right:5px;margin-bottom:5px;" class="btnUbahMinuman"' +
                                        'data-id-minuman="' + id + '"' +
                                        'data-nama-minuman="' + nama + '" ' +
                                        'data-harga-minuman="' + harga + '" ' +
                                        'data-stok-minuman="' + stok + '" ' +
                                        'data-gambar-minuman="' + namaGambar + '"' +
                                        '>' +
                                        '<button class="btn  btn-secondary">Ubah</button>' +
                                        '</div>' +
                                        '<div class="btnHapusMinuman" data-id-minuman="' + id + '" >' +
                                        '<button class="btn btn-danger">Hapus</button>' +
                                        '</div></td></tr>');
                                }
                            },
                            error: function () {
                                $('#pesanMinuman').text("Koneksi Gagal, Coba Lagi");
                                $('#pesanMinuman').show();
                                setTimeout(function () {
                                    $('#pesanMinuman').hide();
                                }, 3000);
                                $('#simpanMinuman').show();
                                $('#loadingSimpan').hide();
                            } 
                        });
                    }
                },
                error: function () {
                    $('#pesanMinuman').text("Koneksi Gagal, Coba Lagi");
                    $('#pesanMinuman').show();
                    setTimeout(function () {
                        $('#pesanMinuman').hide();
                    }, 3000);
                    $('#simpanMinuman').show();
                    $('#loadingSimpan').hide();
                },
                complete: function () {
                    $('#simpanMinuman').show();
                    $('#loadingSimpan').hide();
                },
            });
        }
    }
});
//Ubah Minuman Tringger Modal
$(document).on('click', '.btnUbahMinuman', function () {
    var id = $(this).attr('data-id-minuman');
    var nama = $(this).attr('data-nama-minuman');
    var harga = $(this).attr('data-harga-minuman');
    var stok = $(this).attr('data-stok-minuman');
    var namaGambar = $(this).attr('data-gambar-minuman');
    $('#modalUbahMinuman').modal('show');
    $('#inputUbahIdMinuman').val(id);
    $('#inputUbahNamaMinuman').val(nama);
    $('#inputUbahHargaMinuman').val(harga);
    $('#inputUbahStokMinuman').val(stok);
    $('#inputUbahGambarMinuman').val(namaGambar);
});

//Simpan Perubahan Makanan
$(document).on('click', '#ubahMinuman', function () {
    var id = $('#inputUbahIdMinuman').val();
    var nama = $('#inputUbahNamaMinuman').val();
    var harga = $('#inputUbahHargaMinuman').val();
    var stok = $('#inputUbahStokMinuman').val();
    var namaGambar = $('#inputUbahGambarMinuman').val();
    if (id == '') {
        $('#pesanUbahMinuman').text("Maaf terjadi kesalahan di sistem");
        $('#pesanUbahMinuman').show();
        setTimeout(function () {
            $('#pesanUbahMinuman').hide();
        }, 3000);
    } else {
        if ((harga == '') && (stok == '') && (nama == '')) {
            $('#pesanUbahMinuman').text("Nama,Harga dan Stok Harus Dimasukan");
            $('#pesanUbahMinuman').show();
            setTimeout(function () {
                $('#pesanUbahMinuman').hide();
            }, 3000);
        } else {
            //Upload Gambar
            var gambar = new FormData;
            gambar.append('file', $('#ubahfileGambar')[0].files[0]);
            var imgname = $('#ubahfileGambar').val();
            var ext = imgname.substr((imgname.lastIndexOf('.') + 1));
            console.log(imgname);
            if (imgname == '') {
                //Memasukan Perubahan Minuman Ke Database
                $.ajax({
                    beforeSend: function(){
                        $('#ubahMinuman').hide();
                        $('#loadingSimpan2').show();
                    },
                    method: 'POST',
                    url: 'core.ajax.php',
                    data: {
                        aksi: 'ubah_menu_minum',
                        id: id,
                        nama: nama,
                        harga: harga,
                        stok: stok,
                    },
                    success: function (data) {
                        if (data == "0") {
                            $('#pesanUbahMinuman').text("Maaf Minuman Gagal diubah");
                            $('#pesanUbahMinuman').show();
                            setTimeout(function () {
                                $('#pesanUbahMinuman').hide();
                            }, 3000);
                        } else {
                            $('#pesanUbahMinuman2').text("Minuman Telah di ubah");
                            $('#pesanUbahMinuman2').show();
                            setTimeout(function () {
                                $('#pesanUbahMinuman2').hide();
                            }, 3000);

                            $('#minuman_' + id).remove();
                            $('#tabelMinuman').append('<tr id="minuman_' + id + '">' +
                                '<th scope="row"><img class="card-img-top" style="width:10rem" src="' + namaGambar + '" alt="' + nama + '"></th>' +
                                '<td>' + nama + '</td>' +
                                '<td>Rp. ' + harga + ' / Porsi</td>' +
                                '<td>' + stok + '</td>' +
                                '<td>' +
                                '<div style="float:left;margin-right:5px;margin-bottom:5px;" class="btnUbahMinuman"' +
                                'data-id-minuman="' + id + '"' +
                                'data-nama-minuman="' + nama + '" ' +
                                'data-harga-minuman="' + harga + '" ' +
                                'data-stok-minuman="' + stok + '" ' +
                                'data-gambar-minuman="' + namaGambar + '"' +
                                '>' +
                                '<button class="btn  btn-secondary">Ubah</button>' +
                                '</div>' +
                                '<div class="btnHapusMinuman" data-id-minuman="' + id + '" >' +
                                '<button class="btn btn-danger">Hapus</button>' +
                                '</div></td></tr>');
                        }
                    },
                    error: function () {
                        $('#pesanUbahMinuman').text("Koneksi Gagal, Coba Lagi");
                        $('#pesanUbahMinuman').show();
                        setTimeout(function () {
                            $('#pesanMinuman').hide();
                        }, 3000);
                        $('#ubahMinuman').show();
                        $('#loadingSimpan2').hide();
                    },
                    complete: function () {
                        $('#ubahMinuman').show();
                        $('#loadingSimpan2').hide();
                    },
                });
            } else {
                $.ajax({
                    beforeSend: function () {
                        $('#ubahMinuman').hide();
                        $('#loadingSimpan2').show();
                    },
                    method: "POST",
                    url: "image.ajax.php",
                    data: gambar,
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        var namaGambar = data;
                        if (namaGambar == "0") {
                            $('#pesanUbahMinuman').text("Maaf Minuman Gagal diubah");
                            $('#pesanUbahMinuman').show();
                            setTimeout(function () {
                                $('#pesanUbahMinuman').hide();
                            }, 3000);
                        } else {
                            //Memasukan Minuman Ke Database
                            console.log(namaGambar);
                            $.ajax({
                                method: 'POST',
                                url: 'core.ajax.php',
                                data: {
                                    aksi: 'ubah_menu_minum',
                                    id: id,
                                    nama: nama,
                                    harga: harga,
                                    stok: stok,
                                    gambar: namaGambar,
                                },
                                success: function (data) {
                                    if (data == "0") {
                                        $('#pesanUbahMinuman').text("Maaf Minuman Gagal diubah");
                                        $('#pesanUbahMinuman').show();
                                        setTimeout(function () {
                                            $('#pesanUbahMinuman').hide();
                                        }, 3000);
                                    } else {
                                        $('#pesanUbahMinuman2').text("Minuman Telah di ubah");
                                        $('#pesanUbahMinuman2').show();
                                        setTimeout(function () {
                                            $('#pesanUbahMinuman2').hide();
                                        }, 3000);
                                        $('#minuman_' + id).remove();
                                        $('#tabelMinuman').append('<tr id="minuman_' + id + '">' +
                                            '<th scope="row"><img class="card-img-top" style="width:10rem" src="' + namaGambar + '" alt="' + nama + '"></th>' +
                                            '<td>' + nama + '</td>' +
                                            '<td>Rp. ' + harga + ' / Porsi</td>' +
                                            '<td>' + stok + '</td>' +
                                            '<td>' +
                                            '<div style="float:left;margin-right:5px;margin-bottom:5px;" class="btnUbahMinuman"' +
                                            'data-id-minuman="' + id + '"' +
                                            'data-nama-minuman="' + nama + '" ' +
                                            'data-harga-minuman="' + harga + '" ' +
                                            'data-stok-minuman="' + stok + '" ' +
                                            'data-gambar-minuman="' + namaGambar + '"' +
                                            '>' +
                                            '<button class="btn  btn-secondary">Ubah</button>' +
                                            '</div>' +
                                            '<div class="btnHapusMinuman" data-id-minuman="' + id + '" >' +
                                            '<button class="btn btn-danger">Hapus</button>' +
                                            '</div></td></tr>');
                                    }
                                },
                                error: function () {
                                    $('#pesanUbahMinuman').text("Koneksi Gagal, Coba Lagi");
                                    $('#pesanUbahMinuman').show();
                                    setTimeout(function () {
                                        $('#pesanMinuman').hide();
                                    }, 3000);
                                    $('#ubahMinuman').show();
                                    $('#loadingSimpan2').hide();
                                },
                            });
                        }
                    },
                    error: function () {
                        $('#pesanUbahMinuman').text("Koneksi Gagal, Coba Lagi");
                        $('#pesanUbahMinuman').show();
                        setTimeout(function () {
                            $('#pesanUbahMinuman').hide();
                        }, 3000);
                        $('#ubahMinuman').show();
                        $('#loadingSimpan2').hide();
                    },
                    complete: function () {
                        $('#ubahMinuman').show();
                        $('#loadingSimpan2').hide();
                    },
                });
            }
        }
    }
});
// Hapus Menu Minuman
$(document).on('click', '.btnHapusMinuman', function () {
    var id = $(this).attr('data-id-minuman');
    ask = confirm('Anda Yakin akan menghapus menu ?');
    if (id == '') {
        $('#pesanMinumanDash2').text("Maaf Terjadi Kesalahan di sistem");
        $('#pesanMinumanDash2').show();
        setTimeout(function () {
            $('#pesanMinumanDash2').hide();
        }, 3000);
    } else {
        if (ask) {
            $.ajax({
                method: 'POST',
                url: 'core.ajax.php',
                data: {
                    aksi: 'hapus_menu_minum',
                    id: id
                },
                success: function (data) {
                    if (data == "0") {
                        $('#pesanMinumanDash2').text("Minuman Gagal dihapus");
                        $('#pesanMinumanDash2').show();
                        setTimeout(function () {
                            $('#pesanMinumanDash2').hide();
                        }, 3000);
                    } else {
                        $('#pesanMinumanDash').text("Minuman Berhasil dihapus");
                        $('#pesanMinumanDash').show();
                        setTimeout(function () {
                            $('#pesanMinumanDash').hide();
                        }, 3000);
                        $('#minuman_' + id).remove();
                    }
                },
                error: function () {
                    $('#pesanMinumanDash2').text("Koneksi Gagal, Coba Lagi");
                    $('#pesanMinumanDash2').show();
                    setTimeout(function () {
                        $('#pesanMinumanDash2').hide();
                    }, 3000);
                }
            });
        }
    }
});
//END OF ADMIN MINUMAN
//START OF ADMIN MENU SPESIAL
//klik ubah di spesial
$(document).on('click', '.btnUbahSpesial', function () {
    var idspesial = $(this).attr('data-id-spesial');
    $('#modalUbahSpesial').modal('show');
    $('#ubahIdSpesial').val(idspesial);
});

//klik simpan di perubahan spesial
var newId;
$('#selectMenu').change(function () {
    newId = $(this).val();
});
$(document).on('click', '#simpanSpesial', function () {
    var oldId = $('#ubahIdSpesial').val();
    if (newId == 0 || typeof newId == 'undefined') {
        $('#pesanSpesial').text("Anda Harus Memilih Menu");
        $('#pesanSpesial').show();
        setTimeout(function () {
            $('#pesanSpesial').hide();
        }, 3000);
    }else if(newId == oldId){
        //nothing todo
        $('#pesanSpesial2').text("Menu Spesial tidak berubah");
        $('#pesanSpesial2').show();
        setTimeout(function () {
            $('#pesanSpesial2').hide();
        }, 3000);
    }else{
        $.ajax({
            method : 'POST',
            url: 'core.ajax.php',
            data: {
                aksi: 'ubah_menu_spesial',
                oldid: oldId,
                newid: newId
            },
            success: function(data){
                if(data == "0" || data == ''){
                    $('#pesanSpesial').text("Perubahan gagal disimpan");
                    $('#pesanSpesial').show();
                    setTimeout(function () {
                        $('#pesanSpesial').hide();
                    }, 3000);
                }else{
                    var dataJson = JSON.parse(data);
                    gambar = dataJson['gambar'];
                    nama = dataJson['nama'];
                    harga = dataJson['harga'];
                    var item = '<div class="card" style="width: 20rem;" id="spesial_'+ newId +'">' +
                        '<img class="card-img-top" src="'+gambar+'" alt = "Card image cap" >' +
                        '<div class = "card-body">' + 
                        '<h4 class = "card-title"> '+ nama +' </h4>' +
                        '<p class = "card-text" > Rp.' + harga + ' / Porsi </p>' + 
                        '<div class = "btnUbahSpesial"   data-id-spesial = "'+newId+'">' +
                        '<button class = "btn btn-secondary" style = "margin-bottom:5px;" > Ubah </button></div></div></div>';
                    $('#spesial_'+oldId).remove();
                    $('#groupSpesial').append(item);
                    $('#modalUbahSpesial').modal('hide');
                }
            },
            error: function(){
                $('#pesanSpesial').text("Koneksi Gagal, Coba Lagi");
                $('#pesanSpesial').show();
                setTimeout(function () {
                    $('#pesanSpesial').hide();
                }, 3000);
            }
        });
    }
});
//END OF ADMIN SPESIAL
//START OF ADMIN Dashboar Dapur
//masak selesai
$(document).on('click','#selesaiMasak',function(){
    var nota = $(this).attr('data-nota'); 
    ask = confirm("Anda yakin makanan telah selesai dimasak dan sudah diantar ?");
    if(ask){
        $.ajax({
            method: 'POST',
            url: 'core.ajax.php',
            data: {
                aksi: 'selesai_masak',
                nota: nota,
            },
            complete: function(data){
                if(data == "0"){
                    $('#txtSelesaiMasak2').text("Gagal selesai, kesalahan di sistem");
                    $('#txtSelesaiMasak2').show();
                    setTimeout(function () {
                        $('#txtSelesaiMasak2').hide();
                    }, 3000);
                }else{
                    $('#txtSelesaiMasak').text("Selesai, Makanan diantar");
                    $('#txtSelesaiMasak').show();
                    setTimeout(function () {
                        $('#txtSelesaiMasak').hide();
                    }, 3000);
                    $('#dapur_'+nota).remove();
                }
            },
            error: function(data){
                $('#txtSelesaiMasak2').text("Koneksi Gagal, Coba Lagi");
                $('#txtSelesaiMasak2').show();
                setTimeout(function () {
                    $('#txtSelesaiMasak2').hide();
                }, 3000);
                console.log(data);
            }
        });
    }
});
//masak selesai satu porsi
$('.checkboxDapur').on('change',function(){
    if($(this).is(":checked")){
        console.log('yes');
    }else{
        console.log('no');
    }
});

//batal pesan 
$(document).on('click', '.batalBayar', function () {
    var nota = $(this).attr('data-nota');
    ask = confirm('Yakin untuk membatalkan pesanan ?');
    if(ask){
        $.ajax({
            method: 'POST',
            url: 'core.ajax.php',
            data: {
                aksi: 'batal_pesan',
                nota: nota,
            },
            complete: function (data) {
                if (data == "0") {
                    $('#txtSelesaiBayar2').text("Gagal selesai, kesalahan di sistem");
                    $('#txtSelesaiBayar2').show();
                    setTimeout(function () {
                        $('#txtSelesaiBayar2').hide();
                    }, 3000);
                } else {
                    $('#txtSelesaiBayar').text("Pesanan telah dibatalkan");
                    $('#txtSelesaiBayar').show();
                    setTimeout(function () {
                        $('#txtSelesaiBayar').hide();
                    }, 3000);
                    $('#nota_' + nota).remove();
                }
            },
            error: function (data) {
                $('#txtSelesaiBayar2').text("Koneksi Gagal, Coba Lagi");
                $('#txtSelesaiBayar2').show();
                setTimeout(function () {
                    $('#txtSelesaiBayar2').hide();
                }, 3000);
                console.log(data);
            }
        });
    }

});
//print tabel
$(document).on('click','#cetakNota', function () {
    var ask = confirm('yakin ingin mencetak nota ?');
    if(ask){
        $('#backBtn').hide();
        $('#cetakNota').hide();
        $('#selesaiBayar').hide();                
        window.print();
        setTimeout(function(){
            $('#backBtn').show();
            $('#cetakNota').show();
            $('#selesaiBayar').show();  
        },1000);
    }
})

//hitung kembalian
$(document).on('change','#dibayar',function(){
    var total = $('#totalBayar').text();
    var dibayar = $('#dibayar').val();
    var kembalian = dibayar - total;
    kem = parseInt(kembalian);
    if(kem < 0){
        alert("Pembayaran Kurang");
    }else{
        $('#kembalian').text(kembalian);
        $('#selesaiBayar').show();
        $('#cetakNota').show();
    }
})

//selesai bayar
$(document).on('click', '#selesaiBayar', function () {
    var nota = $(this).attr('data-nota');
    var ask = confirm('yakin untuk menyelesaikan nota ?');
    if (ask) {
        $.ajax({
            method: 'POST',
            url: 'core.ajax.php',
            data: {
                aksi: 'selesai_bayar',
                nota: nota,
            },
            complete: function (data) {
                if (data == "0") {
                    $('#txtSelesaiBayar2').text("Gagal selesai, kesalahan di sistem");
                    $('#txtSelesaiBayar2').show();
                    setTimeout(function () {
                        $('#txtSelesaiBayar2').hide();
                    }, 3000);
                } else {
                    $('#txtSelesaiBayar').text("Pesanan telah dibayarkan");
                    $('#txtSelesaiBayar').show();
                    setTimeout(function () {
                        $('#txtSelesaiBayar').hide();
                        window.location.href = "dashboard_kasir.php";
                    }, 3000);
                }
            },
            error: function (data) {
                $('#txtSelesaiBayar2').text("Koneksi Gagal, Coba Lagi");
                $('#txtSelesaiBayar2').show();
                setTimeout(function () {
                    $('#txtSelesaiBayar2').hide();
                }, 3000);
                console.log(data);
            }
        });
    }
})
// keluar dari admin
$(document).on('click', '#keluarAdmin', function () {
    ask = confirm('Anda yakin ingin keluar ?');
    if (ask) {
        window.location.href = "logout.php";
    }
});
// USER PESAN START
//klik pesan di menu
var jml = 1;
var noNota = $('#noNota').val();
var idMeja = $('#idMeja').val();

$(document).on('click', '.btnPesan', function () {
    var idpesan = $(this).attr('data-id-pesan');
    var stok = $(this).attr('data-stok');
    $('#pesanModal').modal('show');
    $('#idMenu').val(idpesan);
    $('#jmlPorsi').val(1);
    $('#stokM').val(stok);
    jml = 1;
});
//Tombol Tambah dan Kurang
$(document).on('click', '#kurangPorsi', function () {
    if(jml == 1){
    }else{
        jml = jml - 1;
        $('#jmlPorsi').val(jml);
    }    
});
$(document).on('click', '#tambahPorsi', function () {
    jml = jml + 1;
    stok = $('#stokM').val();
    stokm = parseInt(stok);
    if(jml > stokm){
        jml = jml - 1;
        alert('Maaf Porsi Hanya Tinggal ' + stokm + ' porsi');
    }else{
        $('#jmlPorsi').val(jml);
    }
});
//Ok Pesan
$(document).on('click', '#okPesan', function () {
    var idmenu = $('#idMenu').val();
    var porsi = $('#jmlPorsi').val();
    por = parseInt(porsi);
    if(por <= 0){
        alert("Pesanan tidak boleh kosong");
        return;
    }
    if((idmenu == '' && porsi == '') || (noNota == '' && idMeja == '')){
        $('#pesanError').text("Terjadi Kesalahan di sistem");
        $('#pesanError').show();
        setTimeout(function () {
            $('#pesanError').hide();
        }, 3000);
    }else{
        //do ajax -> notifed -> close modal
        $.ajax({
            beforeSend: function(){
                $('#okPesan').hide();
                $('#loadingPesan').show();
            },
            method: 'POST',
            url: 'core.ajax.php',
            data: {
                aksi: 'tambah_pesanan',
                nota: noNota,
                idmeja: idMeja,
                porsi: porsi,
                idmenu: idmenu,
            },
            success: function(data){
                if(data == "0"){
                    $('#pesanError').text("Gagal dipesan");
                    $('#pesanError').show();
                    setTimeout(function () {
                        $('#pesanError').hide();
                    }, 3000);
                }else{
                    $('#pesanModal').modal('hide');
                    $('#txtPesanMenu').text("Ditambahkan ke pesanan");
                    $('#txtPesanMenu').show();
                    setTimeout(function () {
                        $('#txtPesanMenu').hide();
                    }, 3000);
                    num = parseInt($('#notifedNumber').text());
                    number = num + 1;
                    $('#notifedNumber').text(number);
                }
            },
            error: function(data){
                $('#pesanError').text("Gagal dipesan");
                $('#pesanError').show();
                setTimeout(function () {
                    $('#pesanError').hide();
                }, 3000);
                $('#okPesan').show();
                $('#loadingPesanotifedNumbern').hide();
                console.log(data);
            },
            complete: function(){
                $('#okPesan').show();
                $('#loadingPesan').hide();
            }
        });
    }
});
//ke pesanan
$(document).on('click', '#kePesan', function () {
    var idmenu = $('#idMenu').val();
    var porsi = $('#jmlPorsi').val();
    por = parseInt(porsi);
    if (por <= 0) {
        alert("Pesanan tidak boleh kosong");
        return;
    }
    if ((idmenu == '' && porsi == '') || (noNota == '' && idMeja == '')) {
        $('#pesanError').text("Terjadi Kesalahan di sistem");
        $('#pesanError').show();
        setTimeout(function () {
            $('#pesanError').hide();
        }, 3000);
    } else {
        $.ajax({
            beforeSend: function () {
                $('#kePesan').hide();
                $('#loadingPesan').show();
            },
            method: 'POST',
            url: 'core.ajax.php',
            data: {
                aksi: 'tambah_pesanan',
                nota: noNota,
                idmeja: idMeja,
                porsi: porsi,
                idmenu: idmenu,
            },
            success: function (data) {
                if (data == "0") {
                    $('#pesanError').text("Gagal dipesan");
                    $('#pesanError').show();
                    setTimeout(function () {
                        $('#pesanError').hide();
                    }, 3000);
                } else {

                    $('#pesanOk').text("Ditambahkan ke pesanan");
                    $('#pesanOk').show();
                    setTimeout(function () {
                        $('#pesanOk').hide();
                        window.location.href = "menu_checkout.php";
                    }, 3000);
                }
            },
            error: function (data) {
                $('#pesanError').text("Gagal dipesan");
                $('#pesanError').show();
                setTimeout(function () {
                    $('#pesanError').hide();
                }, 3000);
                $('#okPesan').show();
                $('#loadingPesan').hide();
                console.log(data);
            },
        });
    }
});

//batalkan semua pesanan
$(document).on('click','#btnBatalPesan',function(){
    ask = confirm('Anda yakin akan membatalkan semua pesanana ?');
    if(ask){
        window.location.href = "menu_checkout_batal.php";
    }
});

//batalkan 1 pesanan
$(document).on('click', '#btnBatalPesan1', function () {
    var id = $(this).attr('data-id-pesan');
    ask = confirm('Anda yakin akan membatalkan pesanana ?');
    if (ask) {
        $.ajax({
            method: 'POST',
            url: 'core.ajax.php',
            data:{
                aksi : 'hapus_pesanan',
                id : id,
            },
            success: function(data){
                if(data == "0"){
                    $('#checkOutError').text("Pesanan gagal dihapus");
                    $('#checkOutError').show();
                    setTimeout(function () {
                        $('#checkOutError').hide();
                    }, 3000);
                }else{
                    $('#checkOutOk').text("Pesanan Dihapus");
                    $('#checkOutOk').show();
                    setTimeout(function () {
                        $('#checkOutOk').hide();
                    }, 3000);
                    $('#pesan_'+id).remove();
                }
            },
            error: function(){
                $('#checkOutError').text("Pesanan gagal dihapus");
                $('#checkOutError').show();
                setTimeout(function () {
                    $('#checkOutError').hide();
                }, 3000);
            }
        });
    }
});

//konfirmasi pesanan
$(document).on('click', '#btnKonfirm', function(){
    $('#konfirmasiModal').modal('show');
});

//konfirmasi pesanan
$(document).on('click', '#yaKonfirmasi', function () {
    window.location.href = "menu_checkout_konfirmasi.php";
});

// keluar dari menu
$(document).on('click', '#keluarMenu', function () {
    ask = confirm('Anda yakin ingin keluar ?');
    if(ask){
        window.location.href = "menu_keluar.php";
    }
});

