<?php require_once(ROOT . '/views/layouts/header.php') ?>
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-md-offset-3">
                <?php if($result): ?>
                    <p>Вы зарегестрированы</p>
                <?php else: ?>
                    <?php if(isset($errors) && is_array($errors)): ?>
                        <ul>

                            <?php foreach ($errors as $error):?>
                                <li> <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <form method="post" action="/send">
                        <div class="form-group">
                            <label for="name">Имя:</label>
                            <p><?php if(isset($errors['name'])) echo $errors['name']; ?></p>
                            <input name ="name" type="name" class="form-control" id="name" placeholer="Введите имя">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <p><?php if(isset($errors['email'])) echo $errors['email']; ?></p>
                            <input name="email" type="email" class="form-control" id="email" placeholer="Введите электронную почту">
                        </div>
                        <div class="form-group">
                            <label for="message">Сообщения:</label>
                            <p><?php if(isset($errors['message'])) echo $errors['message']; ?></p>
                            <textarea name="message" class="form-control" id="message" placeholer="Message">
                                      </textarea>
                        </div>
                        <div class="checkbox">
                        </div>
                        <button id="submit" type="submit" class="btn btn-success btn-block">Отправить сообщения</button>
                    </form>
                <?php endif; ?>
            </div>

        </div>
    </div

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <br>
                <h3>Последние сообщения:</h3>
                <div class="alert alert-success" id="alert" hidden="true">
                    <strong>Красава!</strong> Ты успешно <a href="#" class="alert-link">добавил сообщения</a>.
                </div>
                <hr>
            </div><!-- /col-sm-12 -->
        </div><!-- /row -->
        <div class="row">



            <?php foreach($guestbookList as $guestbookItem): ?>
                <div class="col-md-8 col-md-offset-3">
                    <div class="col-sm-1">
                        <div class="thumbnail">
                            <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                        </div><!-- /thumbnail -->
                    </div><!-- /col-sm-1 -->

                    <div class="col-sm-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong><?php echo $guestbookItem['name'] ?></strong> <span class="text-muted"><?php echo $guestbookItem['datetime'] ?></span>
                            </div>
                            <div class="panel-body">
                                <?php echo $guestbookItem['message'] ?>
                            </div><!-- /panel-body -->
                        </div><!-- /panel panel-default -->
                    </div><!-- /col-sm-5 -->
                </div>
            <?php endforeach;?>
        </div><!-- /row -->

    </div><!-- /container -->

<?php require_once(ROOT . '/views/layouts/footer.html') ?>