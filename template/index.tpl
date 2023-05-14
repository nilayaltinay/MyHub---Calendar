<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyHub Calendar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link href="css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link href="template/index.css" rel="stylesheet">

</head>

<body>

  <div class="container mt-5 mb-5">

    <div class="row" style="padding: 5px;background-color: rgba(0, 0, 0, .03);">
      <div class="switches-container">
        <input type="radio" id="switchMonthly" name="switchPlan" value="weekly" checked="checked" />
        <input type="radio" id="switchWeekly" name="switchPlan" value="monthly" />
        <label for="switchMonthly">Weekly</label>
        <label for="switchWeekly">Monthly</label>
        <div class="switch-wrapper">
          <div class="switch">
            <div>Weekly</div>
            <div>Monthly</div>
          </div>
        </div>
      </div>
    </div>

    <div id="calendar">
    {include file="weekView.tpl"}
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
  </script>
  <script src="template/index.js"></script>
</body>

</html>