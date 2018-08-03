<?php

    $ composer require treinetic/imageartist
    $img1 = new Image("./cover.jpg");
    $img2 = new Image("./box.png");
    $img2->merge($img1,9,9);
    $img2->save("./merged.png",IMAGETYPE_PNG);

    ?>