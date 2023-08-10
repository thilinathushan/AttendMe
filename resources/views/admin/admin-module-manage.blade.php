<header class="p-2 text-bg-primary text-white ">
    <div class="container col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <div class="p-3 d-flex justify-content-center align-items-center">
            <ul class="nav">
                <h4>Manage Module</h4>
            </ul>
        </div>
</header>

<div class="container mx-auto mt-4 col-sm-12 col-md-12 col-lg-12 col-xl-12">

    <div class="wrapper rounded">
        <form method="get" action="{{ route('module.alldelete') }}">
            @csrf
            <div class="table-responsive">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>#</th>
                            <th>Module Code</th>
                            <th>Module Name</th>
                            <th>Year</th>
                            <th>Semester</th>
                            <th>Department</th>
                            <th>Update At</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($module)>0)
                        @foreach ($module as $post)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" name="selectedItem[{{$post->id}}]" value="{{$post->id}}" id="">
                            </td>
                            <td>{{$post->id}}</td>
                            <td>{{$post->ModuleCode}}</td>
                            <td>{{$post->ModuleName}}</td>
                            <td>{{$post->Year}}</td>
                            <td>{{$post->Semester}}</td>
                            <td>{{$post->Department}}</td>
                            <td>{{$post->updated_at}}</td>
                            <td>
                                <div class="sidebar"><a class="btn btn-primary menu my-2" href="{{route( 'module.edit', $post->id)}}" role="button">Edit</a></div>
                                <a class="btn btn-danger" href="{{route( 'module.delete', $post->id)}}" role="button">Delete</a>
                            </td>

                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="3">user not fund</td>
                        </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Select</th>
                            <th>#</th>
                            <th>Module Code</th>
                            <th>Module Name</th>
                            <th>Year</th>
                            <th>Semester</th>
                            <th>Department</th>
                            <th>Update At</th>
                            <th>action</th>
                        </tr>
                    </tfoot>

                </table>
            </div>
            <button type="submit" class="btn btn-danger mx-2 mt-4">Delete All</button>
        </form>
    </div>

    <script>
        $('#example').DataTable();
    </script>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Attach click event listener to 'a' tags in the sidebar using event delegation
        $('.sidebar').on('click', 'a.menu', function(e) {
            e.preventDefault(); // Prevent the default link behavior

            // Get the href attribute of the clicked 'a' tag
            var url = $(this).attr('href');

            // Make an AJAX request to retrieve the view content
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    // Replace the content of the 'content-wrapper' div with the retrieved view
                    $('#content-wrapper').html(response);
                },
                error: function() {
                    alert('Error occurred while loading the view.');
                }
            });
        });
    });
</script>