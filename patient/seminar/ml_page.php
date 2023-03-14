<!DOCTYPE html>
<html>
<head>
    <title>Prediction</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
    <form action="" method="POST">
        <label for="feature1">Feature 1:</label>
        <input type="text" name="symtomp1" id="symtomp1">

        <label for="feature2">Feature 2:</label>
        <input type="text" name="symtomp2" id="symtomp2">

        <button type="submit" name="predict" id="predict">Submit</button>
    </form>
</body>
<script>
  $("#predict").click(() => {
    
    symp1 = document.getElementById("symtomp1").value;
    symp2 = $("#symtomp2").val();
      $.ajax({
        type: "POST",
        url: "external_api.php",
        data: {
          "symptom": {
            "symp1": symp1,
            "symp2": symp2,
          },
          'action': 1,
        },
        dataType: 'JSON',
        cache: false,
        beforeSend: function() {
          $('#loading').show();
        },
        success: function(response) {
          $('#loading').hide();
          $("#finalSbtBtn").removeAttr('disabled', 'disabled');
          if (response.status == 1) {
            console.log(response.data);
          } else {
            console.log(response.data);
          }
        }
      });
    
  })
</script>
</html>