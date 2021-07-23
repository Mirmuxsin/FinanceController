@extends('layouts.sidebar')

@section('content')

<h2 class="mb-4">Edit Record</h2>

<form class="needs-validation" novalidate action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validationCustom01">Name of Category</label>
            <input type="text" class="form-control" id="validationCustom01" placeholder="Food" name="name" required value="{{ $category->name }}">
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Complete this!
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationFormGroup">Type of Category</label>
            <div class="form-group">
                <select class="custom-select" required name="type">
                    <option {{ $category->type == 'Incomes' ? 'selected' : '' }} value="Incomes">Incomes</option>
                    <option {{ $category->type == 'Incomes' ? 'selected' : '' }} value="Expenses">Expenses</option>
                </select>
                <div class="invalid-feedback">Select one of these!</div>
            </div>
        </div>
    </div>

    <button class="btn btn-primary" type="submit">Update</button>
</form>



<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>


@endsection
