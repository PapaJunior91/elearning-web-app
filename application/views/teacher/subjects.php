<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>My Subjects</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.4.5.2.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.13.1/datatables.min.css"/>
    
  </head>

  <body>

    <div class="container-fluid">
      <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

          <!--Create Subject Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Subject Name">
                      <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>                    
                  </form>
                  </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Subjects</li>
              </ol>
            </nav>
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Create Subject</button>
          </div>
          
          <div class="row mb-2">
            <table id="subjects">
              <thead>
                <tr>
                  <th>Subject ID</th>
                  <th>Name</th>
                  <th>Edit</th>
                  <th>Del</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach($mysubjects as $mysubject):
                ?>
                <tr>
                  <td><?php echo $mysubject->subject_id?> </td>
                  <td><?php echo $mysubject->subject_name?></td>
                  <td><button type="submit" class="btn btn-primary" href=""><span data-feather="edit-2"></span> Edit</button></td>
                  <td><button type="submit" class="btn btn-danger" href=""><span data-feather="trash-2"></span> Del</button></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dashboard.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.13.1/datatables.min.js"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
      window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/vendor/jquery.slim.min.js"><\/script>');

      $(document).ready( function () {
          $('#subjects').DataTable();
      } );

      $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
      })

    </script>
  </body>
</html>
