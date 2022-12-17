//show or hide quiz div
function startQuiz() {
  var x = document.getElementById("quiz");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

//avoid quiz page from reloading
window.onbeforeunload = function() {
        return "";
    }

//quiz count down timer
var input = document.getElementById("quiz_time");
var button = document.getElementById("btn");
var started = false;
var timer;
var startTimer = function (count) {
  return setInterval(function () {
    input.setAttribute("value", --count);
  }, 900);
}
button.addEventListener("click", function () {
  if (!started) {
    var count = parseInt(input.getAttribute("value"));
    timer = startTimer(count);
    started = true;
    button.innerHTML = "Pause Quiz";
  } else {
    clearInterval(timer);
    started = false;
    button.innerHTML = "Resume Quiz";
  }
});
