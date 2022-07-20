  </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  <!--WYSIWYG Editor-->
  <script src="js/tinymce/tinymce.min.js"></script>
  <script src="js/script.js"></script>

  <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

          var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              ['Views',  <?php echo($session->count);?>],
              ['Comments', <?php echo(Comments::countAll());?>],
              ['Users', <?php echo(User::countAll());?>],
              ['Photos', <?php echo(Photos::countAll());?>]
          ]);

          var options = {
              title: 'My Gallery System',
              backgroundColor: "transparent",
              is3D: true,
              legend: "none",
              pieSliceText: "label"
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart'));

          chart.draw(data, options);
      }
  </script>
</body>

</html>
