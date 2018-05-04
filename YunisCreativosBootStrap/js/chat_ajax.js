$(function () {
        $('button').click(function () {
          var msg2 = $('#msg').val();
          
          console.log('starting ajax');
          $.ajax({
            url: "./insert.php",
            type: "post",
            data: { name: name2, email: email2, password: password2, gender: gender2 },
            success: function (data) {
              var dataParsed = JSON.parse(data);
              console.log(dataParsed);
            }
          });

        });
      });