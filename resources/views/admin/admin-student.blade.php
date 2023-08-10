<header class="p-2 text-bg-primary text-white ">
    <div class="container col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <div class="p-3 d-flex justify-content-center align-items-center">
            <ul class="nav">
                <h4>Student Registration</h4>
            </ul>
        </div>
</header>

<div class="container mx-auto mt-4 col-sm-10 col-md-10 col-lg-10 col-xl-10">
    <div class="wrapper rounded">
        <form method="post" action="{{route('student.save')}}">
            @csrf
            <div class="row">
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>First Name</label>
                    <input name="fname" type="text" class="form-control" value="" autofocus required>
                </div>
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>Last Name</label>
                    <input name="lname" type="text" class="form-control" value="" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>Birthday</label>
                    <input name="bday" type="date" class="form-control" value="" required>
                </div>
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>Username</label>
                    <input name="username" type="text" class="form-control" value="" required>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>Email</label>
                    <div class="input-group">
                        <input name="StuEmail" type="email" value="" id="email" class="form-control" placeholder="Student's username" aria-label="Student's username" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2">@fot.sjp.ac.lk</span>
                    </div>
                </div>
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>Phone Number</label>
                    <input name="telNum" type="tel" class="form-control" value="" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>Badge</label>
                    <select name="StuBadge" class="form-select" aria-label="Default select example">
                        <option selected>Select Badge</option>
                        @foreach ($badge as $row)
                        <option value="{{ $row->id }}">{{ $row->BadgeName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>Department</label>
                    <select name="StuDepartment" class="form-select" aria-label="Default select example">
                        <option selected>Select Department</option>
                        @foreach ($dept as $row)
                        <option value="{{ $row->id }}">{{ $row->DepartmentName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>Gender</label>
                    <div class="d-flex align-items-center mt-2">
                        <div class="form-check">
                            <input name="gender" type="radio" class="form-check-input" id="radio1" name="optradio" value="Male">Male
                            <label class="form-check-label" for="radio1"></label>
                        </div>
                        <div class="form-check">
                            <input name="gender" type="radio" class="form-check-input" id="radio2" name="optradio" value="Female">Female
                            <label class="form-check-label" for="radio2"></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>Password</label><br>
                    <input name="password" type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck1">Default Username</label>
                </div>

            </div>
            <div class="mx-auto mt-5 mb-5 col-sm-10 col-md-10 col-lg-8 col-xl-8">
                <button class="btn btn-primary w-100" type="submit">Submit</button>
            </div>

        </form>
    </div>

</div>