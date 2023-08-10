<header class="p-2 text-bg-primary text-white ">
    <div class="container col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <div class="p-3 d-flex justify-content-center align-items-center">
            <ul class="nav">
                <h4 id="headingId">Timetable</h4>
            </ul>
        </div>
</header>

<div class="container mx-auto mt-4 col-sm-10 col-md-10 col-lg-10 col-xl-10">
    <div class="wrapper rounded">
        <form id="timetable" method="post" action="{{ route('admin.filter') }}">
            @csrf
            <div class="container text-center mt-4">
                <div class="row">
                    <div class="col">
                        <select name="D_name" class="form-select" aria-label="Default select example">
                            <option value="" disabled selected>Select Department</option>
                            @foreach ($Department as $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-5">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="Year" id="Year_1" value="1" checked>
                            <label class="btn btn-outline-primary" for="Year_1">Year 1</label>

                            <input type="radio" class="btn-check" name="Year" id="Year_2" value="2">
                            <label class="btn btn-outline-primary" for="Year_2">Year 2</label>

                            <input type="radio" class="btn-check" name="Year" id="Year_3" value="3">
                            <label class="btn btn-outline-primary" for="Year_3">Year 3</label>

                            <input type="radio" class="btn-check" name="Year" id="Year_4" value="4">
                            <label class="btn btn-outline-primary" for="Year_4">Year 4</label>

                        </div>
                    </div>
                    <div class="col">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">

                            <input type="radio" class="btn-check" name="semester" id="semester_1" value="1" checked>
                            <label class="btn btn-outline-primary" for="semester_1">semester 1</label>

                            <input type="radio" class="btn-check" name="semester" id="semester_2" value="2">
                            <label class="btn btn-outline-primary" for="semester_2">semester 2</label>

                        </div>
                    </div>

                    <div class="mx-auto mt-5 mb-5 col-sm-10 col-md-10 col-lg-8 col-xl-8">
                        <div class="sidebar">
                            <button class="btn btn-primary w-100 menu" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script>
    $(document).ready(function() {
        // Attach click event listener to 'a' tags in the sidebar using event delegation
        $('.sidebar').on('click', 'button.menu', function(e) {
            e.preventDefault(); // Prevent the default link behavior

            // Get the href attribute of the clicked 'a' tag
            $form = $('#timetable');
            var url = $form.attr('action');
            console.log(url);

            // Make an AJAX request to retrieve the view content
            $.ajax({
                url: url,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Replace the content of the 'content-wrapper' div with the retrieved view
                    $('#content-wrapper').html(response);
                },
                // error: function() {
                //     alert('Error occurred while loading the view.');
                // }
            });
        });
    });
</script> -->