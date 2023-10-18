      //DATEPICKER API
      $('#datepicker').datepicker({
        uiLibrary: 'bootstrap5'
    });


    // AVAILABLE SEATS FUNCTION
    $(document).ready(function() {

    function updateDispo() {
    
    var date = $('#dateInput').val();
    if(($('#hourInput').val()) == '') {
      var hour = $('#hourInputNight').val();
    } else {
      var hour = $('#hourInput').val();
    }
    var seats = $('#platesClient').val();
    
    $.ajax({
        type: 'POST',
        url: 'booking.php',
        data: { bookingDate: date, bookingTime: hour, platesClient: seats },
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
                url: 'booking.php',
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
var hour = $('#hourInput').val();
// CHECKING FOR NON-EMPTY FIELDS
if (date !== '' && hour !== '') {
  var formData = {
    date: date,
    hour: hour
  };

  $.ajax({
    type: 'POST',
    url: 'tableCheck.php',
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
var hour = $('#hourInputNight').val();
// 
if (date !== '' && hour !== '') {
  var formData = {
    date: date,
    hour: hour
  };

  $.ajax({
    type: 'POST',
    url: 'tableCheck.php',
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
        url: 'dateHourDay.php',
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
        url: 'dateHourNight.php',
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
  // Clear existing options
  $('#hourInput').empty();
  $('#hourInputNight').empty();
  var date = $('#dateInput').val();

  $.ajax({
    type: 'POST',
    url: 'days.php',
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
  $('#hourInput').prop('disabled', true);
            $('#hourInputNight').prop('disabled', true);


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