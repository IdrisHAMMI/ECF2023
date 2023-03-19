function triggerClick() {
  document.querySelector('#food_img').click();
}

function displayImage(e) {
  if (e.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      document.querySelector('#food_img').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}