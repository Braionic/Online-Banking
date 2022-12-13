var i = 0;
function move() {
  if (i == 0) {
    i = 1;
    var elem = document.getElementById("myBar");
    var width = 10;
    var id = setInterval(frame, 10);
    function frame() {
      if (width >= 18) {
        clearInterval(id);
        i = 0;
      } else {
        width++;
        elem.style.width = width + "%";
        elem.innerHTML = width  + "%";
      }
    }
  }
}

var i = 0;
(function cot() {
  if (i == 0) {
    i = 1;
    var elem = document.querySelector(".myBar");
    var width = 10;
    var id = setInterval(frame, 10);
    function frame() {
      if (width >= 80) {
        clearInterval(id);
        i = 0;
      } else {
        width++;
        elem.style.width = width + "%";
        elem.innerHTML = width  + "%";
      }
    }
  }
}())

var i = 0;
(function cot2() {
  if (i == 0) {
    i = 1;
    var elem = document.querySelector(".myBar2");
    var width = 10;
    var id = setInterval(frame, 10);
    function frame() {
      if (width >= 92) {
        clearInterval(id);
        i = 0;
      } else {
        width++;
        elem.style.width = width + "%";
        elem.innerHTML = width  + "%";
      }
    }
  }
}())