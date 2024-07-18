<link rel="stylesheet" href="./app/static/css/update.css">
<script src="./app/controllers/routing.js"></script>
    <div ng-app="routingApp">
        <div ng-controller="preUpdateController">
        <h1 class="tittle-update">Actualiza a {{user[0][0].name}}</h1>
            <form class="update-form" method="POST" ng-submit="submitForm()">
                <div class="main-container">
                    <div class="firts-block">
                        <input type="hidden" >
                        <div class="container"ng-model="user[0][0].id" name="id">
                            <input required="" type="text" ng-model="user[0][0].name" name="name" class="input">
                            <label class="label">Name</label>
                        </div>
                        <div class="container">
                            <input required="" type="email" name="email" ng-model="user[0][0].email" class="input">
                            <label class="label">Email</label>
                        </div>
                        <div class="user-box" ng-model="user[0][0].pet">
                            <p class="aux">Actualice la mascota</p>
                            <select name="pet" id="pet" ng-model="user[0][0].pet">
                                <option value="user[0][0].pet">{{user[0][0].pet}}</option>
                                <option value="Gato">Gato</option>
                                <option value="Perro">Perro</option>
                                <option value="Loro">Loro</option>
                                <option value="Pez">Pez</option>
                            </select><br>
                        </div><br>
                    </div>
                </div>
                <br><br><br>
                <div class="container-button">
                    <button class="button-update" type="submit">Update</button>
                </div>
            </form>
        </div>

    </div>