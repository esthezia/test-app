$(function () {
    $("#delete-confirmation").on("show.bs.modal", function(e) {
        $(this).find(".btn-success").attr("href", $(e.relatedTarget).attr("href"));
    });

    // just to be sure nothing is left behind
    $("#delete-confirmation").on("hide.bs.modal", function(e) {
        $(this).find(".btn-success").attr("href", "#");
    });
});
