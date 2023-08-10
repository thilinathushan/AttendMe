<form method="post" action="{{ route('admin.update',Auth::user()->id) }}" class="mt-6 space-y-6">
    @csrf
    @method('put')

    <div class="row">
        <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
            <label>First Name</label>
            <input name="fname" type="text" class="form-control" value="{{ Auth::user()->first_name }}" required>
            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>
        <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
            <label>Last Name</label>
            <input name="lname" type="text" class="form-control" value="{{ Auth::user()->last_name }}" required>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
            <label>Birthday</label>
            <input name="bday" type="date" class="form-control" value="{{ Auth::user()->birthday }}" required>
        </div>
        <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
            <label>Username</label>
            <input name="username" type="text" class="form-control" value="{{ Auth::user()->username }}" required>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
            <label>Email</label>
            <div class="input-group">
                <input name="email" type="email" id="email" value="{{ Auth::user()->email }}" class="form-control" placeholder="Lecturer's username" aria-label="Student's username" aria-describedby="basic-addon2">
                <span class="input-group-text" id="basic-addon2">@fot.sjp.ac.lk</span>
            </div>
        </div>
        <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
            <label>Phone Number</label>
            <input name="telNum" type="tel" class="form-control" value="{{ Auth::user()->phone_number }}" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
            <label>Gender</label>
            <div class="d-flex align-items-center mt-2">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio1" name="gender" value="Male" {{ Auth::user()->gender === 'Male' ? 'checked' : '' }}>Male
                    <label class="form-check-label" for="radio1"></label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="radio2" name="gender" value="Female" {{ Auth::user()->gender === 'Female' ? 'checked' : '' }}>Female
                    <label class="form-check-label" for="radio2"></label>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto mt-5 mb-5 col-sm-10 col-md-10 col-lg-8 col-xl-8">
        <button class="btn btn-primary w-100" type="submit">Submit</button>
    </div>
</form>