<!DOCTYPE HTML>
<html>
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

      <title>Hello, world!</title>
    </head>

    <body>
      <?php
        include_once 'escrbir_g.php';
      ?>
      
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <input type="submit" name="target1" value="Target 1" class="btn btn-primary"></button>
          <input type="submit" name="target2" value="Target 2" class="btn btn-primary"></button>
          <input type="submit" name="target3" value="Target 3" class="btn btn-primary"></button>
      </form>
      <h3 class="text-center">ET N ° 12</h3>
      <div class="table-responsive-sm">
        <table class="table table-sm ">
          <thead>
            <tr>
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

                echo '<td>';
                echo $dato['temp'];
                echo '</td>';

                echo '<td>';
                echo $dato['hum'];
                echo '</td>';

                echo '<td>';
                echo $dato['lux'];
                echo '</td>';


                echo '</tr>';
              }
            ?>
           </tbody>
        </table>
        <p class="text-justify">  </p>








      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
