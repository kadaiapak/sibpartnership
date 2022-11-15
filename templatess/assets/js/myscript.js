var flash = $("#flash").data("flash");
if (flash) {
  swal("Berhasil", flash, "success");
}

var errorFlash = $("#errorFlash").data("flash");
if (errorFlash) {
  swal("Gagal", errorFlash, "error");
}

var gagal = $("#gagal").data("flash");
if (gagal) {
  swal("Gagal", gagal, "error");
}

$("#level_menu").on("change", function () {
  var value = $(this).val();
  if (value == "sub_menu") {
    $("#main_menu").fadeIn("fast", function () {});
    $("#pemisah_menu").fadeOut("fast", function () {});
    $("#menu_icon").fadeOut("fast", function () {});
  } else if (value == "single_menu" || value == "main_menu") {
    $("#main_menu").fadeOut("fast", function () {});
    $("#pemisah_menu").fadeIn("fast", function () {});
    $("#menu_icon").fadeIn("fast", function () {});
  }
});

// jquery button confirmation
