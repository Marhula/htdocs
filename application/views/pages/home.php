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
            ['Značka', 'Počet'],
            <?php foreach (array_reverse($pocetAut) as $row) echo "['".$row->znacka."',". $row->pocetAut ."],";?>
        ]);

        var options = {
            title: 'Percentualne zastupenie značiek automilov v našej garáži',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pocet'));
        chart.draw(data, options);
    }
</script>
<script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([['Vodič', 'Dĺžka'],<?php foreach ($smena as $row) echo "['".$row->taxikar."','". str_replace(":",".",substr($row->cas,0,5)) ."'],";?>]);

        var options = {
            chart: {
                title: 'Najdlhšie smeny',
            }
        };

        var chart = new google.charts.Bar(document.getElementById('maxSluzby'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

</script>
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Zakaznik', 'km'],
            <?php foreach ($cesty as $row) echo "['".$row->zakaznik."',". $row->km ."],";?>
        ]);

        var options = {
            title: 'Precestovaná vzdialenosť našich zákazníkov',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('km'));
        chart.draw(data, options);
    }
</script>
<h1>Dashboard</h1>
<div id="najazdeneKM" style="width: 50%; height: 60%"></div>
<div id="pocet" style="width: 100%; height: 120%;"></div>
<div id="maxSluzby" style="width: 100%; height: 60%"></div>
<div id="km" style="width: 100%; height: 120%;"></div>