$(document).ready( function() {

    var vehicles;

    $("#moto-search-checkbox").on("change", function() {
    });

    var moto = $("#moto-search-checkbox").prop("checked");
    var path = "booking_results";

    $.post( path, { 'moto' : moto } )
        .done( function(data) {
            vehicles = data.vehicles;
        });