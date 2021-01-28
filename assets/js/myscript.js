const flashData = $('.flash-data').data('flashdata');

const gagal = $('.flash-salah').data('flashdata');

const salah = $('.flash-login').data('flashdata');

if (salah) {
    Swal({
        title: 'Login Gagal',
        text: salah,
        type: 'warning'
    });
}

if (gagal) {
    Swal({
        title: 'Absen Online',
        text: gagal,
        type: 'warning'
    });
}

if (flashData) {
    Swal({
        title: 'Absen Online',
        text: flashData,
        type: 'success'
    });
}

// tombol-hapus
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Apakah anda yakin',
        text: "data akan dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});