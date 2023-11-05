//TIMETABLE SCRIPT SECTION
function scheduleField(event) {
    var input = event.target;
    input.value = input.value.replace(/[^0-9:]/g, '');
}

$(document).ready(function(){
    //INIT STATE
    var selectedValue = $('#booking_availability').val();
    if (selectedValue == 'scheduleClosed') {
      $('#scheduleOpen').prop('disabled', true);
      $('#scheduleEnd').prop('disabled', true);
    } else if (selectedValue == 'scheduleOpen') {
      $('#scheduleOpen').prop('disabled', false);
      $('#scheduleEnd').prop('disabled', false);
    }
  
    // CHANGE EVENT HANDLER FOR THE SELECTED ELEMENT
    $('#booking_availability').change(function() {
      var selectedValue = $(this).val();
      if (selectedValue == 'scheduleClosed') {
        $('#scheduleOpen').prop('disabled', true);
        $('#scheduleEnd').prop('disabled', true);
      } else if (selectedValue == 'scheduleOpen') {
        $('#scheduleOpen').prop('disabled', false);
        $('#scheduleEnd').prop('disabled', false);
      }
    });
  });
/////////////TIMETABLE END///////////

//DISPLAY TRIGGER SCRIPT SECTION
function triggerClick() {
    document.querySelector('#foodImg').click();
  }
  
  function displayImage(e) {
    if (e.files[0]) {
      var reader = new FileReader();
  
      reader.onload = function(e) {
        document.querySelector('#foodImg').setAttribute('src', e.target.result);
      }
      reader.readAsDataURL(e.files[0]);
    }
  }
/////////////DISPLAY TRIGGER END///////////