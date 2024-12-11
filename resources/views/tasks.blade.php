@extends('includes.layout')
@section('content')
    <!-- Main Content -->
    <section>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">To Do App</h4>
                    <form class="d-flex">
                        <input type="text" id="taskInput" class="form-control me-2" placeholder="Enter a task here">
                        <button type="button" id="saveTask" class="btn btn-primary me-2">Save</button>
                        <button type="button" id="getTasks" class="btn btn-warning">Get Tasks</button>
                    </form>

                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Todo Item</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="taskList">
                            <tr>
                                <th>1</th>
                                <td>Buy groceries for next week</td>
                                <td>In progress</td>
                                <td>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                    <button class="btn btn-success btn-sm ms-1">Finished</button>
                                </td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>Renew car insurance</td>
                                <td>In progress</td>
                                <td>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                    <button class="btn btn-success btn-sm ms-1">Finished</button>
                                </td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>Sign up for online course</td>
                                <td>In progress</td>
                                <td>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                    <button class="btn btn-success btn-sm ms-1">Finished</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

   @endsection
