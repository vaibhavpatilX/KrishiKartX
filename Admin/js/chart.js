google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Date');
            data.addColumn('number', 'Performance');
            data.addColumn({ type: 'string', role: 'style' });

            // Generate dummy data
            var dummyData = [
                { date: '2024-03-01', performance: 80 },
                { date: '2024-03-02', performance: 75 },
                { date: '2024-03-03', performance: 85 },
                { date: '2024-03-04', performance: 90 },
                { date: '2024-03-05', performance: 70 }
                // Add more data as needed
            ];

            // Define an array of colors for each column
            var columnColors = ['#3366cc', '#dc3912', '#ff9900', '#109618', '#990099'];

            // Populate data table with dummy data
            dummyData.forEach(function (item, index) {
                data.addRow([item.date, item.performance, columnColors[index % columnColors.length]]);
            });

            // Set chart options
            var options = {
                title: 'Last 5 Days Orders',
                hAxis: { title: 'Date' },
                vAxis: { title: 'Orders' },
                legend: 'none'
            };

            // Instantiate and draw the chart
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }