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
            }
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
                }
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
                                    if(data == "0"){
                                        $('#pesanMakanan').text("Maaf Makanan Gagal dimasukan, gambar telah di kirim");
                                        $('#pesanMakanan').show();
                                        setTimeout(function () {
                                            $('#pesanMakanan').hide();
                                        }, 3000);
                                    }else{
                                        $('#pesanMakanan2').text("Makanan Telah di tambahkan");
                                        $('#pesanMakanan2').show();
                                        setTimeout(function () {
                                            $('#pesanMakanan2').hide();
                                        }, 3000);
                                        // ? Add Element tabel here
                                        
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
    $('#modalUbahMakanan').modal('show');
    $('#inputUbahIdMakanan').val(id);
    $('#inputUbahNamaMakanan').val(nama);
    $('#inputUbahHargaMakanan').val(harga);
    $('#inputUbahStokMakanan').val(stok);

});

//Simpan Perubahan Makanan
$(document).on('click','#ubahMakanan',function(){
    var id = $('#inputUbahIdMakanan').val();
    var nama = $('#inputUbahNamaMakanan').val();
    var harga = $('#inputUbahHargaMakanan').val();
    var stok = $('#inputUbahStokMakanan').val();
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
                             // ? Remove and Add Element tabel here
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
            }else{
                $.ajax({
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