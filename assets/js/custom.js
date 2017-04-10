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

// UPDATE IMAGE PROFILE
$('#update_image').change(function(){
	if (!$(this).val()) {
		$('#btn_update_image').prop('disabled', true);
	} else {
		$('#btn_update_image').prop('disabled', false);
	}
});

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



//SET MENU ACTIVE MAHASISWA
if (role == 1) {
	if (uri == '') {
		$('#profil').remove('.active');
		$('#nilai').remove('.active');
		$('#perwalian').remove('.active');
		$('#jadwal').remove('.active');
	} else if (uri == 'profil') {
		$('#profil').addClass('active');
		$('#nilai').remove('.active');
		$('#perwalian').remove('.active');
		$('#jadwal').remove('.active');
	} else if (uri == 'studi') {
		$('#nilai').addClass('active');
		$('#profil').remove('.active');
		$('#perwalian').remove('.active');
		$('#jadwal').remove('.active');
	} else if (uri == 'perwalian') {
		$('#perwalian').addClass('active');
		$('#profil').remove('.active');
		$('#nilai').remove('.active');
		$('#jadwal').remove('.active');
	} else if (uri == 'perkuliahan') {
		$('#jadwal').addClass('active');
		$('#profil').remove('.active');
		$('#nilai').remove('.active');
		$('#perwalian').remove('.active');
	}
};

if (role == 2) {
	
};
	

