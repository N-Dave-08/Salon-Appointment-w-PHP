

<script>
        const pathname = window.location.pathname;
        const pagename = pathname.split("/").pop();

        console.log (pagename);

        if(pagename === 'home') {
            document.querySelector(".home").classList.add('active')
        }

        if(pagename === 'reviews') {
            document.querySelector(".reviews").classList.add('active')
        }

    </script>

</html>
