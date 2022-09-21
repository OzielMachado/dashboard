<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      google.charts.load('current', {'packages':['corechart']});

      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = new google.visualization.arrayToDataTable([
          ['id', 'Valor', {role: 'annotation'}],
          <?php
            include 'conexao.php';
            $sql = "SELECT * FROM moviment";
            $buscar = mysqli_query($conexao, $sql);
            while($dados = mysqli_fetch_array($buscar)) {
              $id = $dados['id'];
              $value = $dados['value'];
            
          ?>
          [ <?php echo $id ?>, <?php echo $value ?>, <?php echo $value ?>],
          <?php } ?>
        ]);

        var options = {
          title:'Entradas e Saídas',
          legend: {position: 'right'}
        };

        var chart = new google.visualization.LineChart(document.getElementById('graficoLinha'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <div id="graficoLinha" style="width: 900px; height: 500px;"></div>
  </body>
</html>