<link rel="stylesheet" href="./app/static/css/userList.css">
<script src="./app/controllers/routing.js"></script>
<div ng-app="registerAngular">
    <div class="container" ng-controller="listController">
        <table id="miTabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Pet</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="user in users">
                    <td>{{user.id}}</td>
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.pet}}</td>
                    <td><a href="#">Para actualizar</a></td>
                    <td><button>Delete</button></td>
                </tr>
                <!-- Aquí irán las filas de datos -->
            </tbody>
        </table>
    </div>
</div>