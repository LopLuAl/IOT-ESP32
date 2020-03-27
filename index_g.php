<!DOCTYPE HTML>
<html>
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <meta http-equiv="refresh" content="10" > 
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
      <link rel="icon" href="./images/favicon.ico" type="image/x-icon">
      <title>IOT!</title>
    </head>

    <body class = "bg-sucess">

        <h2 class="text-center" class="text-info">ET N ° 12</h2>
        <hr style="border-color:red;">
        <h3 class="text-center" class="text-info">CONTROL SALIDAS</h3>

        <?php
          include_once 'escrbir_g.php';
        ?>

        <div class="text-center">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <button type="submit" name="target1" value="Target 1" class="btn btn-primary">Relay_1</button>
            <button type="submit" name="target2" value="Target 2" class="btn btn-primary">Relay_2</button>
            <button type="submit" name="target3" value="Target 3" class="btn btn-primary">Relay_3</button>
        </form>
      </div>
      <hr style="border-color:red;">
<div class="container">
      <h3 class="text-center">CONTROL ENTRADAS</h3>

<div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr >

                <th scope="col">TEMPERATURA [°C]</th>
                <th scope="col">HUMEDAD</th>
                <th scope="col">LUZ</th>

              </tr>
            </thead>

            <tbody>
              <?php
                foreach($result as $dato)
                {
                  echo '<tr>';

                  echo "<td class=\"text-justify\">";
                  echo $dato['temp'];
                  echo '  </td>';

                    echo "<td class=\"text-justify\">";
                  echo $dato['hum'];
                  echo '  </td>';

                    echo "<td class=\"text-justify\">";
                  echo $dato['lux'];
                  echo  '  </td>';


                  echo '</tr>';
                }
              ?>
             </tbody>
          </table>
</div>
          <p class="text-justify">  </p>
</div>

<hr style="border-color:red;">





        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>

</html>
