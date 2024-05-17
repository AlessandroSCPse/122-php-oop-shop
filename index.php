<?php
require_once __DIR__ . '/Models/Product.php';
require_once __DIR__ . '/Models/Food.php';
require_once __DIR__ . '/Models/Game.php';
require_once __DIR__ . '/Models/Kennel.php';
require_once __DIR__ . '/Models/Category.php';

// Immaginare quali sono le classi necessarie per creare uno 
// shop online con le seguenti 
// caratteristiche:

// - L'e-commerce vende prodotti per animali.
// - I prodotti sono categorizzati, le categorie sono Cani o Gatti.
// - I prodotti saranno oltre al cibo, anche giochi, cucce, etc.

// Stampiamo delle card contenenti i dettagli dei prodotti, 
// come immagine, titolo, prezzo, 
// icona della categoria ed il tipo di articolo che 
// si sta visualizzando (prodotto, 
// cibo, gioco, cuccia).

// ANALISI:
// Prodotto -> classi figlie -> cibo, giochi, cucce -> crocchette, pupazzetto per cani
// Categoria -> Cani, Gatti

$dogs = new Category('Cani', 'https://picsum.photos/200/300');
$cats = new Category('Gatti', 'https://picsum.photos/200/300');

$collare = new Product('Collare', 9.99, $dogs);
// var_dump($product);
$crocchette = new Food('Crocchette', 12.00, $dogs, ['carne', 'carote']);
$crocchette->description = 'Le crocchette più buone del mondo';
// var_dump($crocchette);

$pallina = new Game('Pallina', 4.99, $cats);
$pallina->setColor('Rosso');
var_dump($pallina);
// var_dump($pallina);

$luxuryImperialKennel = new Kennel('Cuccia Luxury Imperial', 1100.00, $cats);
$luxuryImperialKennel->size = 5;
$luxuryImperialKennel->setColor('Grigio satinato spaziale');
var_dump($luxuryImperialKennel);
// var_dump(get_class($luxuryImperialKennel));

$products = [
    $collare,
    $crocchette,
    $pallina,
    $luxuryImperialKennel
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Negozio di animali</title>
</head>
<body>
    <header>
        <h1 class="text-center">Negozio di animali</h1>
    </header>

    <main>
        <div class="container">
            <div class="row row-cols-3">
                <?php foreach ($products as $product) { ?>
                    <?php
                        $className = get_class($product);
                        $productType = 'Prodotto generico';
                        if($className === 'Food') {
                            $productType = 'Cibo';
                        } elseif($className === 'Game') {
                            $productType = 'Gioco';
                        } elseif($className === 'Kennel') {
                            $productType = 'Cuccia';
                        }
                    ?>

                    <div class="col">
                        <div class="card my-2">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product->name; ?></h5>
                                <?php if($product->description) { ?>
                                    <div class="card-text">Descrizione: <?php echo $product->description; ?></div>
                                <?php } ?>
                                <div class="card-text">Prezzo: <?php echo $product->price; ?> Euro</div>
                                <div class="card-text">Tipo di prodotto: <?php echo $productType ?></div>
                                <div class="card-text">Categoria: <?php echo $product->category->name; ?> <img src="<?php echo $product->category->image; ?>"></div>
                                <?php if($className === 'Food') { ?>
                                    <div>Ingredienti: <?php echo implode(', ', $product->ingredients); ?> </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>
</body>
</html>