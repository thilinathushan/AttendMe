<header class="p-2 text-bg-primary text-white ">
    <div class="container col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <div class="p-3 d-flex justify-content-center align-items-center">
            <ul class="nav">
                <h4>Edit Module</h4>
            </ul>
        </div>
</header>


<div class="container mx-auto mt-4 col-sm-10 col-md-10 col-lg-10 col-xl-10">
    <div class="wrapper rounded">
        <form method="post" action="{{route('module.update',$module->id)}}">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>Module Code</label>
                    <input type="text" class="form-control" name="Module_C" value="{{$module->ModuleCode}}" required>
                </div>
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>Module Name</label>
                    <input type="text" class="form-control" name="Module_N" value="{{$module->ModuleName}}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>Year</label>
                    <div class="d-flex align-items-center mt-2">
                        <div class="mx-2 form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="year" value="1" {{ $module->Year === '1' ? 'checked' : '' }}>1
                            <label class="form-check-label" for="radio1"></label>
                        </div>
                        <div class="mx-2 form-check">
                            <input type="radio" class="form-check-input" id="radio2" name="year" value="2" {{ $module->Year === '2' ? 'checked' : '' }}>2
                            <label class="form-check-label" for="radio2"></label>
                        </div>
                        <div class="mx-2 form-check">
                            <input type="radio" class="form-check-input" id="radio3" name="year" value="3" {{ $module->Year === '3' ? 'checked' : '' }}>3
                            <label class="form-check-label" for="radio3"></label>
                        </div>
                        <div class="mx-2 form-check">
                            <input type="radio" class="form-check-input" id="radio4" name="year" value="4" {{ $module->Year === '4' ? 'checked' : '' }}>4
                            <label class="form-check-label" for="radio4"></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-md-3 mt-lg-3 mt-3">
                    <label>Semester</label>
                    <div class="d-flex align-items-center mt-2">
                        <div class="mx-2 form-check">
                            <input type="radio" class="form-check-input" id="radio5" name="semester" value="1" {{ $module->Semester === '1' ? 'checked' : '' }}>1
                            <label class="form-check-label" for="radio5"></label>
                        </div>
                        <div class="mx-2 form-check">
                            <input type="radio" class="form-check-input" id="radio6" name="semester" value="2" {{ $module->Semester === '2' ? 'checked' : '' }}>2
                            <label class="form-check-label" for="radio6"></label>
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