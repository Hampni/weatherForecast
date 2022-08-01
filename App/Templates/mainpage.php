<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
    <title>Weather Forecast</title>
</head>
<body>

<form method="post" action="" id="weather">
    <input name="city" list="cities" type="text" id="citiesInput" value="Киев">
    <datalist id="cities">
        <?php
        foreach ($this->data['cities'] as $city) {
            echo '<option value="' . $city->name . '"></option>';
        }
        ?>
    </datalist>
    <input type="submit">
</form>
<div style="max-width: 550px; border: 1px solid black">
<div style="width: 100px; height: 100px; border: 1px solid black; float: left">sdfk</div>
<div style="width: 100px; height: 100px; border: 1px solid black; float: left">sdfk</div>
<div style="width: 100px; height: 100px; border: 1px solid black; float: left">sdfk</div>
<div style="width: 100px; height: 100px; border: 1px solid black; float: left">sdfk</div>
<div style="width: 100px; height: 100px; border: 1px solid black; float: left">sdfk</div>
<div style="width: 100px; height: 100px; border: 1px solid black; float: left">sdfk</div>
<div style="width: 100px; height: 100px; border: 1px solid black; float: left">sdfk</div>
</div>
<script src="/Public/main.js"></script>
</body>
</html>