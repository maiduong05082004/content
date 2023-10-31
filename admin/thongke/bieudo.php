<div class="row2">
  <div class="row2 font_title">
    <h1>Biểu đồ</h1>
  </div>
  <div class="row2 form_content ">
    <div id="myChart" style="width:100%; width:800px; height:500px; align-items: center">
    </div>

    <script>
      google.charts.load('current', {
        'packages': ['corechart']
      });
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {


        const data = google.visualization.arrayToDataTable([
          ['Danh Mục', 'Số Lượng'],
          <?php

          foreach ($dsthongke as $thongke) {
            extract($thongke);
            echo "['$name',$soluong],";
          }

          ?>
        ]);
        const options = {
          title: 'Thống kê sản phẩm theo danh mục',
          is3D: true
        };

        const chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);

      }
    </script>
    <a href="index.php?act=thongke"> <input class="mr20" type="button" value="Xem thống kê"></a>
  </div>
</div>