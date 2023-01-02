<html>
  <head>
    <title>Kangaroo Tracker</title>
  </head>
  <body>
    <form id="add-form">
      <label for="name">Name:</label><br>
      <input type="text" id="name" name="name"><br>
      
      <label for="name">Nickname:</label><br>
      <input type="text" id="nickname" name="nickname"><br>

      <label for="name">Weight:</label><br>
      <input type="text" id="weight" name="weight"><br>

      <label for="name">Height:</label><br>
      <input type="text" id="height" name="height"><br>

      <label for="gender">Gender:</label><br>
      <select id="gender" name="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select><br>

      <label for="color">Color:</label><br>
      <input type="text" id="color" name="color"><br>

      <label for="friendliness">Friendliness:</label><br>
      <select id="friendliness" name="friendliness">
        <option value="Friendly">Friendly</option>
        <option value="Not friendly">Not Friendly</option>
      </select><br>

      <label for="birthday">Birthday:</label><br>
      <input type="text" id="birthday" name="birthday"><br>

      <button type="submit">Submit</button>
    </form> 

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <script>
    $(document).ready(function () {
      $('#birthday').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
      });

      $("#add-form").submit(function(event) {
        event.preventDefault();
        var newData = {
          name: $("#name").val(),
          nickname: $("#nickname").val(),
          weight: $("#weight").val(),
          height: $("#height").val(),
          gender: $("#gender").val(),
          color: $("#color").val(),
          friendliness: $("#friendliness").val(),
          birthday: $("#birthday").val()
        };

        // // Send a POST request to the server to update information
        axios.post("/api/kangaroo", newData).then(response => {
          window.location.href = '/kangaroo';
        });
      });
    });
    </script>
  </body>
</html>