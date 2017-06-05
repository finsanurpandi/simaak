
$('#feedbackPassNowTrue').hide();
$('#feedbackPassNowFalse').hide();
$('#feedbackPassNewTrue').hide();
$('#feedbackPassNewFalse').hide();
$('#feedbackPassCurrTrue').hide();
$('#feedbackPassCurrFalse').hide();

//password update validation
$('#current_pass').change(function(){
	if (pass !== $(this).val()) {
		$('#status_current').show();
		$('#status_current').addClass('text-danger');
		$('#status_current').text('Invalid password');
		// $('#btn_update').prop('disabled', true);
		$('#feedbackPassNowTrue').hide();
		$('#feedbackPassNowFalse').show();
	} else {
		$('#status_current').hide();
		$('#feedbackPassNowTrue').show();
		$('#feedbackPassNowFalse').hide();
	}
});

$('#new_pass').change(function(){

	if ($('#confirm_pass').val() == $(this).val()) {
		$('#status_new').hide();
		// $('#btn_update').prop('disabled', false);
		$('#feedbackPassNewTrue').show();
		$('#feedbackPassNewFalse').hide();
		$('#feedbackPassCurrTrue').show();
		$('#feedbackPassCurrFalse').hide();
	} else {
		$('#status_new').show();
		$('#status_new').addClass('text-danger').text('* Invalid new password and confirm new password');
		// $('#btn_update').prop('disabled', true);
		$('#feedbackPassNewTrue').hide();
		$('#feedbackPassNewFalse').show();
		$('#feedbackPassCurrTrue').hide();
		$('#feedbackPassCurrFalse').show();
	}
});

$('#confirm_pass').change(function(){

	if ($('#new_pass').val() == $(this).val()) {
		$('#status_new').hide();
		// $('#btn_update').prop('disabled', false);
		$('#feedbackPassNewTrue').show();
		$('#feedbackPassNewFalse').hide();
		$('#feedbackPassCurrTrue').show();
		$('#feedbackPassCurrFalse').hide();
	} else {
		$('#status_new').show();
		$('#status_new').addClass('text-danger').text('* Invalid new password and confirm new password');
		// $('#btn_update').prop('disabled', true);
		$('#feedbackPassNewTrue').hide();
		$('#feedbackPassNewFalse').show();
		$('#feedbackPassCurrTrue').hide();
		$('#feedbackPassCurrFalse').show();
	}
});

$('#current_pass, #new_pass, #confirm_pass').change(function(){
	if (($('#current_pass').val() == pass) && ($('#new_pass').val() == $('#confirm_pass').val())) 
	{
		$('#btn_update').prop('disabled', false);
	} else {
		$('#btn_update').prop('disabled', true);
	}	
})


//clear form modal
$('#ubahPassModal').on('hidden.bs.modal', function (e) {
  	$('#current_pass').val('');
  	$('#new_pass').val('');
  	$('#confirm_pass').val('');
  	$('#status_current').remove();
  	$('#status_new').remove();
});

//MAHASISWA
//EDIT PROFIL MAHASISWA
$(document).on("click", '#editProfil', function(e){

	var data = $(this).data();

	$('#editNikMhs').val(data['nik']);
	$('#editAlamatMhs').val(data['alamat']);
	$('#editDarahMhs').val(data['darah']);
	$('#editTlpMhs').val(data['tlp']);
	$('#editEmailMhs').val(data['email']);
	$('#editSekolahMhs').val(data['sekolah']);
	$('#editNisnMhs').val(data['nisn']);
});

//EDIT IBU MAHASISWA
$(document).on("click", '#editIbu', function(e){
	var data = $(this).data();

	$('#editNamaIbu').val(data['nama']);
	$('#editTtlIbu').val(data['ttl']);
	$('#editPendidikanIbu').val(data['pendidikan']);
	$('#editPekerjaanIbu').val(data['pekerjaan']);
	$('#editPendapatanIbu').val(data['pendapatan']);
	$('#editAlamatIbu').val(data['alamat']);
	$('#editTlpIbu').val(data['tlp']);
});

//EDIT AYAH MAHASISWA
$(document).on("click", '#editAyah', function(e){
	var data = $(this).data();

	$('#editNamaAyah').val(data['nama']);
	$('#editTtlAyah').val(data['ttl']);
	$('#editPendidikanAyah').val(data['pendidikan']);
	$('#editPekerjaanAyah').val(data['pekerjaan']);
	$('#editPendapatanAyah').val(data['pendapatan']);
	$('#editAlamatAyah').val(data['alamat']);
	$('#editTlpAyah').val(data['tlp']);
});

// UPDATE IMAGE PROFILE
$('#update_image').change(function(){
	if (!$(this).val()) {
		$('#btn_update_image').prop('disabled', true);
	} else {
		$('#btn_update_image').prop('disabled', false);
	}
});

// UPDATE BUTTON PASPHOTO
$('#update_pasphoto').change(function(){
	if (!$(this).val()) {
		$('#btn_update_pasphoto').prop('disabled', true);
	} else {
		$('#btn_update_pasphoto').prop('disabled', false);
	}
});

$('#btnEditPasphoto').click(function(){
	var nama = $(this).data(nama);

	$('#pathPasphoto').val(nama['nama']);
})

// UPDATE BUTTON IJAZAH
$('#update_ijazah').change(function(){
	if (!$(this).val()) {
		$('#btn_update_ijazah').prop('disabled', true);
	} else {
		$('#btn_update_ijazah').prop('disabled', false);
	}
});


$('#btnEditIjazah').click(function(){
	var nama = $(this).data(nama);

	$('#pathIjazah').val(nama['nama']);
})

// UPDATE BUTTON PEMBAYARAN
$(document).on("click", '#btnEditPembayaran', function(e){
	var nama = $(this).data('nama');
	var id = $(this).data('id');
	
	$('#pathPembayaran').val(nama);
	$('#idPembayaran').val(id);
	console.log($(this).data());

	$('#editPembayaranModal').modal('show');
});

$('#update_pembayaran').change(function(){
	if (!$(this).val()) {
		$('#btn_update_pembayaran').prop('disabled', true);
	} else {
		$('#btn_update_pembayaran').prop('disabled', false);
	}
});

//SELECT JABFUNG
function selectJabfung(){
	$('#golonganAdmin option').remove();

	$('#golonganAdmin').prop('disabled', false);

	var asistenAhli = [ {'value':'III/a', 'text':'III/a'},
						{'value':'III/b', 'text':'III/b'}
					  ];  
    
    var lektor = [ {'value':'III/c', 'text':'III/c'},
						{'value':'III/d', 'text':'III/d'}
					  ]; 

    var lektorKepala = [ {'value':'IV/a', 'text':'IV/a'},
						{'value':'IV/b', 'text':'IV/b'},
						{'value':'IV/c', 'text':'IV/c'}
					  ]; 

    var guruBesar = [ {'value':'IV/d', 'text':'IV/d'},
						{'value':'IV/e', 'text':'IV/e'}
					  ]; 

	var jabfung = $('#jabfung').find(":selected").text();

  	// if ($('#jabfung').val() == 'Asisten Ahli') {
  	// 	$.each(asistenAhli, function(i){
  	// 		$('#golongan').append($('<option></option>')
  	// 					.attr('value', asistenAhli[i]['value'])
  	// 					.text(asistenAhli[i]['text']));
  	// 	});
  	// 	console.log('hello');
  	// } else if ($('#jabfung').val() == 'Lektor') {
  	// 	$.each(lektor, function(i){
  	// 		$('#golongan').append($('<option></option>')
  	// 					.attr('value', lektor[i]['value'])
  	// 					.text(lektor[i]['text']));
  	// 	});
  	// } else if ($('#jabfung').val() == 'Lektor Kepala') {
  	// 	$.each(lektorKepala, function(i){
  	// 		$('#golongan').append($('<option></option>')
  	// 					.attr('value', lektorKepala[i]['value'])
  	// 					.text(lektorKepala[i]['text']));
  	// 	});
  	// } else if ($('#jabfung').val() == 'Guru Besar') {
  	// 	$.each(guruBesar, function(i){
  	// 		$('#golongan').append($('<option></option>')
  	// 					.attr('value', guruBesar[i]['value'])
  	// 					.text(guruBesar[i]['text']));
  	// 	});
  	// };

  	if (jabfung == 'Asisten Ahli') {
  		$.each(asistenAhli, function(i){
  			$('#golonganAdmin').append($('<option></option>')
  						.attr('value', asistenAhli[i]['value'])
  						.text(asistenAhli[i]['text']));
  		});
  	} else if (jabfung == 'Lektor') {
  		$.each(lektor, function(i){
  			$('#golonganAdmin').append($('<option></option>')
  						.attr('value', lektor[i]['value'])
  						.text(lektor[i]['text']));
  		});
  	} else if (jabfung == 'Lektor Kepala') {
  		$.each(lektorKepala, function(i){
  			$('#golonganAdmin').append($('<option></option>')
  						.attr('value', lektorKepala[i]['value'])
  						.text(lektorKepala[i]['text']));
  		});
  	} else if (jabfung == 'Guru Besar') {
  		$.each(guruBesar, function(i){
  			$('#golonganAdmin').append($('<option></option>')
  						.attr('value', guruBesar[i]['value'])
  						.text(guruBesar[i]['text']));
  		});
  	};
};  // END OF FUNCTION SELECT JABFUNG


// SELECT JABATAN STRUKTURAL
function selectJabStruk()
{
	var jenisdosen = $('#jenisDosen').find(":selected").val();

	if (jenisdosen == 'DT' || jenisdosen == 'PT') {
		$('#jabstruk').prop('disabled', false);
	} else {
		$('#jabstruk').prop('disabled', true);
	}
}


// CHECK NIM AVAILABILITY
function checkNim(){
    var username = $('#nim').val();

    $.ajax({
      method: "post",
      url: baseurl+"ajax/usernameAvailability",
      data: { username:username },
      success: function(res){
          if (res == 1) {
            $('#statusNim').html("<p class='text-danger'>NIM telah digunakan <span class='glyphicon glyphicon-remove'></span></p> ");
            $('#btnTambahMahasiswa').prop('disabled', true);
          } else {
            $('#statusNim').html("<p class='text-success'>NIM tersedia <span class='glyphicon glyphicon-ok'></span></p>");
            $('#btnTambahMahasiswa').prop('disabled', false);
          }
      }
    });
};

// CHECK NIDN AVAILABILITY
function checkUsername(){
    var username = $('#nidn').val();

    $.ajax({
      method: "post",
      url: baseurl+"ajax/usernameAvailability",
      data: { username:username },
      success: function(res){
          if (res == 1) {
            $('#statusUsername').html("<p class='text-danger'>NIDN telah digunakan <span class='glyphicon glyphicon-remove'></span></p> ");
            $('#btnTambahDosen').prop('disabled', true);
          } else {
            $('#statusUsername').html("<p class='text-success'>NIDN tersedia <span class='glyphicon glyphicon-ok'></span></p>");
            $('#btnTambahDosen').prop('disabled', false);
          }
      }
    });
};

// CHECK NIDN AVAILABILITY
function checkNidn(){
    var username = $('#nidnAdmin').val();

    $.ajax({
      method: "post",
      url: baseurl+"ajax/usernameAvailability",
      data: { username:username },
      success: function(res){
          if (res == 1) {
            $('#statusUsernameAdmin').html("<p class='text-danger'>NIDN telah digunakan <span class='glyphicon glyphicon-remove'></span></p> ");
            $('#btnTambahDosenAdmin').prop('disabled', true);
          } else {
            $('#statusUsernameAdmin').html("<p class='text-success'>NIDN tersedia <span class='glyphicon glyphicon-ok'></span></p>");
            $('#btnTambahDosenAdmin').prop('disabled', false);
          }
      }
    });
};

// CHECK GOLONGAN
function checkGolongan(){
    var jabfung = $('#jabatan_fungsional').val();
    var golongan = $('#golongan');

    $('#golongan option').remove();

    $.ajax({
      method: "post",
      url: baseurl+"ajax/checkGolongan",
      dataType: 'json',
      data: { jabfung:jabfung },
      success: function(res){
          for (var i = 0; i < res.length; i++) {

			  if (res[i]['golongan'] == vGolongan) {
			    golongan.append("<option value='"+res[i]['golongan']+"' selected='true'>"+res[i]['golongan']+"</option>");
			  } else {
			  	golongan.append("<option value='"+res[i]['golongan']+"'>"+res[i]['golongan']+"</option>");
			  }
			};
      },
      error: function(error){
      	console.log(error);
      }
    });
};


// LOAD DATA KODE MATKUL
$('#kodeMatkul').change(function(){
	var str = $(this).find(":selected").text();
	var nama = str.substring(22);
	var kode = str.substring(0, 6);

	$('#namaMatkul').val(nama);

	$.ajax({
		method: 'post',
		url: baseurl+"ajax/getDataMatkul",
		dataType: 'json',
		data: {kodeMatkul:kode},
		success: function(res){
			$('#semester').val(res[0]['semester']);
			$('#sks').val(res[0]['sks']);
		},
		error: function(error){
			console.log(error);
		}
	});
});

// SET SKS OPERATOR JADWAL
$('#tambahKodeMatkul').change(function(){
	var str = $(this).find(":selected").val();
	var newarr = str.split(",");

	sks = newarr[1];
	console.log(str);
	console.log(sks);
});

$('#nidnJadwal').change(function(){
	var str = $(this).find(":selected").text();
	var res = str.substring(14);

	$('#namaDosen').val(res);
});


// EDIT JADWAL MATKUL
$(document).on("click", '#btn-editjadwal', function(e){
	var data = $(this).data();

	$('#editIdJadwal').val(data['id']);
	$('#editKodeMatkulJadwal').val(data['kdmatkul']);
	$('#editNamaMatkulJadwal').val(data['matkul']);

	$('#editDosenJadwal option').filter(function(){
		return ($(this).val().substring(11) == data['dosen']);
	}).prop('selected', true);

	$('#editKelasJadwal option').filter(function(){
		return ($(this).val() == data['kelas']);
	}).prop('selected', true);

	$('#editHariJadwal option').filter(function(){
		return ($(this).val() == data['hari']);
	}).prop('selected', true);

	$('#editWaktuJadwal').val(data['waktu']);

	$('#editRuanganJadwal option').filter(function(){
		return ($(this).val() == data['ruangan']);
	}).prop('selected', true);

});


// HAPUS JADWAL MATKUL
$(document).on("click", '#btn-hapusjadwal', function(e){
	var data = $(this).data();

	$('#idjadwal').val(data['id']);
	$('#namamatkul').text(data['matkul']);
});

//ADD MINUTES
function addMinutes(time, minToAdd){
	function D(J){ return (J<10? '0':'') + J};

	var piece = time.split(':');

	var mins = piece[0]*60 + +piece[1] + +minToAdd;

	return D(mins%(24*60)/60 | 0) + ':' + D(mins%60);
}

$('#waktuMulai').change(function(){
	var waktu = $(this).val()+':00';
	// var sks = $('#sks').val();
	var addTime = sks * 50;

	// $('#waktuSelesai').val(addMinutes(waktu, addTime));
	$(this).val($(this).val()+' - '+addMinutes(waktu, addTime));
})



//EDIT DOSEN
// ---------------------------------------------------------
// HAPUS DATA DOSEN
$(document).on("click", '#btn-hapusDosen', function(e){
	var data = $(this).data();

	$('#iddosen').val(data['nidn']);
	$('#namadosen').text(data['dosen']);
});
//PENGAJARAN
// OPERATOR DOSEN TAMBAH DATA PENGAJARAN

// OPERATOR DOSEN EDIT DATA PENGAJARAN
$(document).on("click", '#btnEditPengajaranDosen', function(e){
	var data = $(this).data();

	$('#ideditpengajaran').val(data['id']);
	$('#editjeniskegiatan').val(data['jeniskegiatan']);
	$('#editbuktipenugasan').val(data['buktipenugasan']);
	$('#editsksbebankerja').val(data['sksbebankerja']);
	$('#editmasapenugasan').val(data['masapenugasan']);
	$('#editbuktidokumen').val(data['buktidokumen']);
	$('#editskskinerja').val(data['skskinerja']);


	$('#editrekomendasi option').filter(function(){
		return ($(this).val() == $('#editrekomendasi').val(data['rekomendasi']));
	}).prop('selected', true);

});

// OPERATOR DOSEN HAPUS DATA PENGAjARAN
$(document).on("click", '#btnHapusDataPengajaranDosen', function(e){
	var id = $(this).data('id');
	$('#idpengajaran').val(id);
});


//PENDIDIKAN
// OPERATOR DOSEN TAMBAH DATA PENDIDIKAN
$('#btnTambahPendidikanDosen').click(function(){
	var nidn = $(this).data('nidn');
	$('#nidnTambahPendidikan').val(nidn);
});

// TAMBAH DATA IJAZAH DOSEN
$(document).on('click', '#btnTambahIjazahDosen', function(e){
	var id = $(this).data('id');

	$('#idijazahdosen').val(id);
});

$('#ijazahdosen').change(function(){
	$('#tambahIjazahDosen').prop('disabled', false);
});

// EDIT DATA IJAZAH DOSEN
$(document).on('click', '#btnEditIjazahDosen', function(e){
	var id = $(this).data('id');
	var img = $(this).data('img');

	$('#ideditijazahdosen').val(id);
	$('#imgeditijazahdosen').val(img);
});

$('#editfileijazahdosen').change(function(){
	$('#editIjazahDosen').prop('disabled', false);
});

// TAMBAH DATA Transkrip DOSEN
$(document).on('click', '#btnTambahTranskripDosen', function(e){
	var id = $(this).data('id');

	$('#idtranskripdosen').val(id);
});

$('#transkripdosen').change(function(){
	$('#tambahTranskripDosen').prop('disabled', false);
});

// EDIT DATA TRANSKRIP DOSEN
$(document).on('click', '#btnEditTranskripDosen', function(e){
	var id = $(this).data('id');
	var img = $(this).data('img');

	$('#idedittranskripdosen').val(id);
	$('#imgedittranskripdosen').val(img);
});

$('#editfiletranskripdosen').change(function(){
	$('#editTranskripDosen').prop('disabled', false);
});

// OPERATOR DOSEN EDIT DATA PENDIDIKAN
$(document).on("click", '#btnEditPendidikanDosen', function(e){
	var id = $(this).data('id');
	var perguruantinggi = $(this).data('perguruantinggi');
	var fakultas = $(this).data('fakultas');
	var programstudi = $(this).data('programstudi');
	var ipk = $(this).data('ipk');
	var gelar = $(this).data('gelar');
	var tahunlulus = $(this).data('tahunlulus');

	$('#ideditpendidikan').val(id);
	$('#pteditpendidikan').val(perguruantinggi);
	$('#fakultaseditpendidikan').val(fakultas);
	$('#prodieditpendidikan').val(programstudi);
	$('#ipkeditpendidikan').val(ipk);
	$('#gelareditpendidikan').val(gelar);
	$('#luluseditpendidikan').val(tahunlulus);
});

// OPERATOR DOSEN HAPUS DATA PENDIDIKAN
$(document).on("click", '#btnHapusDataPendidikanDosen', function(e){
	var id = $(this).data('id');
	$('#idpendidikan').val(id);
});

// ---------------------------------------------------------
//PENELITIAN
// OPERATOR DOSEN EDIT DATA PENELITIAN
$(document).on("click", '#btnEditPenelitianDosen', function(e){
	var data = $(this).data();

	$('#ideditpenelitian').val(data['id']);
	$('#editjeniskegiatanpenelitian').val(data['jeniskegiatan']);
	$('#editbuktipenugasanpenelitian').val(data['buktipenugasan']);
	$('#editsksbebankerjapenelitian').val(data['sksbebankerja']);
	$('#editmasapenugasanpenelitian').val(data['masapenugasan']);
	$('#editbuktidokumenpenelitian').val(data['buktidokumen']);
	$('#editskskinerjapenelitian').val(data['skskinerja']);


	$('#editrekomendasipenelitian option').filter(function(){
		return ($(this).val() == $('#editrekomendasipenelitian').val(data['rekomendasi']));
	}).prop('selected', true);

});

// OPERATOR DOSEN HAPUS DATA PENELITIAN
$(document).on("click", '#btnHapusDataPenelitianDosen', function(e){
	var id = $(this).data('id');
	$('#idpenelitian').val(id);
});


/// ---------------------------------------------------------
// PENGABDIAN
// OPERATOR DOSEN EDIT DATA PENGABDIAN
$(document).on("click", '#btnEditPengabdianDosen', function(e){
	var data = $(this).data();

	$('#ideditpengabdian').val(data['id']);
	$('#editjeniskegiatanpengabdian').val(data['jeniskegiatan']);
	$('#editbuktipenugasanpengabdian').val(data['buktipenugasan']);
	$('#editsksbebankerjapengabdian').val(data['sksbebankerja']);
	$('#editmasapenugasanpengabdian').val(data['masapenugasan']);
	$('#editbuktidokumenpengabdian').val(data['buktidokumen']);
	$('#editskskinerjapengabdian').val(data['skskinerja']);


	$('#editrekomendasipengabdian option').filter(function(){
		return ($(this).val() == $('#editrekomendasipengabdian').val(data['rekomendasi']));
	}).prop('selected', true);

});

// OPERATOR DOSEN HAPUS DATA PENGABDIAN
$(document).on("click", '#btnHapusDataPengabdianDosen', function(e){
	var id = $(this).data('id');
	$('#idpengabdian').val(id);
});

// ---------------------------------------------------------
//DOKUMEN
// OPERATOR DOSEN EDIT DATA DOKUMEN
$(document).on("click", '#btnEditDokumenDosen', function(e){
	var id = $(this).data('id');
	var judul = $(this).data('judul');
	var nama = $(this).data('nama');

	$('#ideditdokumen').val(id);
	$('#juduleditdokumen').val(judul);
	$('#namaeditdokumen').val(nama);
	
});

// OPERATOR DOSEN HAPUS DATA PENELITIAN
$(document).on("click", '#btnHapusDataDokumenDosen', function(e){
	var id = $(this).data('id');
	var nama = $(this).data('nama');
	$('#iddokumen').val(id);
	$('#namadokumen').val(nama);
});

// VALIDASI PERWALIAN DOSEN
$('#validasiPerwalianDosen').click(function(){
	var nim = $(this).data('nim');

	$('#nimValidasi').val(nim);
})

// EDIT NILAI MAHASISWA
$(document).on("click", '#editNilaiMahasiswa', function(e){
	var id = $(this).data('id');
	var nama = $(this).data('mhs');
	var nim = $(this).data('nim');
	var nilai = $(this).data('nilai');

	$('#ideditnilai').val(id);
	$('#namaeditnilai').val(nama);
	$('#nimeditnilai').val(nim);

	$('#nilaieditnilai option').filter(function(){
		return ($(this).val() == nilai);
	}).prop('selected', true);
});


// BAGIAN KEUANGAN
//VALIDASI PEMBAYARAN
$(document).on('click', '#btn-validasi', function(e){
	var data = $(this).data();

	$("#buktiPembayaran").attr("src", url+data['image']);
	$('#statusPembayaran').val(data['status']);
	$('#persentasePembayaran').val(data['persentase']);
	$('#idpembayaran').val(data['id']);
	$('#nimpembayaran').val(data['nim']);

	$('#statusPembayaran option').filter(function(){
		return ($(this).val() == $('#statusPembayaran').val(data['status']));
	}).prop('selected', true);

	$('#persentasePembayaran option').filter(function(){
		return ($(this).val() == $('#persentasePembayaran').val(data['persentase']));
	}).prop('selected', true);
});

$(document).on('click', '#btn-hapus-validasi', function(e){
	var data = $(this).data();

	$('#idhapusvalidasi').val(data['id']);
});


// ALERT AUTOCLOSED
window.setTimeout(function() {
    $(".alert.alert-success").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);

//SET MENU ACTIVE MAHASISWA
function mhsClearMenu(){
	$('#menuMhsProfil').remove('.active');
	$('#menuMhsStudi').remove('.active');
	$('#mhsperwalian').remove('.active');
	$('#mhsjadwal').remove('.active');
	$('#mhsupload').remove('.active');
	$('#mhscetak').remove('.active');
}

if (role == 1) {

		if (uri == '') {
			mhsClearMenu();
		} else if (uri == 'profil') {
			$('#menuMhsProfil').addClass('active');
			$('#mhsProfil').addClass('active');
			// $('#mhsOrtu').remove('active');
			// $('#mhsDokumen').remove('active');
			// $('#mhsnilai').remove('.active');
			// $('#mhsperwalian').remove('.active');
			// $('#mhsjadwal').remove('.active');
		} else if (uri == 'orangtua') { 
			$('#menuMhsProfil').addClass('active');
			$('#mhsOrtu').addClass('active');
			// $('#mhsProfil').remove('active');
			// $('#mhsDokumen').remove('active');
			// $('#mhsnilai').remove('.active');
			// $('#mhsperwalian').remove('.active');
			// $('#mhsjadwal').remove('.active');
		} else if (uri == 'dokumen') { 
			$('#menuMhsProfil').addClass('active');
			// $('#mhsOrtu').remove('active');
			// $('#mhsProfil').remove('active');
			$('#mhsDokumen').addClass('active');
			// $('#mhsnilai').remove('.active');
			// $('#mhsperwalian').remove('.active');
			// $('#mhsjadwal').remove('.active');
		} else if (uri == 'ips') {
			$('#mhsSemester').addClass('active');
			$('#menuMhsStudi').addClass('active');
		} else if (uri == 'ipk') {
			$('#mhsKeseluruhan').addClass('active');
			$('#menuMhsStudi').addClass('active');
		} else if (uri == 'perwalian') {
			$('#mhsperwalian').addClass('active');
			// $('#mhsprofil').remove('.active');
			// $('#mhsnilai').remove('.active');
			// $('#mhsjadwal').remove('.active');
		} else if (uri == 'perkuliahan') {
			$('#mhsjadwal').addClass('active');
			// $('#mhsprofil').remove('.active');
			// $('#mhsnilai').remove('.active');
			// $('#mhsperwalian').remove('.active');
		} else if (uri == 'pembayaran') {
			$('#mhsupload').addClass('active');
		} else if (uri == 'cetak') {
			$('#mhscetak').addClass('active');
		}
	
};

//SET MENU ACTIVE MAHASISWA
function DosenClearMenu(){
	$('#kinerjadosen').remove('.active');
	$('#dosenPengajaran').remove('.active');
	$('#dosenPenelitian').remove('.active');
	$('#dosenPengabdian').remove('.active');
	$('#profildosen').remove('.active');
	$('#nilaidosen').remove('.active');
	// $('#mhsnilai').remove('.active');
	// $('#mhsperwalian').remove('.active');
	// $('#mhsjadwal').remove('.active');
}

if (role == 2) {
	if (uri == '') {
			DosenClearMenu();
		} else if (uri == 'pengajaran') { 
			$('#kinerjadosen').addClass('active');
			$('#dosenPengajaran').addClass('active');
			// $('#dosenPenelitian').remove('active');
			// $('#dosenPengabdian').remove('active');
		} else if (uri == 'penelitian') { 
			$('#kinerjadosen').addClass('active');
			// $('#dosenPengajaran').remove('active');
			$('#dosenPenelitian').addClass('active');
			// $('#dosenPengabdian').remove('active');
		} else if (uri == 'pengabdian') { 
			$('#kinerjadosen').addClass('active');
			// $('#dosenPengajaran').remove('active');
			// $('#dosenPenelitian').remove('active');
			$('#dosenPengabdian').addClass('active');
		} else if (uri == 'profil') {
			$('#profildosen').addClass('active');
		} else if (uri == 'nilai' || uri == 'detailnilai') {
			$('#nilaidosen').addClass('active');
		} else if (uri == 'perwalian' || uri == 'validasi_perwalian') {
			$('#perwaliandosen').addClass('active');
		} else if (uri == 'mahasiswa' || uri == 'detailmahasiswa') {
			$('#mahasiswadosen').addClass('active');
		} else if (uri == 'matakuliah' || uri == 'detailmatakuliah') {
			$('#matakuliahdosen').addClass('active');
		} else if (uri == 'dokumen') {
			$('#dokumendosen').addClass('active');
		} else if (uri == 'histori') {
			$('#historimatakuliahdosen').addClass('active');
		};
};


// MENU OPERATOR
function OperatorClearMenu(){
	$('#operatorProfil').remove('.active');
	$('#operatorMahasiswa').remove('.active');
	$('#operatorDosen').remove('.active');
	$('#operatorPerwalian').remove('.active');
	$('#operatorPerkuliahan').remove('.active');
	$('#operatorUjian').remove('.active');
	$('#operatorLaporan').remove('.active');
}

if (role == 3) {
	if (uri == '') {
			OperatorClearMenu();
		} else if (uri == 'profil') { 
			$('#operatorProfil').addClass('active');
		} else if (uri == 'mahasiswa' || uri == 'detailStudi' || uri == 'detailMahasiswa') { 
			$('#operatorMahasiswa').addClass('active');
		} else if (uri == 'dosen' || uri == 'detailDosen') {
			$('#operatorDosen').addClass('active');
		} else if (uri == 'perwalian') {
			$('#operatorPerwalian').addClass('active');
		} else if (uri == 'jadwal') {
			$('#operatorJadwal').addClass('active');
			$('#operatorPerkuliahan').addClass('active');
		} else if (uri == 'matakuliah') {
			$('#operatorMatakuliah').addClass('active');
			$('#operatorPerkuliahan').addClass('active');
		} else if (uri == 'uts') {
			$('#operatorUts').addClass('active');
			$('#operatorUjian').addClass('active');
		} else if (uri == 'uas') {
			$('#operatorUas').addClass('active');
			$('#operatorUjian').addClass('active');
		} else if (uri == 'laporan') {
			$('#operatorLaporan').addClass('active');
		};
};
	

