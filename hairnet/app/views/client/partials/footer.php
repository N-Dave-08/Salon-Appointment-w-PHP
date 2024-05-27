
<script>
    const pathname = window.location.pathname;
    const pagename = pathname.split("/").pop();

    console.log(pagename);

    if (pagename === 'book' || pagename === 'schedule') {
        document.querySelector(".book").classList.add('active')
    }

    if (pagename === 'mybookings' || pagename === 'details') {
        document.querySelector(".mybookings").classList.add('active')
    }

    if (pagename === 'client') {
        document.querySelector(".client").classList.add('active')
    }

    if (pagename === 'reviews') {
        document.querySelector(".reviews").classList.add('active')
    }

    if (pagename === 'calendar') {
        document.querySelector(".calendar").classList.add('active')
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



</html>