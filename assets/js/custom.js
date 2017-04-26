
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

//SELECT JABFUNG
function selectJabfung(){
	$('#golongan option').remove();

	$('#golongan').prop('disabled', false);

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
  	
  	if ($('#jabfung').val() == 'Asisten Ahli') {
  		$.each(asistenAhli, function(i){
  			$('#golongan').append($('<option></option>')
  						.attr('value', asistenAhli[i]['value'])
  						.text(asistenAhli[i]['text']));
  		});
  	} else if ($('#jabfung').val() == 'Lektor') {
  		$.each(lektor, function(i){
  			$('#golongan').append($('<option></option>')
  						.attr('value', lektor[i]['value'])
  						.text(lektor[i]['text']));
  		});
  	} else if ($('#jabfung').val() == 'Lektor Kepala') {
  		$.each(lektorKepala, function(i){
  			$('#golongan').append($('<option></option>')
  						.attr('value', lektorKepala[i]['value'])
  						.text(lektorKepala[i]['text']));
  		});
  	} else if ($('#jabfung').val() == 'Guru Besar') {
  		$.each(guruBesar, function(i){
  			$('#golongan').append($('<option></option>')
  						.attr('value', guruBesar[i]['value'])
  						.text(guruBesar[i]['text']));
  		});
  	};
};  // END OF FUNCTION SELECT JABFUNG


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
	var nama = str.substring(9);
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



$('#nidnJadwal').change(function(){
	var str = $(this).find(":selected").text();
	var res = str.substring(14);

	$('#namaDosen').val(res);
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
	var sks = $('#sks').val();
	var addTime = sks * 50;

	// $('#waktuSelesai').val(addMinutes(waktu, addTime));
	$(this).val($(this).val()+' - '+addMinutes(waktu, addTime));
})



//EDIT DOSEN
// ---------------------------------------------------------
//PENDIDIKAN
// OPERATOR DOSEN TAMBAH DATA PENDIDIKAN
$('#btnTambahPendidikanDosen').click(function(){
	var nidn = $(this).data('nidn');
	$('#nidnTambahPendidikan').val(nidn);
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
	var id = $(this).data('id');
	var judul = $(this).data('judul');
	var bidang = $(this).data('bidang');
	var lembaga = $(this).data('lembaga');
	var penerbit = $(this).data('penerbit');
	var tahun = $(this).data('tahun');

	$('#ideditpenelitian').val(id);
	$('#juduleditpenelitian').val(judul);
	$('#bidangeditpenelitian').val(bidang);
	$('#lembagaeditpenelitian').val(lembaga);
	$('#penerbiteditpenelitian').val(penerbit);
	$('#tahuneditpenelitian').val(tahun);
	
});

// OPERATOR DOSEN HAPUS DATA PENELITIAN
$(document).on("click", '#btnHapusDataPenelitianDosen', function(e){
	var id = $(this).data('id');
	$('#idpenelitian').val(id);
});


// ---------------------------------------------------------
//PENGABDIAN
// OPERATOR DOSEN EDIT DATA PENGABDIAN
$(document).on("click", '#btnEditPengabdianDosen', function(e){
	var data = $(this).data();

	$('#idEditPengabdian').val(data['id']);
	$('#programEditPengabdian').val(data['program']);
	$('#judulEditPengabdian').val(data['judul']);
	$('#anggotaEditPengabdian').val(data['anggota']);
	$('#tahunEditPengabdian').val(data['tahun']);
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

//SET MENU ACTIVE MAHASISWA
function mhsClearMenu(){
	$('#menuMhsProfil').remove('.active');
	$('#mhsnilai').remove('.active');
	$('#mhsperwalian').remove('.active');
	$('#mhsjadwal').remove('.active');
}

if (role == 1) {

		if (uri == '') {
			mhsClearMenu();
		} else if (uri == 'profil') {
			$('#menuMhsProfil').addClass('active');
			$('#mhsProfil').addClass('active');
			$('#mhsOrtu').remove('active');
			$('#mhsDokumen').remove('active');
			$('#mhsnilai').remove('.active');
			$('#mhsperwalian').remove('.active');
			$('#mhsjadwal').remove('.active');
		} else if (uri == 'orangtua') { 
			$('#menuMhsProfil').addClass('active');
			$('#mhsOrtu').addClass('active');
			$('#mhsProfil').remove('active');
			$('#mhsDokumen').remove('active');
			$('#mhsnilai').remove('.active');
			$('#mhsperwalian').remove('.active');
			$('#mhsjadwal').remove('.active');
		} else if (uri == 'dokumen') { 
			$('#menuMhsProfil').addClass('active');
			$('#mhsOrtu').remove('active');
			$('#mhsProfil').remove('active');
			$('#mhsDokumen').addClass('active');
			$('#mhsnilai').remove('.active');
			$('#mhsperwalian').remove('.active');
			$('#mhsjadwal').remove('.active');
		} else if (uri == 'studi') {
			$('#mhsnilai').addClass('active');
			$('#mhsprofil').remove('.active');
			$('#mhsperwalian').remove('.active');
			$('#mhsjadwal').remove('.active');
		} else if (uri == 'perwalian') {
			$('#mhsperwalian').addClass('active');
			$('#mhsprofil').remove('.active');
			$('#mhsnilai').remove('.active');
			$('#mhsjadwal').remove('.active');
		} else if (uri == 'perkuliahan') {
			$('#mhsjadwal').addClass('active');
			$('#mhsprofil').remove('.active');
			$('#mhsnilai').remove('.active');
			$('#mhsperwalian').remove('.active');
		}
	
};

//SET MENU ACTIVE MAHASISWA
function DosenClearMenu(){
	$('#menuDosenProfil').remove('.active');
	// $('#mhsnilai').remove('.active');
	// $('#mhsperwalian').remove('.active');
	// $('#mhsjadwal').remove('.active');
}

if (role == 2) {
	if (uri == '') {
			dosenClearMenu();
		} else if (uri == 'profil') {
			$('#menuDosenProfil').addClass('active');
			$('#dosenProfil').addClass('active');
			$('#dosenPendidikan').remove('active');
			$('#dosenPengajaran').remove('active');
			$('#dosenPenelitian').remove('active');
			$('#dosenPengabdian').remove('active');
		} else if (uri == 'pendidikan') { 
			$('#menuDosenProfil').addClass('active');
			$('#dosenProfil').remove('active');
			$('#dosenPendidikan').addClass('active');
			$('#dosenPengajaran').remove('active');
			$('#dosenPenelitian').remove('active');
			$('#dosenPengabdian').remove('active');
		} else if (uri == 'pengajaran') { 
			$('#menuDosenProfil').addClass('active');
			$('#dosenProfil').remove('active');
			$('#dosenPendidikan').remove('active');
			$('#dosenPengajaran').addClass('active');
			$('#dosenPenelitian').remove('active');
			$('#dosenPengabdian').remove('active');
		} else if (uri == 'penelitian') { 
			$('#menuDosenProfil').addClass('active');
			$('#dosenProfil').remove('active');
			$('#dosenPendidikan').remove('active');
			$('#dosenPengajaran').remove('active');
			$('#dosenPenelitian').addClass('active');
			$('#dosenPengabdian').remove('active');
		} else if (uri == 'pengabdian') { 
			$('#menuDosenProfil').addClass('active');
			$('#dosenProfil').remove('active');
			$('#dosenPendidikan').remove('active');
			$('#dosenPengajaran').remove('active');
			$('#dosenPenelitian').remove('active');
			$('#dosenPengabdian').addClass('active');
		}
};
	

