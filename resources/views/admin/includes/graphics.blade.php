<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
            var ctx = document.getElementsByClassName("line-chart");

            var chartGraph = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Jan", "Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez"],
                    datasets: [{
                        label: 'Taxa de uso do site em 2019',
                        data: [33,30,40,39,30,50,40,50,20,60,50,40],
                        borderWidth: 3,
                        borderColor: 'rgb(47, 114, 255, 0.5)',
                        backgroundColor: 'rgb(47, 114, 255, 0.5)'
                    }]
                }
            });
</script>
