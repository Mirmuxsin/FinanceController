@extends('layouts.sidebar')

@section('content')

<h2 class="mb-4">Edit Record</h2>

<form class="needs-validation" novalidate action="{{ route('records.update', $record->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validationFormGroup">Type of Record</label>
            <div class="form-group">
                <select class="custom-select" required name="type">
                    <option {{ $record->type == 'Incomes' ? 'selected' : '' }} value="Incomes">Incomes</option>
                    <option {{ $record->type == 'Expenses' ? 'selected' : '' }} value="Expenses">Expenses</option>
                </select>
                <div class="invalid-feedback">Select one of these!</div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationFormGroup">Category</label>
            <div class="form-group">
                <select class="custom-select" required name="category">
                    @foreach ($categories as $category)
                        <option {{ $category->name == $record->category ? 'selected' : '' }} value="{{ $category->name }}">{{$category->type}} - {{$category->name}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Select one of these!</div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationCustom01">Amount</label>
            <div class="input-group">
                <input type="number" class="form-control" id="validationCustom01" placeholder="150"
                       name="amount" required aria-describedby="basic-addon1" value="{{ $record->amount }}">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">$</span>
                </div>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Complete this!
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Comment</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"
                  placeholder="Comment">{{ $record->comment }}</textarea>
    </div>

    <div class="form-group">
        <!-- Date input -->
        <label class="control-label" for="date">Date</label>
        <input class="form-control" id="date" name="date" type="text" value="{{ $record->date }}"/>
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
