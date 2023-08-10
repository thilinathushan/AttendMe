<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1" id="greeting"></h3>
            <script>
                // Get the current time
                var currentTime = new Date();
                var currentHour = currentTime.getHours();

                // Get the name of the person
                var personName = "{{ Auth::user()->first_name }} !"; // Replace with the actual name of the person

                // Define the greeting based on the time of day
                var greeting;
                if (currentHour < 12) {
                    greeting = "Good morning, " + personName;
                } else if (currentHour < 18) {
                    greeting = "Good evening, " + personName;
                } else {
                    greeting = "Good night, " + personName;
                }

                // Display the greeting in the HTML element
                var greetingElement = document.getElementById('greeting');
                greetingElement.textContent = greeting;
            </script>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right">
                <p id="current-date" class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius"></p>
                <script>
                    // Get the current date
                    var currentDate = new Date();

                    // Format the date
                    var options = {
                        month: 'long',
                        day: 'numeric'
                    };
                    var formattedDate = currentDate.toLocaleDateString(undefined, options);

                    // Display the date in the HTML element
                    var dateElement = document.getElementById('current-date');
                    dateElement.textContent = formattedDate;
                </script>
            </div>
        </div>
    </div>
</div>
<!-- End Bread crumb and right sidebar toggle -->