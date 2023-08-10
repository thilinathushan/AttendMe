<header class="p-2 text-bg-primary text-white ">
    <div class="container col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <div class="p-3 d-flex justify-content-center align-items-center">
            <ul class="nav">
                <h4>Connections Registration</h4>
            </ul>
        </div>
</header>

<div class="container mx-auto mt-4 col-sm-10 col-md-10 col-lg-10 col-xl-10">
    <div class="wrapper rounded">
        <form method="post" action="{{route('add.connections')}}">
            @csrf

            <div class="row">
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>Department</label>
                    <select id="deptId" name="D_name" class="form-select" aria-label="Default select example">
                        <option value="" disabled selected>Select Department</option>
                        @foreach ($Department as $value)
                        <option value="{{ $value->id }}">{{ $value->DepartmentName }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>Module Name</label>

                    <select name="M_name" class="form-select" aria-label="Default select example">
                        <option value="" disabled selected>Select Module</option>
                        @foreach ($Module as $value)
                        <option value="{{ $value->ModuleName }}">{{ $value->ModuleName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>Lecturer</label>
                    <select name="L_name" class="form-select" aria-label="Default select example">
                        <option value="" disabled selected>Select lecturer</option>
                        @foreach ($lecturer as $value)
                        <option value="{{ $value->id }}">{{ $value->first_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mx-auto mt-5 mb-5 col-sm-10 col-md-10 col-lg-8 col-xl-8">
                <button class="btn btn-primary w-100" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

</div>