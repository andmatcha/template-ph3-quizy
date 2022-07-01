////////////モーダルの開閉////////////
const modal = document.getElementById('modal');

function closeModal() {
    modal.style.display = 'none';
    console.log('aaa');
}
document.getElementById('closeBtn').addEventListener('click', closeModal);

function openModal() {
    modal.style.display = 'block';
    console.log('aaa');
}
document.getElementById('openBtn').addEventListener('click', openModal);


////////////グラフ描画////////////

// Load the Visualization API and the corechart package.
google.charts.load('current', { 'packages': ['corechart'] });

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawBarChart);
google.charts.setOnLoadCallback(drawLangsChart);
google.charts.setOnLoadCallback(drawContentsChart);

// Callback that creates and populates a data table,
// instantiates the pie chart, passes in the data and
// draws it.
function drawBarChart() {
    // Create the data table.
    var data = google.visualization.arrayToDataTable(dailySum);
    // Set chart options
    var options = {
        'legend': 'none'
    };
    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.ColumnChart(document.getElementById('barChart'));
    chart.draw(data, options);
}

function drawLangsChart() {
    console.log(hoursLang);
    // Create the data table.
    var data = google.visualization.arrayToDataTable(hoursLang);
    // Set chart options
    var options = {
        'legend': 'none',
        pieSliceText: 'none',
        pieHole: 0.4,
        colors: ['#0445ec', '#0d72bd', '#1ebede', '#3ccefe', '#b29ef3', '#6d46ec', '#4a17ef',
            '#3005c0'],
        pieSliceBorderColor: '',
        enableInteractivity: false
    };
    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('langsChart'));
    chart.draw(data, options);
}

function drawContentsChart() {
    // Create the data table.
    var data = google.visualization.arrayToDataTable(hoursContent);
    // Set chart options
    var options = {
        'legend': 'none',
        pieSliceText: 'none',
        pieHole: 0.4,
        colors: ['#0445ec', '#0d72bd', '#1ebede', '#3ccefe', '#b29ef3', '#6d46ec', '#4a17ef',
            '#3005c0'],
        pieSliceBorderColor: '',
        enableInteractivity: false
    };
    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('contentsChart'));
    chart.draw(data, options);
}

// レスポンシブ
window.onresize = () => {
    drawBarChart();
    drawLangsChart();
    drawContentsChart();
}
