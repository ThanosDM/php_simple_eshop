//POST REQUEST
$(document).ready(function () {
  $('#addProduct').click(function (e) {
    e.preventDefault();

    //serialize form data
    var url = $('form').serialize();

    //function to turn url to an object
    function getUrlVars(url) {
      var hash;
      var myJson = {};
      var hashes = url.slice(url.indexOf('?') + 1).split('&');
      for (var i = 0; i < hashes.length; i++) {
        hash = hashes[i].split('=');
        myJson[hash[0]] = hash[1];
      }
      return JSON.stringify(myJson);
    }

    //pass serialized data to function
    var test = getUrlVars(url);

    //post with ajax
    $.ajax({
      type: 'POST',
      url: 'http://localhost/simple_shop_api/api/product/create.php',
      data: test,
      ContentType: 'application/json',

      success: function () {
        alert('product successfully created');
      },
      error: function () {
        alert('Could not be created');
      },
    });
  });
});

//UPDATE REQUEST
$(document).ready(function () {
  $('#updateProduct').click(function (e) {
    e.preventDefault();

    //serialize form data
    var url = $('form').serialize();

    //function to turn url to an object
    function getUrlVars(url) {
      var hash;
      var myJson = {};
      var hashes = url.slice(url.indexOf('?') + 1).split('&');
      for (var i = 0; i < hashes.length; i++) {
        hash = hashes[i].split('=');
        myJson[hash[0]] = hash[1];
      }
      return JSON.stringify(myJson);
    }

    //pass serialized data to function
    var test = getUrlVars(url);

    console.log(test);
    //post with ajax
    $.ajax({
      type: 'PUT',
      url: 'http://localhost/simple_shop_api/api/product/update.php',
      data: test,
      ContentType: 'application/json',

      success: function () {
        alert('product successfully updated');
      },
      error: function () {
        console.log(test);
        alert(test);
        alert('Could not be updated');
      },
    });
  });
});

//DELETE REQUEST
$(document).ready(function () {
  $('.deleteProduct_btn').click(function (e) {
    e.preventDefault();
    var data_id = $(this).closest('span').find('.p_id_input').val();
    //console.log(data_id);

    var obj = { p_id: 1 };
    Object.assign(obj, { p_id: data_id });
    data_id = JSON.stringify(obj);

    //post with ajax
    $.ajax({
      type: 'POST',
      url: 'http://localhost/simple_shop_api/api/product/delete.php',
      data: data_id,
      ContentType: 'application/json',

      success: function () {
        //alert(data_id);
        alert('product successfully deleted');
        location.reload();
      },
      error: function () {
        //alert(data_id);
        alert('Could not be deleted');
      },
    });
  });
});

//GET REQUEST
// document.addEventListener('DOMContentLoaded', function () {
//   document.getElementById('getMessage').onclick = function () {
//     var req;
//     req = new XMLHttpRequest();
//     req.open(
//       'GET',
//       'http://localhost/simple_shop_api/api/product/read.php',
//       true
//     );
//     req.send();

//     req.onload = function () {
//       var json = JSON.parse(req.responseText);

//       //limit data called
//       var son = json.filter(function (val) {
//         return val.id >= 4;
//       });

//       var html = '';

//       //loop and display data
//       son.forEach(function (val) {
//         var keys = Object.keys(val);

//         html += "<div class = 'cat'>";
//         keys.forEach(function (key) {
//           html += '<strong>' + key + '</strong>: ' + val[key] + '<br>';
//         });
//         html += '</div><br>';
//       });

//       //append in message class
//       document.getElementsByClassName('message')[0].innerHTML = html;
//     };
//   };
// });
