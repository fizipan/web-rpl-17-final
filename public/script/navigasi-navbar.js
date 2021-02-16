$(".page-scroll").on("click", function (e) {
  // ambil isi href
  var tujuan = $(this).attr("href");
  // tangkap elemen ybs
  var elemenTujuan = $(tujuan);

  e.preventDefault();

  // pindahkan scroll
  $("body, html").animate(
    {
      scrollTop: elemenTujuan.offset().top - 200,
    },
    1250
  );
});
