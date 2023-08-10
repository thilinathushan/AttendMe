<header class="p-2 text-bg-primary text-white ">
    <div class="container col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <div class="p-3 d-flex justify-content-center align-items-center">
            <ul class="nav">
                <h4>Timetable Registration</h4>
            </ul>
        </div>
</header>

<div class="container mx-auto mt-4 col-sm-10 col-md-10 col-lg-10 col-xl-10">
    <div class="wrapper rounded">
        <form method="post" action="{{route('add.timetables')}}">
            @csrf

            <div class="row">
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>Department</label>
                    <select name="D_name" class="form-select" id="nameid" aria-label="Default select example">
                        <option value="" disabled selected>Select Department</option>
                        @foreach ($Department as $value)
                        <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>Year</label>
                    <div class="d-flex align-items-center mt-2">
                        <div class="mx-2 form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="Year" value="1" checked>1
                            <label class="form-check-label" for="radio1"></label>
                        </div>
                        <div class="mx-2 form-check">
                            <input type="radio" class="form-check-input" id="radio2" name="Year" value="2">2
                            <label class="form-check-label" for="radio2"></label>
                        </div>
                        <div class="mx-2 form-check">
                            <input type="radio" class="form-check-input" id="radio3" name="Year" value="3">3
                            <label class="form-check-label" for="radio3"></label>
                        </div>
                        <div class="mx-2 form-check">
                            <input type="radio" class="form-check-input" id="radio4" name="Year" value="4">4
                            <label class="form-check-label" for="radio4"></label>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>Semester</label>
                    <div class="d-flex align-items-center mt-2">
                        <div class="mx-2 form-check">
                            <input type="radio" class="form-check-input" id="radio5" name="Semester" value="1" checked>1
                            <label class="form-check-label" for="radio5"></label>
                        </div>
                        <div class="mx-2 form-check">
                            <input type="radio" class="form-check-input" id="radio6" name="Semester" value="2">2
                            <label class="form-check-label" for="radio6"></label>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>Module Name</label>

                    <select name="M_name" class="form-select" aria-label="Default select example" id="user">
                        <option value="" disabled selected>Select Module</option>
                        @foreach ($Module as $value)
                        <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>Day</label>
                    <select class="form-select" name="day" aria-label="Default select example">
                        <option selected>Select day</option>
                        <option value="Monday">Monday </option>
                        <option value="Tuesday">Tuesday </option>
                        <option value="Wednesday">Wednesday </option>
                        <option value="Thursday">Thursday </option>
                        <option value="Friday">Friday </option>
                        <option value="Saturday">Saturday </option>
                        <option value="Sunday">Sunday </option>
                    </select>
                </div>
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <div class="row">
                        <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                            <label>Start time </label>
                            <input type="text" class="form-control" name="S_time" placeholder="00.00 AM:PM" required>
                        </div>

                        <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                            <label>End time </label>
                            <input type="text" class="form-control" name="E_time" placeholder="00.00 AM:PM" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mx-auto mt-5 mb-5 col-sm-10 col-md-10 col-lg-8 col-xl-8">
                <button class="btn btn-primary w-100" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

</div>