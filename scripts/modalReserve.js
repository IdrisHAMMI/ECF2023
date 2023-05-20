      //DATEPICKER API
      $('#datepicker').datepicker({
        uiLibrary: 'bootstrap5'
    });


    // AVAILABLE SEATS FUNCTION
    $(document).ready(function() {

    function updateDispo() {
    
    var date = $('#dateInput').val();
    if(($('#hourInput').val()) == '') {
      var heure = $('#hourInputNight').val();
    } else {
      var heure = $('#hourInput').val();
    }
    var seats = $('#platesClient').val();
    
    $.ajax({
        type: 'POST',
        url: 'reservation.php',
        data: { bookingDate: date, bookingTime: heure, platesClient: seats },
        dataType: 'json',
        success: function(response) {
          $('#dispo-message').html('Success');
        }
    });
}

// FIRST TIME FUNCTION CALL
$('#reservation-form').submit(function(event) {
updateDispo();
});
// UPDATE AVAILABILITY IN REAL TIME
$('#date, #heure').on('change', function() {
    updateDispo();
});
});

    $(document).ready(function() {
        $('#my-form').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: 'reservation.php',
                data: formData,
                success: function(response) {
                    // SERVER RESPONSE
                    $('#dispo-message').html(response);
                }
            });
        });
    });

    $(document).ready(function() {
$('#hourInput').change(function() {
    
var date = $('#dateInput').val();
var heure = $('#hourInput').val();
// CHECKING FOR NON-EMPTY FIELDS
if (date !== '' && heure !== '') {
  var formData = {
    date: date,
    heure: heure
  };

  $.ajax({
    type: 'POST',
    url: 'verif.php',
    data: formData,
    success: function(response) {
      $('#disponibilite-message').text(response);
    }
  });
}
});
});

$(document).ready(function() {
$('#hourInputNight').change(function() {
var date = $('#dateInput').val();
var heure = $('#hourInputNight').val();
// 
if (date !== '' && heure !== '') {
  var formData = {
    date: date,
    heure: heure
  };

  $.ajax({
    type: 'POST',
    url: 'verif.php',
    data: formData,
    success: function(response) {
      $('#disponibilite-message').text(response);
    }
  });
}
});
});

$(document).ready(function() {
function detectJour(jour) {
    
    var jour = jour;

    $.ajax({
        type: 'POST',
        url: 'dateHeure.php',
        data: { jour: jour },
        dataType: 'json',
        success: function(response) {
          
      var options = JSON.parse(JSON.stringify(response));
      var select = $('#hourInput');

      // ADDING NEW OPTIONS
      
      options.forEach(function(option) {
        select.append('<option value="' + option.value + '">' + option.label + '</option>');
      });
    }
    });
}
function detectSoir(jour) {
    
    var jour = jour;

    $.ajax({
        type: 'POST',
        url: 'dateHeureNight.php',
        data: { jour: jour },
        dataType: 'json',
        success: function(response) {
          
      var options = JSON.parse(JSON.stringify(response));
      var select = $('#hourInputNight');
      
      options.forEach(function(option) {
        select.append('<option value="' + option.value + '">' + option.label + '</option>');
      });
    }
    });
}
$('#dateInput').change(function() {
var date = $('#dateInput').val();

$.ajax({
  type: 'POST',
  url: 'jour_semaine.php',
  data: { date: date },
  success: function(response) {
    
    detectJour(response);
    detectSoir(response);
  }
    });
  });
});

$(document).ready(function() {
// RADIO BUTTON HANDLING
$('input[name="periode"]').change(function() {
var selectedValue = $(this).val();

// DISABLE SELECT HTML ELEMENT BY WHICH RADIO HAS BEEN PRESSED
if (selectedValue === 'jour') {
  $('#hourInput').prop('disabled', false);
  $('#hourInputNight').prop('disabled', true);
} else if (selectedValue === 'soir') {
  $('#hourInput').prop('disabled', true);
  $('#hourInputNight').prop('disabled', false);
    }
  });
});