
    <!-- main -->
                <div class="container">
                    <h2 class="border border-4 mb-4 text-bg-secondary p-3 text-center rounded">Biểu đồ</h2>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                    google.charts.load("current", {packages:["corechart"]});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Danh mục', 'Số lượng'],
                        <?php foreach ($listthongke as $thongke) { 
                              extract($thongke);
                              ?>
                        ['<?= $tendm ?>',  <?= $soluong ?>],
                        <?php  } ?>
                        ]);

                        var options = {
                        title: 'Thống kê sản phẩm theo danh mục',
                        is3D: true,
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                        chart.draw(data, options);
                    }
                    </script>
                    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
                </div>
      