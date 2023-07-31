/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */
const lineConfig = {
  type: 'line',
  data: {
    labels: ['0.0', '0.2', '0.4', '0.6','0.8','1.0'],
    datasets: [
      {
        // label: 'Organic',
        /**
         * These colors come from Tailwind CSS palette
         * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
         */
        backgroundColor: '#0694a2',
        borderColor: '#0694a2',
        data: [0.3000000,0.0243761806
          , 0.012344180
          , 0.0082641805
          ,  0.00621118055
          ,  0.00497518055],
        fill: false,
      },
      // {
      //   label: 'Paid',
      //   fill: false,
      //   /**
      //    * These colors come from Tailwind CSS palette
      //    * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
      //    */
      //   backgroundColor: '#7e3af2',
      //   borderColor: '#7e3af2',
      //   data: [24, 50, 64, 74, 100],
      // },
      // {
      //   label: 'department',
      //   fill: false,
      //   /**
      //    * These colors come from Tailwind CSS palette
      //    * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
      //    */
      //   backgroundColor: '#1c64f2',
      //   borderColor: '#1c64f2',
      //   data: [14, 5, 46, 47, 100],
      // },
      
    ],
  },
  options: {
    responsive: true,
    /**
     * Default legends are ugly and impossible to style.
     * See examples in charts.html to add your own legends
     *  */
    legend: {
      display: false,
    },
    tooltips: {
      mode: 'index',
      intersect: false,
    },
    hover: {
      mode: 'nearest',
      intersect: true,
    },
    scales: {
      x: {
        display: true,
        scaleLabel: {
          display: true,
          labelString: 'Month',
        },
      },
      y: {
        display: true,
        scaleLabel: {
          display: true,
          labelString: 'Value',
        },
      },
    },
  },
}

// change this to the id of your chart element in HMTL
const lineCtx = document.getElementById('line')
window.myLine = new Chart(lineCtx, lineConfig)
