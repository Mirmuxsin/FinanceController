@extends('layouts.sidebar')

@section('content')

<h2 class="mb-4">Records</h2>

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
        <form class="needs-validation" novalidate action="{{ __('records') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationFormGroup">Type of Record</label>
                    <div class="form-group">
                        <select class="custom-select" required name="type">
                            <option disabled selected value="">Select</option>
                            <option value="Incomes">Incomes</option>
                            <option value="Expenses">Expenses</option>
                        </select>
                        <div class="invalid-feedback">Select one of these!</div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationFormGroup">Type of Category</label>
                    <div class="form-group">
                        <select class="custom-select" required name="category">
                            <option disabled selected value="">Select</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->name }}">{{$category->type}} - {{$category->name}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Select one of these!</div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Amount</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="validationCustom01" placeholder="150"
                            name="amount" required aria-describedby="basic-addon1">
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
                    placeholder="Comment"></textarea>
            </div>

            <div class="form-group">
                <!-- Date input -->
                <label class="control-label" for="date">Date</label>
                <input class="form-control" id="date" name="date" type="text" value="{{ date('Y-m-d') }}"/>
            </div>



            <button class="btn btn-primary" type="submit">Create</button>
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

    </div>
</div>

<div class="collapse show" id="collapseExample2">
    <div class="card-body">
        <table class="table col-md-12 table-bordered">
            <thead style="background-color: #866ec7; color: white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Type</th>
                    <th scope="col">Category</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($records as $record)
                @if ($record->type == 'Incomes')
                    <tr class="table-success">
                @elseif ($record->type == 'Expenses')
                    <tr class="table-danger">
                @endif
                        <th scope="row">{{ $record->id }}</th>
                        <td>{{ $record->type }}</td>
                        <td>{{ $record->category }}</td>
                        <td>{{ $record->amount }}</td>
                        <td>{{ $record->comment }}</td>
                        <td>{{ $record->date }}</td>
                        <td>
                            <form action="{{ route('records.destroy',$record->id) }}" method="POST">
                                <div class="btn-group" role="group">
                                    <a class="btn btn-outline-info view" href="{{ route('records.show',$record->id) }}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-outline-success edit" href="{{ route('records.edit',$record->id) }}"><i class="fa fa-pencil"></i></a>
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

        @if (isset($records))
            {{$records->links()}}
        @endif
    </div>
</div>

@endsection
