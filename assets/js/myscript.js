const flashData = $('.flash-data').data('flashdata');
const subJudul = $('.card-title').text();
const status = $('.flash-data').data('status');

if (flashData && status == '') {
	Swal.fire({
		icon: 'success',
		title: '' + subJudul,
		text: 'Berhasil ' + flashData
	})
} else if (flashData && status == 'danger') { 
	Swal.fire({
		icon: 'error',
		title: '' + subJudul,
		text: 'Gagal ' + flashData
	})
}


// Tombol Hapus
$('.tombol-hapus').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah Anda Yakin?',
		text: subJudul + " akan dihapus!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Hapus!'
	}).then((result) => {
		if (result.isConfirmed) {
			document.location.href = href;
		}
	})
});
