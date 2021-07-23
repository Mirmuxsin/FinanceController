@extends('layouts.sidebar')

@section('content')

<h2 class="mb-4">Categories</h2>

<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true"
        aria-controls="collapseExample">
    <i class="fa fa-plus" aria-hidden="true"></i>
    add</button>
<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample2"
        aria-expanded="false" aria-controls="collapseExample2">
    <i class="fa fa-list" aria-hidden="true"></i>
    list</button>

<div class="card-body">
    <div class="collapse" id="collapseExample">
        <form class="needs-validation" novalidate action="{{ url('categories') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Name of Category</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Food" name="name" required>
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
                            <option disabled selected value="">Select</option>
                            <option value="Incomes">Incomes</option>
                            <option value="Expenses">Expenses</option>
                        </select>
                        <div class="invalid-feedback">Select one of these!</div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
</div>

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

<div class="collapse show" id="collapseExample2">
    <div class="card-body">
        <table class="table col-md-8 table-bordered">
            <thead style="background-color: #866ec7; color: white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                @if ($category->type == 'Incomes')
                    <tr class="table-success">
                @elseif ($category->type == 'Expenses')
                    <tr class="table-danger">
                        @endif
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->type }}</td>
                        <td>
                            <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                                <div class="btn-group" role="group">
                                    <a class="btn btn-outline-info view" href="{{ route('categories.show',$category->id) }}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-outline-success edit" href="{{ route('categories.edit',$category->id) }}"><i class="fa fa-pencil"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>

        @if (isset($categories))
            {{$categories->links()}}
        @endif
    </div>
</div>
@endsection
