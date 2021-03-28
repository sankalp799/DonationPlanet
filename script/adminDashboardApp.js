let chart = document.getElementById('categoryChart').getContext('2d');
let categoryTable = document.querySelectorAll('#categories div');
let categories = [];
let donationEachCategory = [];

// manage categories and number of donation made each category
categoryTable.forEach(current => {
    let text = current.innerHTML.split('-');
    categories.push(text[0]);
    donationEachCategory.push(parseInt(text[1]));
});

Chart.defaults.global.defaultFontFamily = 'Lato';
Chart.defaults.global.defaultFontSize = 16;
Chart.defaults.global.defaultFontColor = '#111111';

let donationChart = new Chart(chart, {
    type: 'doughnut',
    data: {
        labels: categories,
        datasets: [{
            label: "Donations",
            data: [199, 344, 123, 566, 230, 145],
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responvise: false,
        tooltips: {

        },
        legend: {
            display: true,
            position: 'right',
            labels: {
                fontColor: '#111111'
            }
        },
        layout: {
            padding: {
                left: 20,
                top: 20,
                right: 20,
                bottom: 20
            }
        },
        title: {
            display: true,
            text: "Categories",
            fontSize: 30,
            position: 'bottom'
        }
    },

});