/* CONFIG -- Quick edits */
var ratingImages = {
  toothbrush: "http://www.clipartbest.com/cliparts/ncX/L5R/ncXL5R9di.png",
  chocolate: "http://www.clipartbest.com/cliparts/ncX/L5R/ncXL5R9di.png"
};


/* Here's the actual code now. */
function updateCountdown() {
  var today = new Date();
  var halloweenThisYear = new Date(today.getFullYear(), 9, 31, 0, 0, 0, 0);
  var halloween = (halloweenThisYear.getTime() < today.getTime()) ? new Date(today.getFullYear() + 1, 9, 31, 0, 0, 0, 0) : halloweenThisYear;
  var totalSeconds = Math.floor((halloween.getTime() - today.getTime()) / 1000);

  var days = Math.floor(totalSeconds / (24 * 60 * 60));
  var hours = Math.floor((totalSeconds - (days * 24 * 60 * 60)) / (60 * 60));
  var minutes = Math.floor((totalSeconds - ((days * 24 * 60 * 60) + (hours * 60 * 60))) / 60);
  var seconds = Math.round(totalSeconds - ((days * 24 * 60 * 60) + (hours * 60 * 60) + (minutes * 60)));

  $("#clockdiv .days").text(days);
  $("#clockdiv .hours").text(hours);
  $("#clockdiv .minutes").text(minutes);
  $("#clockdiv .seconds").text(seconds);

  return [days, hours, minutes, seconds];
}

// Setup countdown
$(function() {
  setInterval(updateCountdown, 1000);
  updateCountdown();
});

// Setup interactive ratings, woo!!!!!

$(function() {
  $(".ratings").each(function() {
    if ($(this).hasClass("1-stars")) {
      $(this).append($("<img></img>").attr("src", ratingImages.toothbrush).css("width", "2em"));
    } else {
      var $image = $("<img></img>").attr("src", ratingImages.chocolate);
      var count = 4;
      if ($(this).hasClass("2-stars")) {
        count = 2;
      } else if ($(this).hasClass("3-stars")) {
        count = 3;
      } else if ($(this).hasClass("5-stars")) {
        count = 5;
      }

      $image.css("width", (2 + ((count - 1) * 0.5)) + "vw");

      for (var i = 0; i < count; i++) {
        $image.clone().appendTo($(this));
      }
    }
  });
});

$(function () {
  $('[data-toggle="popover"]').popover()
})
