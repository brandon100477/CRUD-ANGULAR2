<link rel="stylesheet" href="./app/static/css/userNew.css">
<script src="./app/controllers/routing.js"></script>
<br><br>
<div ng-app="registerAngular">
    <div class="container" ng-controller="registerController">
      <div class="heading">Register more users</div>
      <form class="form" ng-submit="submitForm()">
        <div class="input-field" ng-class="{ 'error': !name.length }">
          <input
            required=""
            autocomplete="off"
            type="text"
            name="text"
            id="username"
            ng-model="name"
          />
          <label for="username">Name</label>
          <br>
          <span class="span" ng-show="!name.length">Por favor ingresar tu nombre.</span>
    
        </div>
        <div class="input-field" ng-class="{ 'error': !email.length }">
          <input
            required=""
            autocomplete="off"
            type="email"
            name="email"
            id="email"
            ng-model="email"
          />
          <label for="email">Email</label>
          <br>
          <span ng-show="!email.length">Por favor ingresar tu correo electronico.</span>
        </div>
        <div class="input-field" ng-class="{ 'error': !pass.length }">
          <input
            required=""
            autocomplete="off"
            type="password"
            name="text"
            id="password"
            ng-model="pass"
          />
          <label for="username">Password</label>
          <br>
          <span ng-show="!pass.length">Por favor ingresar tu contraseña.</span> 
        </div>
        <div class="input-field" ng-class="{ 'error': !pass2.length || pass2 !== pass }">
          <input
            required=""
            autocomplete="off"
            type="password"
            name="text"
            id="password"
            ng-model="pass2"
          />
          <label for="username">Confirm password</label>
          <br>
          <span ng-show="!pass2.length">Por favor confirmar la contraseña.</span>
          <span ng-show="pass2.length && pass2 !== pass">Lo siento, las contraseñas no coinciden.</span>
        </div>
        <div class="user-box" ng-class="{ 'error': !pet.length }">
                <select name="pet" ng-model="pet" id="pet">
                    <option value="">Seleccine una mascota</option>
                    <option value="Gato">Gato</option>
                    <option value="Perro">Perro</option>
                    <option value="Loro">Loro</option>
                    <option value="Pez">Pez</option>
                </select><br>
                <span ng-show="!pet.length">Seleccione el tipo de mascota que tienes.</span>
            </div><br>
        <div class="btn-container">
          <button type="submit" name="registro" class="btn">Submit</button>
        </div>
      </form>
    </div>
</div>