$(function () {
  var path = window.location.href; // Mengambil data URL pada Address bar
  $(".nav-side ul li a").each(function () {
    // Jika URL pada menu ini sama persis dengan path...
    if (this.href === path) {
      // Tambahkan kelas "active" pada menu ini
      $(this)
        .parent()
        .parent()
        .parent()
        .children()
        .first()
        .removeClass("collapsed");
      $(this).parent().parent().addClass("show");
      $(this).addClass("active");
    }

    $(".nav-side a").each(function () {
      console.log("ok");
      // Jika URL pada menu ini sama persis dengan path...
      console.log(this);
      if (this.href === path) {
        // Tambahkan kelas "active" pada menu ini
        $(this).removeClass("collapsed");
      }
    });
  });
  $(".nav-side a").each(function () {
    console.log("ok");
    // Jika URL pada menu ini sama persis dengan path...
    console.log(this);
    if (this.href === path) {
      // Tambahkan kelas "active" pada menu ini
      $(this).removeClass("collapsed");
    }
  });
});

$(function () {
  var dtToday = new Date();

  var month = dtToday.getMonth() + 1;
  var day = dtToday.getDate();
  var year = dtToday.getFullYear();
  if (month < 10) month = "0" + month.toString();
  if (day < 10) day = "0" + day.toString();

  var minDate = year + "-" + month + "-" + day;

  $("#txtDate").attr("min", minDate);
  $("#txtDate2").attr("min", minDate);
});

// fungsi delete
function confirmToDelete(el) {
  $("#delete-button").attr("href", el.dataset.href);
  $("#confirm-dialog").modal("show");
}
