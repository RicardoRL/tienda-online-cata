let ctx = document.getElementById('customChart').getContext('2d');
let labels = [cerveza1, cerveza2, cerveza3, cerveza4, cerveza5,];
let colorHex = ['#FB3640', '#EFCA08', '#43AA8B', '#253D5B', '#414454'];


let myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    datasets: [{
      data: [cant1, cant2, cant3, cant4, cant5],
      backgroundColor: colorHex
    }],
    labels: labels
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom'
    },
    plugins: {
      datalabels: {
        color: '#fff',
        anchor: 'end',
        align: 'start',
        offset: -10,
        borderWidth: 2,
        borderColor: '#fff',
        borderRadius: 25,
        backgroundColor: (context) => {
          return context.dataset.backgroundColor;
        },
        font: {
          weight: 'bold',
          size: '10'
        },
        formatter: (value) => {
          return value + ' %';
        }
      }
    }
  }
})