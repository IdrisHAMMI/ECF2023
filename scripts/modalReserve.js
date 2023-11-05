$(document).ready(function() {
  //DATEPICKER API
  $('#datepicker').datepicker({
      uiLibrary: 'bootstrap5'
  });

  // UPDATE AVAILABILITY FUNCTION
  function updateAvailability() {
      var date = $('#dateInput').val();
      var hour = $('input[name="periode"]:checked').val() === 'jour' ? $('#hourInput').val() : $('#hourInputNight').val();
      var seats = $('#platesClient').val();

      if (date && hour) {
          $.ajax({
              type: 'POST',
              url: 'booking.php',
              data: { date: date, heure: hour },
              success: function(response) {
                  $('#disponibilite-message').text(response);
              }
          });
      }
  }

  // BIND EVENTY HANDLERS 
  $('#dateInput, input[name="periode"], #hourInput, #hourInputNight').on('change', updateAvailability);

  // HANDLE FORM SUBMISSION
  $('#my-form').submit(function(event) {
      event.preventDefault();
      var formData = $(this).serialize();

      $.ajax({
        type: 'POST',
        url: 'booking.php',
        data: formData,
        dataType: 'json', // Ensure that the response is treated as JSON
        success: function(response) {

          $('#dispo-message').text(response.message); // Update the modal with the message
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
});
