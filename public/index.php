<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="display-4 text-center">Sql to QueryBuilder</h1>
                </div>

                <div class="form-group">
                    <label for="sql"><strong>SQL</strong></label>
                    <textarea class="form-control" id="sql" rows="5"></textarea>
                </div>

                <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>

                <hr>

                <div class="form-group">
                    <label for="queryBuilder"><strong>Query Builder</strong></label>
                    <textarea readonly class="form-control" id="queryBuilder" rows="5"></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/popper.min.js/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>