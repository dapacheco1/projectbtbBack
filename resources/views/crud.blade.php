<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <title>CRUD Users</title>
</head>
<body>
    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add User
</button>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register user form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form >
            <!--Username-->
            <div class="col-xl-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" required>
            </div>
            <!--Password-->
            <div class="col-xl-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" required>
            </div>
            <!--Rol-->
            <div class="col-xl-4">
                <label for="rol" class="form-label">Rol:</label>
                <select class="form-select" name="rol" id="cmbRol" required>
                    <option value="">---</option>
                    <option value="administrator">Administrator</option>
                    <option value="guest">Guest</option>
                </select>
            </div>
            <!--Email-->
            <div class="col-xl-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email">
            </div>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submitData" data-bs-dismiss="modal">Save User</button>
      </div>
    </div>
  </div>
</div>
<table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Rol</th>
            <th scope="col">Edit User</th>
          </tr>
        </thead>
        <tbody class="body">
        </tbody>
      </table>
      <!--MODALS -->

  
  <!-- Modal -->
  <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="lblEdit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lblEdit">Edit user data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        
                        <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="usernameEd">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="emailEd">
                        </div>
                        <div class="mb-3">
                            <label for="rol" class="form-label">Rol</label>
                            <select name="rol" id="rolEd" class="form-select">
                                <option value="">---</option>
                                <option value="administrator">administrator</option>
                                <option value="guest">guest</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updateBtn" data-bs-dismiss="modal">Save changes</button>
                </div>
            </div>
        </div>
  </div>

 
    <div class="modal fade" id="see"  aria-labelledby="lblSee" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="lblSee">More data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    
                    <div class="mb-3">
                      <label for="username1" class="form-label">Username</label>
                      <input type="text" class="form-control" id="username1" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="password1" class="form-label">Password</label>
                        <input type="text" class="form-control" id="password1" disabled>
                      </div>
                    <div class="mb-3">
                        <label for="email1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email1" disabled>
                      </div>
                      <div class="mb-3">
                        <label for="rol1" class="form-label">Rol</label>
                        <select name="rol" id="rol1" class="form-select" disabled>
                            <option value="">---</option>
                            <option value="administrator">administrator</option>
                            <option value="guest">guest</option>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select" disabled>
                            <option value="">---</option>
                            <option value="A">Active</option>
                            <option value="I">Inactive</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="created" class="form-label">Created at</label>
                        <input type="text" class="form-control" id="created" disabled>
                      </div>
                      <div class="mb-3">
                        <label for="udpated" class="form-label">Updated at</label>
                        <input type="text" class="form-control" id="updated" disabled>
                      </div>
                  </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>
    
    <script type="module" src="{{asset('../js/renderTable.js') }}"></script>
    <script type="module" src="{{asset('../js/sentData.js') }}"></script>
    <script type="module" src="{{asset('../js/getData.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>