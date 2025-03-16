$(function() {
  'use strict';

  // Menggunakan substringMatcher untuk mencari kecocokan
  var substringMatcher = function(strs) {
    return function findMatches(q, cb) {
      var matches = [];
      var substrRegex = new RegExp(q, 'i');

      for (var i = 0; i < strs.length; i++) {
        if (substrRegex.test(strs[i])) {
          matches.push(strs[i]);
        }
      }

      cb(matches);
    };
  };

  // Inisialisasi array states
  var states = [];

  // Mendapatkan data dari server
  $.ajax({
    url: '/get-types-of-stock',
    method: 'GET',
    success: function(data) {
      // Memasukkan data yang diterima ke dalam variable 'states'
      states = data.map(function(item) {
        return item.tos_name;
      });

      // Menginisialisasi Typeahead setelah data dimuat
      $('#the-basics .typeahead').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
      }, {
        name: 'states',
        source: substringMatcher(states)
      });

      // Atau menggunakan Bloodhound
      var bloodhoundStates = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: states
      });

      $('#bloodhound .typeahead').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
      }, {
        name: 'states',
        source: bloodhoundStates
      });
    }
  });
});
