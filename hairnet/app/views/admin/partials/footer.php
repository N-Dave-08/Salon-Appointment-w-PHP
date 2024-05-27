<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const labels = <?php echo json_encode($chartData['labels']); ?>;
    const values = <?php echo json_encode($chartData['values']); ?>;

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Number of Bookings',
                data: values,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script>
    const pathname = window.location.pathname;
    const pagename = pathname.split("/").pop();

    console.log(pagename);

    if (pagename === 'dashboard') {
        document.querySelector(".dashboard").classList.add('active')
    }

    if (pagename === 'alter' || pagename === 'add' || pagename === 'services') {
        document.querySelector(".services").classList.add('active')
    }

    if (pagename === 'bookings' || pagename === 'modify') {
        document.querySelector(".bookings").classList.add('active')
    }

    if (pagename === 'users' || pagename === 'edit' || pagename === 'create') {
        document.querySelector(".customers").classList.add('active')
    }

    if (pagename === 'settings' || pagename === 'admin_edit') {
        document.querySelector(".settings").classList.add('active')
    }
</script>
<script>
    $('.open-btn').on('click', function() {
        $('.sidebar').addClass('active');

    });


    $('.close-btn').on('click', function() {
        $('.sidebar').removeClass('active');

    })
</script>
</body>

</html>