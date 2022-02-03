<?php
include 'includes.php';
?>
<html>
    <head>
        <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <!-- Tu démarre en 12, dès que tu passe en (sm)all tu passe en 8
                dès que tu passe en (l)ar(g)e, tu passe en 6
                -->
                <div class="col-12 col-sm-8 col-lg-6">
                    <h1 class="text-center my-5">Combat de Pokemons</h1>

                    <!-- Affichage des erreurs -->
                    <?php if (isset($_SESSION['erreurs'])): ?>
                        <?php foreach ($_SESSION['erreurs'] as $erreur): ?>
                            <div class="alert alert-warning"><?= $erreur ?></div>
                        <?php endforeach; ?>

                        <?php
                        // Je vide le tableau de ce qu'il contient à l'index 'erreurs'
                        // Et je retire cet index également
                        // unset fonctionne pour tous les tableaux, non spécifique à $_SESSION
                        unset($_SESSION['erreurs']);
                        ?>

                    <?php endif; ?>

                    <form action="options.php" method="get">

                        <h2>Dresseur 1</h2>
                        <label for="nameDresseur1" class="form-label">Nom</label>
                        <input type="text" name="nameDresseur1" class="form-control"/>

                        <br />

                        <label for="pokemonDresseur1" class="form-label">Pokemon</label>
                        <select name="pokemonDresseur1" class="form-control">
                            <option value="">Choisir un pokemon</option>
                            <?php foreach (Database::all() as $id => $pokemon): ?>
                                <option value="<?php echo $id ?>"><?= $pokemon['nom'] ?> <?= $pokemon['type'] ?></option>
                            <?php endforeach; ?>
                        </select>

                        <hr />
                        
                        <h2>Dresseur 2</h2>
                        <label for="nameDresseur2" class="form-label">Nom</label>
                        <input type="text" name="nameDresseur2" class="form-control"/>

                        <br />

                        <label for="pokemonDresseur2" class="form-label">Pokemon</label>
                        <select name="pokemonDresseur2"  class="form-control">
                            <option value="">Choisir un pokemon</option>
                            <?php foreach (Database::all() as $id => $pokemon): ?>
                                <option value="<?php echo $id ?>"><?= $pokemon['nom'] ?> <?= $pokemon['type'] ?></option>
                            <?php endforeach; ?>
                        </select>

                        <hr />

                        <label for="nbTours" class="form-label">Nombre de tours</label>
                        <input type="number" name="nbTours"  class="form-control"/>

                        <br />

                        <input type="submit" value="Go" class="btn btn-success" />
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>


