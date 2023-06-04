// var options = {
//     series: [{
//       name: "Desktops",
//       data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
//   }],
//     chart: {
//     height: 350,
//     type: 'line',
//     zoom: {
//       enabled: false
//     }
//   },
//   dataLabels: {
//     enabled: false
//   },
//   stroke: {
//     curve: 'straight'
//   },
//   title: {
//     text: 'Number of visitors on the website',
//     align: 'left'
//   },
//   grid: {
//     row: {
//       colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
//       opacity: 0.5
//     },
//   },
//   xaxis: {
//     categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
//   }
//   };

//   var chart = new ApexCharts(document.querySelector("#chart"), options);
//   chart.render();



// function graficoVisitas(visitas,fechas){
//   var options = {
//     series: [{
//       name: "Desktops",
//       data: visitas
//   }],
//     chart: {
//     height: 350,
//     type: 'line',
//     zoom: {
//       enabled: false
//     }
//   },
//   dataLabels: {
//     enabled: false
//   },
//   stroke: {
//     curve: 'straight'
//   },
//   title: {
//     text: 'Number of visitors on the website',
//     align: 'left'
//   },
//   grid: {
//     row: {
//       colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
//       opacity: 0.5
//     },
//   },
//   xaxis: {
//     categories: fechas
//   }
//   };

//   var chart = new ApexCharts(document.querySelector("#chart"), options);
//   chart.render();
// }