$(document).ready(function() {
  //DATEPICKER API
  $('#datepicker').datepicker({
      uiLibrary: 'bootstrap5'
  });

  // UPDATE AVAILABILITY FUNCTION
  function updateAvailability() {
      var date = $('#dateInput').val();
      var hour = $('input[name="periode"]:checked').val() === 'jour' ? $('#hourInput').val() : $('#hourInputNight').val();

      if (date && hour) {
          $.ajax({
              type: 'POST',
              url: 'booking.php',
              data: { date: date, heure: hour },
              success: function(response) {
              //DEBUG
              $('#disponibilite-message').text(response);
              }
          });
      }
  }

  // BIND EVENTY HANDLERS 
  $('#dateInput, input[name="periode"], #hourInput, #hourInputNight').on('change', updateAvailability);

  // HANDLE FORM SUBMISSION
  $('#my-form').submit(function(event) {
    var formData = $('#my-form').serialize();
      event.preventDefault();
      var formData = $(this).serialize();

      $.ajax({
        type: 'POST',
        url: 'booking.php',
        data: formData,
        dataType: 'json', // RESPONSE TYPE
        success: function(response) {
          $('#echo-msg').text(response.message); // UPDATE MODAL WITH MSG BY PRESSING SEND (Success || Error)
        }
      });
  });
  
function detectJour(jour) {

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
  // CLEAR EXISTING OPTIONS & GETS NEW HOURS FROM THE SELECTED DAY
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

  // RADIO BUTTON HANDLING
  $('#hourInput').prop('disabled', true);
  $('#hourInputNight').prop('disabled', true);
  $('#allergiesManual').prop('disabled', false);

  $('input[name="periode"], input[name="hasAllergies"]').change(function() {
    
  var selectedValue = $(this).val();

  // DISABLE SELECT HTML ELEMENT BY WHICH RADIO HAS BEEN PRESSED
  if (selectedValue === 'jour') {
    $('#hourInput').prop('disabled', false);
    $('#hourInputNight').prop('disabled', true);
  } else if (selectedValue === 'soir') {
    $('#hourInput').prop('disabled', true);
    $('#hourInputNight').prop('disabled', false);
  }
  //ALLERGIES RADIO ELEMENTS
  else if (selectedValue === 'allergiesModalInput') {
    $('#allergiesModal').prop('disabled',false);
  } else if (selectedValue === 'allergiesUserInput') {
    $('#allergiesModal').prop('disabled',  true);
  }
    });