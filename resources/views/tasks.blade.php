<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>
<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-7">
              <div class="card rounded-3">
                <div class="card-body p-4">
      <br>
                  <h4 class="text-center my-3 pb-3">To Do App</h4>
      
                  <form class="d-flex justify-content-between align-items-center mb-4 pb-2">
                    <input
                      type="text"
                      id="taskInput"
                      class="form-control me-3"
                      placeholder="Enter a task here"
                    />
                    <button type="button" id="saveTask" class="btn btn-primary me-2">Save</button>
                    <button type="button" id="getTasks" class="btn btn-warning">Get Tasks</button>
                  </form>
      
                  <table class="table mb-4">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Todo Item</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody id="taskList">
                      <tr>
                        <th scope="row">1</th>
                        <td>Buy groceries for next week</td>
                        <td>In progress</td>
                        <td>
                          <button class="btn btn-danger btn-sm">Delete</button>
                          <button class="btn btn-success btn-sm ms-1">Finished</button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Renew car insurance</td>
                        <td>In progress</td>
                        <td>
                          <button class="btn btn-danger btn-sm">Delete</button>
                          <button class="btn btn-success btn-sm ms-1">Finished</button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
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
          </div>
        </div>
      </section>
      
</body>
</html>