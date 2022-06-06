<div class="bg-primary p-10 min-h-screen">
    <h1 class="text-2xl py-4 font-bold text-secondary2 uppercase mb-10">Dashboard</h1>
    
    <canvas id="myChart" style="width:100%;" ></canvas>
</div>

<?php
 $datay = [];
 $datax = [];
 foreach ($genre as $g) {
     $data = 0;
     $datax[] = $g['nama']; 
     foreach ($gfilm as $gf) {
         if ($gf['genre_id'] == $g['id']) {
             $data++;
         }
     }
     $datay[] = $data;
 }
 $jsx = json_encode($datax);
 $jsy = json_encode($datay);
//  var_dump($jsx,$jsy);
?>
<script>
    var xValues = <?php echo($jsx) ?>;
    var yValues = <?php echo($jsy) ?>;
    var barColors = "yellow";
    var color = "yellow";
    new Chart("myChart", {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
    },
    options: {
        legend: {display: false},
        title: {
            display: true,
            text: "Data Banyaknya Film Berdasarkan Genre"
        }
      }
    });
    Chart.defaults.global.defaultFontColor = '#FFF';
</script>