<header class="p-2 text-bg-primary text-white ">
    <div class="container col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <div class="p-3 d-flex justify-content-center align-items-center">
            <ul class="nav">
                <h4>Lecturer Details</h4>
            </ul>
        </div>
</header>

<div class="container mx-auto mt-4 col-sm-12 col-md-12 col-lg-12 col-xl-12">

    <div class="wrapper rounded">
        <form id="formLecManage" method="get">
            @csrf
            <div class="table-responsive">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>BirthDay</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Department</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Update At</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($lecturer)>0)
                        @foreach ($lecturer as $post)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" name="selectedItem[{{$post->id}}]" value="{{$post->id}}" id="">
                            </td>
                            <td>{{$post->id}}</td>
                            <td>{{$post->first_name}}</td>
                            <td>{{$post->last_name}}</td>
                            <td>{{$post->birthday}}</td>
                            <td>{{$post->username}}</td>
                            <td>{{$post->email}}</td>
                            <td>{{$post->phone_number}}</td>
                            <td>{{$post->department}}</td>
                            <td>{{$post->gender}}</td>
                            <td><a class="btn btn-warning" href="{{ route('status.lecturer',$post->id) }}" role="button">{{$post->status}}</a></td>
                            <td>{{$post->updated_at}}</td>
                            <td>
                                <div class="sidebar">
                                    <a class="btn btn-primary menu my-2" href="{{ route('lecturer.edit', $post->id) }}" role="button">Edit</a>
                                </div>
                                <a class="btn btn-danger menu" href="{{route( 'lecturer.delete', $post->id)}}" role="button">Delete</a>

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
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>BirthDay</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Department</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Update At</th>
                            <th>action</th>
                        </tr>
                    </tfoot>

                </table>
            </div>
            <button id="activeAllBtn" name="action" value="activeAll" type="submit" class="btn btn-primary mx-2 mt-4">Active All</button>
            <button id="inactiveAllBtn" name="action" value="inactiveAll" type="submit" class="btn btn-warning text-white mx-2 mt-4">Inactive All</button>
            <button id="deleteAllBtn" name="action" value="deleteAll" type="submit" class="btn btn-danger mx-2 mt-4">Delete All</button>
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

<script>
    $(document).ready(function() {
        // Event listener for button click
        $('#activeAllBtn, #inactiveAllBtn, #deleteAllBtn').click(function() {
            var action = '';

            // Determine the action based on the button clicked
            if (this.id === 'activeAllBtn') {
                action = "{{ route('lecturer.allactive') }}";
            } else if (this.id === 'inactiveAllBtn') {
                action = "{{ route('lecturer.allinactive') }}";
            } else if (this.id === 'deleteAllBtn') {
                action = "{{ route('lecturer.alldelete') }}";
            }

            // Set the form action dynamically
            $('#formLecManage').attr('action', action);
        });
    });
</script>