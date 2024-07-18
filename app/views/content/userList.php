<link rel="stylesheet" href="./app/static/css/userList.css">
<script src="./app/controllers/routing.js"></script>
<div ng-app="routingApp">
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
            <tbody ng-repeat="user in data">
                <tr ng-repeat="us in user">
                    <td><p>{{ us.id }}</p></td>
                    <td><p>{{us.name}}</p></td>
                    <td><p>{{us.email}}</p></td>
                    <td><p>{{us.pet}}</p></td>
                    <td><a href="#!/Update/{{us.id}}" ng-click="goToUpdate(us.id)"><p><img width="24" height="24" src="https://img.icons8.com/fluency/48/available-updates.png" alt="available-updates"/></p></a></td>
                    <td><button ng-click="deleteItem(us.id)"><p><img width="24" height="24" src="https://img.icons8.com/color/24/delete-forever.png" alt="delete-forever"/></p></button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>