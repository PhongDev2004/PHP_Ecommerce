
 
 
 <!-- Main -->
 <main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">DASHBOARD</p>
        </div>

        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <p class="text-primary"><a href="indexadmin.php?act=pro" style="text-decoration: none;">PRODUCTS</a></p>
              <span class="material-icons-outlined text-blue">inventory_2</span>
            </div>
            <?php 
            
                  if (is_array($pro)) {
                    
                    extract($pro);

            ?>
            <span class="text-primary font-weight-bold"><?= $countpro ?></span>
        <?php } ?>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary"><a href="indexadmin.php?act=donhang" style="text-decoration: none;">PURCHASE ORDERS</a></p>
              <span class="material-icons-outlined text-orange">add_shopping_cart</span>
            </div>
            <?php 
                  if (is_array($donhang)) {
                    extract($donhang);
            ?>
            <span class="text-primary font-weight-bold"><?= $countdh ?></span>
        <?php } ?>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary"><a href="indexadmin.php?act=listbl" style="text-decoration: none;">COMMENT</a></p>
              <span class="material-icons-outlined text-green"><i class="bi bi-chat-text"></i></span>
            </div>
            <?php 
                  if (is_array($bl)) {
                    extract($bl);
            ?>
            <span class="text-primary font-weight-bold"><?= $countbl ?></span>
        <?php } ?>

          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary"><a href="indexadmin.php?act=listtk" style="text-decoration: none;">USE</a></p>
              <span class="material-icons-outlined text-red"><i class="bi bi-person-vcard-fill"></i></span>
            </div>
            <?php 
                  if (is_array($kh)) {
                    extract($kh);
            ?>
            <span class="text-primary font-weight-bold"><?= $countkh ?></span>
        <?php } ?>

          </div>

        </div>

        <div class="charts">

          <div class="charts-card">
            <p class="chart-title">Top 5 Products</p>
            <div id="bar-chart"></div>
          </div>

          <div class="charts-card">
            <p class="chart-title">Order statistics by status</p>
            <div id="area-chart"></div>
          </div>

        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script>
        // SIDEBAR TOGGLE

let sidebarOpen = false;
const sidebar = document.getElementById('sidebar');

function openSidebar() {
  if (!sidebarOpen) {
    sidebar.classList.add('sidebar-responsive');
    sidebarOpen = true;
  }
}

function closeSidebar() {
  if (sidebarOpen) {
    sidebar.classList.remove('sidebar-responsive');
    sidebarOpen = false;
  }
}

// ---------- CHARTS ----------

// BAR CHART
const barChartOptions = {
  series: [
    {
      data: [
        <?php 
                  foreach ($top5 as $a) {
                    extract($a);
            ?>
                  '<?php echo $pro_stock ?>',
        <?php } ?>
      ],
    },
  ],
  chart: {
    type: 'bar',
    height: 350,
    toolbar: {
      show: false,
    },
  },
  colors: ['#246dec', '#cc3c43', '#367952', '#f5b74f', '#4f35a1'],
  plotOptions: {
    bar: {
      distributed: true,
      borderRadius: 4,
      horizontal: false,
      columnWidth: '40%',
    },
  },
  dataLabels: {
    enabled: false,
  },
  legend: {
    show: false,
  },
  xaxis: {
    categories: [
      <?php 
                  foreach ($top5 as $a) {
                    extract($a);
            ?>
                  '<?php echo $pro_name ?>',
        <?php } ?>
    ],
  },
  yaxis: {
    title: {
      text: 'Count',
    },
  },
};

const barChart = new ApexCharts(
  document.querySelector('#bar-chart'),
  barChartOptions
);
barChart.render();

// AREA CHART
const areaChartOptions = {
  series: [
    {
      name: 'Number of orders',
      data: [
        <?php 
                  foreach ($dh as $a) {
                    extract($a);
            ?>
                  '<?php echo $so_luong_donhang ?>',
        <?php } ?>
      ],
    },
    {
      name: 'Sales Orders',
      data: [
      ],
    },
  ],
  chart: {
    height: 350,
    type: 'area',
    toolbar: {
      show: false,
    },
  },
  colors: ['#4f35a1', '#246dec'],
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: 'smooth',
  },
  labels: [
    <?php 
                  foreach ($dh as $a) {
                    extract($a);
            ?>
                  '<?php echo $order_trangthai ?>',
        <?php } ?>
  ],
  markers: {
    size: 0,
  },
  yaxis: [
    {
      title: {
        text: 'Number of orders',
      },
    },
    {
      opposite: true,
      title: {
        text: 'Total amount',
      },
    },
  ],
  tooltip: {
    shared: true,
    intersect: false,
  },
};

const areaChart = new ApexCharts(
  document.querySelector('#area-chart'),
  areaChartOptions
);
areaChart.render();

    </script>
      </main>
      <!-- End Main -->