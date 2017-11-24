//Halaman Admin Meja
$(document).on('click','#simpanMeja',function(){
    var nomeja = $('#inputNoMeja').val();
    var kodemaja = $('#inputKodeMeja').val();
    if((nomeja && kodemaja) == ''){
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
                kodemeja : kodemaja
            },
            success : function(data){
                if(data == "1"){
                    $('#pesan2').text("Meja Berhasil ditambahkan");
                    $('#pesan2').show();
                    setTimeout(function () {
                        $('#pesan2').hide();
                    }, 3000);
                    $('#inputNoMeja').val('');
                    $('#inputKodeMeja').val('');
                    $('#tabelMeja').append('<tr><td><h1>'+nomeja+'</h1></td><td>'+
                                            kodemaja + '</td><td>' + 
                                            '<button class="btn">Ubah</button>' +
                                            '<button class="btn">Hapus</button></td></tr>');
                }else if(data == "0"){
                    $('#pesan').text("Meja Gagal ditambahkan");
                    $('#pesan').show();
                    setTimeout(function () {
                        $('#pesan').hide();
                    }, 3000);
                    
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