<form action="/admin/add_user" method="post">
  <fieldset>
    <legend>Информация о пользователе</legend>
      <label for="name">Имя</label>
      <input type="text" name="name"><br>
      
      <label for="surname">Фамилия</label>
      <input type="text" name="surname"><br>
      
      <label for="otchestvo">Отчество</label>
      <input type="text" name="otchestvo"><br>
      
      <label for="DOB">Дата рождения</label>
      <input type="date" name="DOB"><br>

      <label for="department">Подразделение</label>
        <select name="department_id">
            <option value="">Выберите подразделение</option>
            <?php foreach ($registry->get('departments') as $department) : ?>
                <option value="<?= $department['id'] ?>"><?= $department['text'] ?></option>
            <?php endforeach; ?>
        </select><br>	
      <label for="profession">Профессия</label>
        <select name="profession_id">
            <option value="">Выберите профессию</option>  
            <?php foreach ($registry->get('professions') as $profession) : ?>
                <option value="<?= $profession['id'] ?>"><?= $profession['text'] ?></option>
            <?php endforeach; ?>
        </select><br>
      <label for="role">Роль</label>
        <select name="role_id">
            <option value="">Выберите роль</option>
            <?php foreach ($registry->get('roles') as $role) : ?>
                <option value="<?= $role['id'] ?>"><?= $role['text'] ?></option>
            <?php endforeach; ?>
        </select><br>
      <label for="login">Логин</label>
      <input type="text" name="login" ><br>
      <label for="password">Пароль</label>
      <input type="password" name="password"><br>
  </fieldset>
  <input type="submit" value="Добавить пользователя">
</form>

