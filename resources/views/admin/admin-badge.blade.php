<header class="p-2 text-bg-primary text-white ">
    <div class="container col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <div class="p-3 d-flex justify-content-center align-items-center">
            <ul class="nav">
                <h4>Badge Registration</h4>
            </ul>
        </div>
</header>

<div class="container mx-auto mt-4 col-sm-10 col-md-10 col-lg-10 col-xl-10">
    <div class="wrapper rounded">
        <form method="post" action="{{route('Badge.save')}}">
            @csrf
            <div class="row">
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>Badge Code</label>
                    <input type="text" class="form-control" name="Badge_C" autofocus required>
                </div>
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>Badge Name</label>
                    <input type="text" class="form-control" name="Badge_N" required>
                </div>
            </div>

            <div class="mx-auto mt-5 mb-5 col-sm-10 col-md-10 col-lg-8 col-xl-8">
                <button class="btn btn-primary w-100" type="submit">Submit</button>
            </div>
        </form>

    </div>

</div>