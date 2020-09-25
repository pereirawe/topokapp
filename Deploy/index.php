<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codetomika Auto Deployment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css" >

</head>
<body class="bg-dark">

    <div class="container" ng-app="DeployApp" ng-controller="DeployController as Deploy">
        <div class="row">
            <div class="col-12">
                <h1 class="text-light pt-3 pb-3">Codetomika Auto Deployment</h1>
            </div>
            <div class="col-12 mb-3">
                <button class="ml-2 btn btn-danger float-right" type="submit" ng-click="getDeployForceRespond()" >
                    Force Pull
                </button>
                <button class="ml-2 btn btn-success float-right" type="submit" ng-click="getDeployRespond()" >
                    Pull
                </button>
                <button class="ml-2 btn btn-warning float-right" type="submit" ng-click="getStatusRespond()" >
                    Status
                </button>
            </div>
            <div class="col-12" >
                <div id="result"  class="bg-secondary p-3" ng-show="content">
                    <pre  class="text-white"><ul><li ng-repeat="(key, value) in content"  ><b ng-bind="key | capitalize"></b>: <span ng-bind="value"></span></li></ul></pre>
                </div>

                
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8ae5e4e13d.js" crossorigin="anonymous"></script>
    <script src="../node_modules/angular/angular.min.js"></script>
    <script src="app.js"></script>
</body>
</html>
