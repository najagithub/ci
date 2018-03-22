<a href="<?= site_url() ?>/auth/logout" class="link">Log out</a>
</br>Vous ête connecte sur l'adresse mail <span class="text-info"><?= $user->email ?></span>
<?php if(isset($edit)): ?>
        <form class="form-signin" method="post" action="<?= current_url().'?id='.$_GET['id'] ?>">
            <h2 class="form-signin-heading">Modification</h2>
        <?php else : ?>
        <form class="form-signin" method="post" action="<?= current_url() ?>">
            <h2 class="form-signin-heading">Ajout</h2>
        <?php endif; ?>

        
        <label for="inputEmail" class="sr-only">Adresse E-mail</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" value="<?= isset($edit) ? $edit->email : set_value('name')?>" required>
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
        <?php if(isset($edit)): ?>
        <input name="edit" value="Modifier" class="btn btn-lg btn-primary btn-block" type="submit">
        <?php else : ?>
        <input name="add" value="Ajouter" class="btn btn-lg btn-primary btn-block" type="submit">
        <?php endif; ?>
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>e-mail</th>
            <th>password</th>
            <th>created_at</th>
        </tr>
    </thead>
    <tbody>
		<?php foreach ($list as $item) :?>
        <tr>
            <td><?= $item->id ?></td>
            <td><?= $item->email ?></td>
			<td><?= $item->password ?></td>
			<td><?= $item->created_at ?></td>
                        <td><a href="<?= current_url().'?id='.$item->id ?>" class="link">Edit</a></td>
                        <td><a href="<?= site_url().'/home/delete/'.$item->id ?>" class="link">Delete</a></td>
        </tr>
		<?php endforeach; ?>
    </tbody>
</table>