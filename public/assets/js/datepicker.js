$(function() {
  'use strict';

  if($('#dateResepsi').length) {
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#dateResepsi').datepicker({
      format: "yyyy-mm-dd",
      todayHighlight: true,
      autoclose: true
    });
    $('#dateResepsi').datepicker('setDate', today);
  }

  if($('#dateAkad').length) {
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#dateAkad').datepicker({
      format: "yyyy-mm-dd",
      todayHighlight: true,
      autoclose: true
    });
    $('#dateAkad').datepicker('setDate', today);
  }
});