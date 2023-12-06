
    <!-- main -->
                <div class="container">
                    <h2 class="border border-4 mb-4 text-bg-secondary p-3 text-center rounded">Biểu đồ</h2>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                    google.charts.load("current", {packages:["corechart"]});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Tên sản phẩm', 'Số lượng bình luận'],
                        <?php foreach ($listtkbl as $bl) { 
                              extract($bl);
                              ?>
                        ['<?= $pro_name ?>',  <?= $sobinhluan ?>],
                        <?php  } ?>
                        ]);

                        var options = {
                        title: 'Thống kê bình luận theo sản phẩm',
                        is3D: true,
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                        chart.draw(data, options);
                    }
                    </script>
                    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
                </div>
      