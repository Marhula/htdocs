<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([['Vozidlo', 'Najazdene km'],<?php foreach (array_reverse($topkm) as $row) echo "['".$row->auto."','". $row->najazdeneKM ."'],";?>]);

        var options = {
            width: 900,
            legend: { position: 'none' },
            chart: { title: 'Top 5 vozidiel s najviac najazdenými km'},
            bars: 'horizontal',
            axes: {
                x: {
                    0: { side: 'top', label: 'Najazdene km'} // Top x-axis.
                }
            },
            bar: { groupWidth: "90%" }
        };
        var chart = new google.charts.Bar(document.getElementById('najazdeneKM'));
        chart.draw(data, options);
    };
</script>
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            <?php foreach (array_reverse($pocetAut) as $row) echo "['".$row->auto."','". $row->najazdeneKM ."'],";?>
        ]);

        var options = {
            title: 'My Daily Activities',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
</script>
<h1>Dashboard</h1>
<div id="najazdeneKM" style="width: 80%; height: 60%;"></div>